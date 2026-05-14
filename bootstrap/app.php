<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
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
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (InvalidArgumentException $e, $request) {
            if (str_contains($e->getMessage(), 'View') && str_contains($e->getMessage(), 'not found')) {
                return response()->view('errors.404', [], 404);
            }
        });
        $exceptions->render(function (\Illuminate\Foundation\ViteManifestNotFoundException $e, $request) {
            return response()->view('errors.500', [], 500);
        });
    })->create();
