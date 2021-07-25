<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->name('Api\v1')->group(function (){


//product

      Route::get('product',[\App\Http\Controllers\Api\v1\ProductController::class , 'index']);

      Route::get('product/{product}',[\App\Http\Controllers\Api\v1\ProductController::class,'single']);

      Route::post('/product',[\App\Http\Controllers\Api\v1\ProductController::class,'store']);





//Login && register

      Route::post('login',[\App\Http\Controllers\Api\v1\UserController::class , 'login']);

      Route::post('register',[\App\Http\Controllers\Api\v1\UserController::class , 'register']);


      //authروت های نیاز به احراز هویت

    Route::middleware('auth:api')->group(function (){
//user
           Route::get('/user', function (){
           return auth()->user();
        });


//comment
           Route::post('comment',[\App\Http\Controllers\Api\v1\CommentController::class,'store']);


//upload image
           Route::post('upload/image',[\App\Http\Controllers\Api\v1\UploadController::class,'image']);

//upload file
          Route::post('upload/file',[\App\Http\Controllers\Api\v1\UploadController::class,'file']);

    });


});

//ورژن2
Route::prefix('v1')->name('Api\v2')->group(function (){


    Route::middleware('auth:api')->group(function (){


    });




});
