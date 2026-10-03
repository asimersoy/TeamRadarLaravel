<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__.'/../../vendor/autoload.php';
$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();
set_exception_handler(function ($e) {
    fwrite(STDERR, $e->getMessage().PHP_EOL);
    exit(1);
});
$database = config('database.connections.pgsql.database');
throw_unless(app()->environment('testing') && config('database.connections.pgsql.host') === 'postgres' && ($database === 'qguard_test' || preg_match('/^qguard_restore_[a-z0-9_]+$/', $database)), LogicException::class, 'Only isolated test/restore fingerprints.');
$out = [];
foreach (DB::select("select tablename from pg_tables where schemaname='public' order by tablename") as $table) {
    $name = $table->tablename;
    throw_unless(preg_match('/^[a-z_]+$/', $name), LogicException::class, 'Unexpected table.');
    $out[$name] = DB::selectOne("select count(*) as rows, md5(coalesce(string_agg(to_jsonb(t)::text, E'\\n' order by to_jsonb(t)::text),'')) as digest from \"$name\" t");
}
echo json_encode($out, JSON_PRETTY_PRINT).PHP_EOL;
