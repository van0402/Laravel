<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\V1\BaiVietController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [HomeController::class, 'index']);

// Route::get('/bai-viet', [BaiVietController::class, 'show'])->name('baiviet');


Route::get('/tim-kiem', [HomeController::class, 'search'])->name('timkiem');

Auth::routes();


Route::get('/home', [LoginController::class, 'index'])->name('home');
