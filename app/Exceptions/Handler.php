<?php

namespace App\Exceptions;

use Exception;
use Session;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $title = 'unauthorised to access this location';
        if ($this->isHttpException($exception)) {
            // 403

            if ($exception->getStatusCode() == 403) {
              return response()->view('error.error',[], 403, compact('title'));
            }
        }
        // return response()->view('error.error',[], 403, compact('title'));
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        $guard = array_get($exception->guards(), 0);
        switch ($guard) {
            default:
                $login = 'admin/login';
                break;
        }
        Session::forget('url.intented'); 
        return redirect($login);
    }
}
