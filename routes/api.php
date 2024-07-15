<?php

use Illuminate\Support\Facades\Route;

Route::prefix('frontend')->group(function () {
    Route::get('/search', [App\Http\Controllers\Public\Houses\HousesController::class, 'autocomplete']);
    Route::get('/apartment/{slug}', [App\Http\Controllers\Public\Apartments\ApartmentsController::class, 'view']);
    Route::get('/house/{slug}', [App\Http\Controllers\Public\Houses\HousesController::class, 'view']);
});
