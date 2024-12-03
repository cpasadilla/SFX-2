<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;


use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    //FOR REDIRECTING USER TO HOME PAGE AND NOT ACCESSING 404 PAGES
    public function render($request, Throwable $exception)
    {
        // Check if the exception is a 404 error
        if ($exception instanceof NotFoundHttpException) {
            // Redirect to login page if the user is not authenticated
            if (!Auth::check()) {
                return redirect()->route('login');
            }
        }

        return parent::render($request, $exception);
    }
}
