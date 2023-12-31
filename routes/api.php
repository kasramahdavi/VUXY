<?php

use App\Http\Controllers\TaskController;
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

Route::get('/tasks',[TaskController::class, 'index']);
Route::get('/tasksCompleted',[TaskController::class, 'completed']);
Route::get('/tasksimportant',[TaskController::class, 'important']);
Route::prefix('/task')->group(function(){
    Route::post('/store',[TaskController::class,'store']);
    Route::put('/{id}',[TaskController::class,'Update']);
    
    Route::delete('/{id}',[TaskController::class,'destroy']);
});
