<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Exception;

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

    public function report(Throwable $exception)
    {
        parent::report($exception);
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
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof TokenExpiredException) {
            return \Response::json(generateResponseBody('AR-PE-'.env('ERR_TOKEN').'#token_expired', 'Token Expired', false, env('ERR_TOKEN')));
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return \Response::json(generateResponseBody('AR-UHE-'.env('ERR_TOKEN').'#unauthorized_http_exception', 'Token not provided', false, env('ERR_TOKEN')));
        }

        if ($exception instanceof TokenInvalidException) {
            return \Response::json(generateResponseBody('AR-TIE-'.env('ERR_TOKEN').'#token_invalid_exception', 'Token Invalid', false, env('ERR_TOKEN')));
        }

        if ($exception instanceof ParamMissingException) {
            return \Response::json(generateResponseBody('AR-PME-'.env('ERR_PARAM').'#param_missing_exception', $exception->getMessage(), false, env('ERR_PARAM')));
        }

        if ($exception instanceof QueryException) {
            return \Response::json(generateResponseBody('AR-QE-'.env('ERR_SQL').'#query_exception', $exception->getMessage(), false, env('ERR_SQL')));
        }
        
        return parent::render($request, $exception);
    }
    
}
