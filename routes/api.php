<?php

use App\Http\Controllers\Api\V1\NotebookController;
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

Route::prefix('v1/notebook')->controller(NotebookController::class)->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::get('/{id}','show');
    Route::post('/{id}','edit');
    Route::delete('/{id}','delete');
});
