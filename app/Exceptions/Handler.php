<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
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
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception){

        if( $request->is('api/*') ){

            if( $exception instanceof ModelNotFoundException ){
                $modelName = strtolower(class_basename($exception->getModel()));
                return $this->error([], 'No '.$modelName.' Found', 404);
            }

            if ($exception instanceof HttpResponseException) {
                $exception = $exception->getResponse();
            }

            if ($exception instanceof AuthenticationException) {
                $exception = $this->unauthenticated($request, $exception);
            }

            if ($exception instanceof ValidationException) {
                $exception = $this->convertValidationExceptionToResponse($exception, $request);
            }

            return $this->ApiHttpResponse($exception);
        }


        return parent::render($request, $exception);
    }

    private function ApiHttpResponse($exception)
    {
        if (method_exists($exception, 'getStatusCode')) {
            $code = $exception->getStatusCode();
        } else {
            $code = 500;
        }

        $status = 'error';

        switch ($code) {
            case 400:
                $msg = 'Bad Request';
                break;
            case 401:
                $msg = 'Unauthorized';
                break;
            case 403:
                $msg = 'Forbidden';
                break;
            case 404:
                $msg = 'Not Found';
                break;
            case 405:
                $msg = 'Method Not Allowed';
                break;
            case 422: // Used for validation errors
                $msg = $exception->original['message'];
                break;
            case 429:
                $msg = 'Too Many Requests';
                break;
            default:
                $msg = ($code == 500) ? 'Whoops, looks like something went wrong' : $exception->getMessage();
                break;
        }

        return $this->error([], $msg, $code, $status);

    }
}
