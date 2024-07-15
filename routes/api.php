<?php

use Illuminate\Support\Facades\Route;

Route::prefix('frontend')->group(function () {
    Route::get('/apartment/{slug}', [App\Http\Controllers\Public\Apartments\ApartmentsController::class, 'view']);
});
