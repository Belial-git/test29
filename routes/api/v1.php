<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('autos')
    ->name('autos.')
    ->group(function (): void {
        Route::get('/', App\Http\Controllers\Api\V1\Auto\GetController::class)
            ->name('autos-get');
        Route::post('/', App\Http\Controllers\Api\V1\Auto\CreateController::class)
            ->name('auto-create');
        Route::prefix('{id}')->group(function (): void {
            Route::patch('/', App\Http\Controllers\Api\V1\Auto\UpdateController::class)
                ->name('auto-update');
            Route::delete('/', App\Http\Controllers\Api\V1\Auto\DeleteController::class)
                ->name('auto-delete');
        });
    });
Route::prefix('marks')
    ->name('marks.')
    ->group(function (): void {
        Route::get('/', App\Http\Controllers\Api\V1\MarkAuto\GetController::class)
            ->name('marks-get');
    });
Route::prefix('models')
    ->name('models.')
    ->group(function (): void {
        Route::get('/', App\Http\Controllers\Api\V1\ModelAuto\GetController::class)
            ->name('marks-get');
    });
