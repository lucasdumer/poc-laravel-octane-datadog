<?php

namespace App\Interfaces\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        if ($e->response) {
            return $e->response;
        }

        return response()->json([
            'status'=> 'error',
            'message' => $e->validator->errors()->getMessages(),
            'data' => null
        ], 422);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'status'=> 'error',
                'message' => 'Not Found',
                'data' => null
            ], 404);
        }
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'status'=> 'error',
                'message' => 'Not Allowed',
                'data' => null
            ], 405);
        }
        if ($exception instanceof Throwable) {
            return response()->json([
                'status'=> 'error',
                'message' => $exception->getMessage(),
				'file' => $exception->getFile(),
	            'line' => $exception->getLine(),
	            'trace' => $exception->getTrace(),
                'data' => null
            ], $exception->getCode() ? $exception->getCode() : 500);
        }
        return parent::render($request, $exception);
    }
}
