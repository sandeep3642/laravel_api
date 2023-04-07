<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GarminController;
use App\Http\Controllers\StravaController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/garminConnect', [GarminController::class, 'garminConnect']);
Route::get('/garminToken', [GarminController::class, 'garminToken']);


Route::get('/stravaConnect', [StravaController::class, 'stravaConnect']);
Route::get('/stravaToken', [StravaController::class, 'stravaToken']);

