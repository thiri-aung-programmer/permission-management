<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        //  $routeMiddleware = [
        //     // ...
        //     'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // ];
        
    })
    ->withExceptions(function (Exceptions $exceptions): void {

         $exceptions->renderable(function (
        AuthenticationException $e,
        $request
        ) {
        // 🔴 login မဝင်ရသေးရင် 404 ပြ
        throw new NotFoundHttpException();
        });
        //
    })->create();
