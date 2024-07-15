<?php

use Illuminate\Support\Facades\Route;

Route::prefix('frontend')->group(function () {
    Route::get('/apartment', [App\Http\Controllers\Public\Apartments\ApartmentsController::class, 'view']);
});
