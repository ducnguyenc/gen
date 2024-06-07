<?php

use App\Http\Controllers\PingerControler;
use GRPC\Pinger\PingerInterface;
use Spiral\RoadRunner\GRPC\Server;
use Spiral\RoadRunner\Worker;

define('LARAVEL_START', microtime(true));

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$server = new Server(options: [
    'debug' => false, // optional (default: false)
]);

$server->registerService(PingerInterface::class, new PingerControler());

$server->serve(Worker::create());
