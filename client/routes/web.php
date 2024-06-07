<?php

use GRPC\Pinger\PingerClient;
use GRPC\Pinger\PingRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $client = new PingerClient(
        'localhost:9001',
        [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]
    );

    [$response, $status] = $client->ping(new PingRequest(['url' => '2']))->wait();
    echo "================== SET ==================\n";
    echo $response->getStatusCode(), "\n";
});
