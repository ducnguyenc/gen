<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spiral\RoadRunner\GRPC;
use GRPC\Pinger\PingerInterface;
use GRPC\Pinger\PingRequest;
use GRPC\Pinger\PingResponse;

class PingerControler extends Controller implements PingerInterface
{
    public function ping(GRPC\ContextInterface $ctx, PingRequest $in): PingResponse
    {
        $statusCode = 23;

        return new PingResponse([
            'status_code' => $statusCode
        ]);
    }
}
