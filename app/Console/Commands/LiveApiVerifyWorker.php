<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class LiveApiVerifyWorker extends Command
{
    protected $signature = 'liveapi:verify-worker';
    protected $description = 'Subscribes to liveapi:verify:req and replies on liveapi:verify:res';

    public function handle()
    {
        $req = 'liveapi:verify:req';
        $res = 'liveapi:verify:res';

        $makeSub = fn() => Redis::connection('sub'); // non-persistent, read_timeout=0
        $makePub = fn() => Redis::connection('pub'); // persistent OK

        $this->info("Worker starting. Subscribing to {$req}");

        $attempt = 0;

        while (true) {
            $sub = $pub = null;
            $cycleStartedAt = microtime(true);

            try {
                // Fresh sockets
                $sub = $makeSub();
                $pub = $makePub();

                // (Paranoia) force infinite read timeout on raw PhpRedis client
                try {
                    $prop = (new \ReflectionClass($sub))->getProperty('client');
                    $prop->setAccessible(true);
                    $raw = $prop->getValue($sub);
                    if ($raw instanceof \Redis) {
                        $raw->setOption(\Redis::OPT_READ_TIMEOUT, -1);
                    }
                } catch (\Throwable $ignored) {}

                $attempt = 0; // reset backoff on successful connect
                $this->info('Subscribed… (DEBUG LOG)');

                // BLOCKS until error/unsubscribe/driver quirk
                $sub->subscribe([$req], function (string $message, string $channel) use ($pub, $res) {
                    // DEBUG
                    $ts = date('H:i:s');
                    echo "[{$ts}] [DEBUG] Received on {$channel}: {$message}\n";

                    try {
                        $data = json_decode($message, true, 512, JSON_THROW_ON_ERROR);
                        $psk  = $data['psk'] ?? null;

                        if (!$psk) {
                            $pub->publish($res, json_encode([
                                'psk'   => null,
                                'error' => 'missing_psk',
                            ]));
                            echo "[{$ts}] [DEBUG] Published error: missing_psk\n";
                            return;
                        }

                        $userId = (string)((crc32($psk) % 900000) + 100000);

                        $pub->publish($res, json_encode([
                            'psk'     => $psk,
                            'user_id' => $userId,
                        ]));

                        echo "[{$ts}] [DEBUG] Verified PSK {$psk}, responded with user_id={$userId}\n";
                    } catch (\Throwable $e) {
                        echo "[{$ts}] [DEBUG] Callback error: {$e->getMessage()}\n";
                    }
                });

                // If subscribe() returns “cleanly”, treat it as a failure (driver/server blip)
                $elapsed = microtime(true) - $cycleStartedAt;
                $this->warn("subscribe() returned after {$elapsed}s; resubscribing with backoff… (DEBUG LOG)");

                // Backoff on clean-return too (avoid tight loop)
                $attempt = min($attempt + 1, 5);
                $sleep = (1 << $attempt);                 // 2,4,8,16,32
                $sleep += random_int(0, 2);               // jitter (0–2s)
                sleep($sleep);
            } catch (\Throwable $e) {
                $this->error('Redis subscribe error: '.$e->getMessage().' (DEBUG LOG)');
                return self::FAILURE;
            } finally {
                // ensure sockets are dropped before retrying
                try { $sub && method_exists($sub, 'disconnect') && $sub->disconnect(); } catch (\Throwable $e) {}
                try { $pub && method_exists($pub, 'disconnect') && $pub->disconnect(); } catch (\Throwable $e) {}
            }
        }

        // return self::SUCCESS; // unreachable for a daemon
    }
}
