<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $e)
    {
        if (class_exists($e::class) && is_subclass_of($e, HttpException::class)) {
            return response()->json(['data' => [
                'msg' => $e->getMessage(),
                'code' => $e->getCode(),
            ]], $e->getStatusCode());
        }

        return response()->json(['data' => [
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ]], 500);

        dd($e);
    }
}
