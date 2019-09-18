<?php

use App\post;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/read',function (){
   $result = post::all();
   return response($result,200);
});

Route::get('/read/{page}',function ($page){
    $result = post::all()->forPage($page,7);
    return response($result->values(),200);
});
