<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Post\DeletePostController;
use App\Http\Controllers\Api\Post\IndexPostController;
use App\Http\Controllers\Api\Post\ShowPostController;
use App\Http\Controllers\Api\Post\StorePostController;
use App\Http\Controllers\Api\Post\UpdatePostController;
use App\Http\Controllers\Api\Tag\DeleteTagController;
use App\Http\Controllers\Api\Tag\IndexTagController;
use App\Http\Controllers\Api\Tag\StoreTagController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::group(['middleware' => 'api.token'], function () {
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', IndexPostController::class);
        Route::get('/{id}', ShowPostController::class)->where([
            'id' => '[0-9]+'
        ]);
        Route::post('/', StorePostController::class);
        Route::put('/{id}', UpdatePostController::class)->where([
            'id' => '[0-9]+'
        ]);
        Route::delete('/{id}', DeletePostController::class)->where([
            'id' => '[0-9]+'
        ]);
    });

    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', IndexTagController::class);
        Route::post('/', StoreTagController::class);
        Route::delete('/{id}', DeleteTagController::class)->where([
            'id' => '[0-9]+'
        ]);
    });
});


Route::fallback(function () {
    return response()->json([
        'message' => 'Resource not Found.'], 404);
});
