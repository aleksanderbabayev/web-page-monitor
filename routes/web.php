<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiffController;

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

Route::get('/', [DiffController::class, 'index']);
Route::get('/show/{change}', [DiffController::class, 'show'])->name('show');
Route::get('/diff/{old}/{new}', [DiffController::class, 'diff'])->name('diff');
