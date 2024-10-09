<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LuckyController;
use App\Http\Middleware\LinkMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' =>'link',
    'middleware' => 'auth'
], function () {
    Route::group([
        'middleware' => LinkMiddleware::class,
        'prefix' => '{segment}',
    ], function () {
        Route::get('/', [LinkController::class, 'index'])->name('link.index');
        Route::post('/delete', [LinkController::class, 'delete'])->name('link.delete');
        Route::post('/create', [LinkController::class, 'create'])->name('link.create');

        Route::group([
            'prefix' => 'lucky',
        ], function () {
            Route::get('/', [LuckyController::class, 'imFeelingLucky'])->name('link.lucky');
            Route::get('/history', [LuckyController::class, 'history'])->name('link.lucky.history');
        });
    });
});

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('auth');
