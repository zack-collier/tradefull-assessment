<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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

Route::get('/', [DataController::class, 'display']);

Route::get('/create', [DataController::class, 'create']);

Route::post('/create', [DataController::class, 'store']);

Route::get('/update', [DataController::class, 'update']);

Route::post('/update', [DataController::class, 'alter']);

Route::get('/delete', [DataController::class, 'delete']);

Route::post('/delete', [DataController::class, 'remove']);
