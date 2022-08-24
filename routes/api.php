<?php

use App\Http\Controllers\FatherPalmBaggingController;
use App\Http\Controllers\FatherPalmHarvestController;
use App\Http\Controllers\FatherPalmPollenPreparationController;
use App\Http\Controllers\FatherPalmPollenUsageController;
use App\Http\Controllers\MotherPalmBaggingController;
use App\Http\Controllers\MotherPalmControlPollinationController;
use App\Http\Controllers\MotherPalmHarvestController;
use App\Http\Controllers\MotherPalmQualityControlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::prefix('/motherpalm')->group(function(){
    Route::resources([
        'bagging' => MotherPalmBaggingController::class,
        'control-pollination' => MotherPalmControlPollinationController::class,
        'quality-control' => MotherPalmQualityControlController::class,
        'harvest' => MotherPalmHarvestController::class,
    ]);
});

Route::prefix('/fatherpalm')->group(function(){
    Route::resources([
        'bagging' => FatherPalmBaggingController::class,
        'harvest' => FatherPalmHarvestController::class,
        'pollen-preparation' => FatherPalmPollenPreparationController::class,
        'pollen-usage' => FatherPalmPollenUsageController::class
    ]);
});