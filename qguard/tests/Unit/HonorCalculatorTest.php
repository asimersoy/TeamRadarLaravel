<?php

namespace Tests\Unit;

use App\Domain\Honor\HonorCalculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class HonorCalculatorTest extends TestCase
{
    private function state(float $honor = 50, ?float $reference = null, int $count = 0): array
    {
        return ['honor_score' => $honor, 'smoothed_raw_rating_reference' => $reference, 'eligible_rating_count' => $count];
    }

    public function test_mapping_initialization_and_startup_boundary(): void
    {
        $c = new HonorCalculator;
        $this->assertSame(0.0, HonorCalculator::input([1, 1, 1]));
        $this->assertSame(100.0, HonorCalculator::input([10, 10, 10]));
        $this->assertEqualsWithDelta((16 / 3 - 1) * 100 / 9, HonorCalculator::input([1, 5, 10]), 1e-10);
        $s = $c->step($this->state(), 100);
        $this->assertSame(52.5, $s['honor_score']);
        $this->assertSame(100.0, $s['smoothed_raw_rating_reference']);
        for ($i = 1; $i < 5; $i++) {
            $s = $c->step($s, 100);
        }
        $after = $c->step($s, 100);
        $this->assertEqualsWithDelta($s['honor_score'] + .1 * (100 - $s['honor_score']), $after['honor_score'], 1e-8);
    }

    public function test_influence_uses_previous_reference_and_raw_reference_is_undampened(): void
    {
        $c = new HonorCalculator;
        $s = $this->state(80, 80, 20);
        $moderate = $c->step($s, 60);
        $extreme = $c->step($s, 0);
        $this->assertSame(79.0, $moderate['honor_score']);
        $this->assertGreaterThan($moderate['honor_score'], $extreme['honor_score']);
        $this->assertSame(76.0, $extreme['smoothed_raw_rating_reference']);
        $this->assertSame(77.0, $c->step($this->state(80, 50, 20), 50)['honor_score']);
    }

    public function test_sustained_behavior_adapts_both_ways_without_admin(): void
    {
        $c = new HonorCalculator;
        $low = $this->state(90, 90, 100);
        $high = $this->state(10, 10, 100);
        for ($i = 0; $i < 500; $i++) {
            $low = $c->step($low, 0);
            $high = $c->step($high, 100);
        }
        $this->assertLessThan(.01, $low['honor_score']);
        $this->assertGreaterThan(99.99, $high['honor_score']);
        $initial = $c->step($this->state(), 0);
        for ($i = 0; $i < 100; $i++) {
            $initial = $c->step($initial, 100);
        }
        $this->assertGreaterThan(90, $initial['honor_score']);
    }

    public function test_ten_thousand_deterministic_inputs_remain_finite_and_bounded(): void
    {
        $c = new HonorCalculator;
        $s = $this->state();
        $seed = 4242;
        for ($i = 0; $i < 10000; $i++) {
            $seed = (1664525 * $seed + 1013904223) % 4294967296;
            $s = $c->step($s, ($seed % 10001) / 100);
            $this->assertTrue(is_finite($s['honor_score']));
            $this->assertGreaterThanOrEqual(0, $s['honor_score']);
            $this->assertLessThanOrEqual(100, $s['honor_score']);
            $this->assertGreaterThanOrEqual(0, $s['smoothed_raw_rating_reference']);
            $this->assertLessThanOrEqual(100, $s['smoothed_raw_rating_reference']);
        }
        $this->assertSame(10000, $s['eligible_rating_count']);
    }

    public function test_settings_are_distinct_and_invalid_numeric_values_are_rejected(): void
    {
        foreach (['allowed_rating_deviation' => 0, 'raw_rating_reference_response_divisor' => .5, 'startup_honor_response_fraction' => INF, 'startup_eligible_rating_count' => -1] as $key => $value) {
            try {
                new HonorCalculator(array_replace(HonorCalculator::DEFAULTS, [$key => $value]));
                $this->fail('Invalid setting accepted');
            } catch (InvalidArgumentException) {
                $this->addToAssertionCount(1);
            }
        }
        $this->expectException(InvalidArgumentException::class);
        (new HonorCalculator)->step($this->state(), NAN);
    }

    public function test_canonical_order_matters_but_retuning_needs_no_history(): void
    {
        $c = new HonorCalculator;
        $s = $this->state(50, 50, 100);
        $one = $c->step($c->step($s, 80), 20);
        $two = $c->step($c->step($s, 20), 80);
        $this->assertNotEquals($one['honor_score'], $two['honor_score']);
        $changed = new HonorCalculator(array_replace(HonorCalculator::DEFAULTS, ['raw_rating_reference_response_divisor' => 10]));
        $this->assertSame(53.0, $changed->step($s, 80)['smoothed_raw_rating_reference']);
    }
}
