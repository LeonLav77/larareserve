<?php

use Inertia\Inertia;
use App\Http\Controllers\APIHandler;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'Index']);

Route::get('/all', [APIHandler::class, 'AllDates']);

Route::get('/specific', [APIHandler::class, 'specificDate']);

Route::get('/specificWithTime', [APIHandler::class, 'specificDateAndTime']);

Route::get('/checkIfLoggedIn', [APIHandler::class, 'checkIfLoggedIn']);

Route::get('/cacheTest', [APIHandler::class, 'cacheTest']);
Route::middleware(['react'])->group(function () {
    Route::get('/userInfo', [APIHandler::class, 'userInfo']);
    Route::post('/reserveDate', [APIHandler::class, 'reserveDate']);
    Route::get('/myReservations', [APIHandler::class, 'myReservations']);
    Route::get('/specificReservation', [APIHandler::class, 'specificReservation']);
});

require __DIR__ . '/auth.php';
