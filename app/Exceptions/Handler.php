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
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Throwable $e)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $e = $this->prepareException($this->mapException($e));
            $code = $this->isHttpException($e) ? $e->getStatusCode() : 500;
            return response()->json(['msg' => $e->getMessage(), 'code' => $code], $code);
        }

        return parent::render($request, $e);
    }
}
