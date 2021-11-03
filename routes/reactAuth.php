<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReactAuthController;

Route::post('/react/register', [ReactAuthController::class, 'register'])
                ->middleware('guest');

Route::post('/react/login', [ReactAuthController::class, 'login'])
                ->middleware('guest');

Route::post('/react/logout', [ReactAuthController::class, 'logout'])
                ->middleware('auth')
                ->name('logout');
