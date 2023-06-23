<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
use App\Http\Controllers\Api\ResortController;
use App\Http\Controllers\UserController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('resorts', [Api\ResortController::class,'index']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('resorts', Api\ResortController::class);

});

Route::get('search/{name}', [Api\ResortController::class,'search']);
Route::post("login", [UserController::class, 'login']);

