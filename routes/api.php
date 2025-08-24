<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\CustomerController;
use App\Http\Controllers\API\V2\CustomerController as CustomerControllerV2;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\V1\CategoryPostController;
use App\Http\Controllers\API\V1\BaivietController;
use App\Http\Controllers\API\V1\BaiViet2Controller;
use App\Http\Controllers\API\V1\DanhMucController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('v1')->group(function(){
Route::apiResource('customer', CustomerController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
//Route::apiResource('customer', CustomerController::class)->only(['index']);
Route::Resource('category',CategoryPostController::class);
Route::Resource('post',BaivietController::class);
Route::Resource('Baiviet2',BaiViet2Controller::class);
Route::Resource('Danh-muc',DanhMucController::class);
});
Route::prefix('v2')->group(function(){
//Route::apiResource('customer', CustomerController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
Route::apiResource('customer', CustomerControllerV2::class)->only(['show']);
});



   


