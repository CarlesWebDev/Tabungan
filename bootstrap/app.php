<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Application as Configuration;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Tambahkan middleware EnsureSingleGuardSession ke grup web jika ingin global
        $middleware->web(append: [
            //  'cek.aktivitas' => \App\Http\Middleware\CekAktivitas::class,
            //  'auth.custom' => \App\Http\Middleware\CustomAuthenticate::class,
        ]);

        // Daftarkan alias supaya bisa digunakan di route (e.g., 'single.guard:admin')
         $middleware->alias([
        // 'auth.custom' => \App\Http\Middleware\CustomAuthenticate::class,
        // 'cek.aktivitas' => \App\Http\Middleware\CekAktivitas::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
