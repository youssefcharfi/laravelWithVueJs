<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks' , [TaskController::class , 'index']);
Route::post('/tasks' , [TaskController::class , 'store']);
Route::get('/tasks/{id}' , [TaskController::class , 'edit']);
Route::patch('/tasks/{id}' , [TaskController::class , 'update']);
Route::delete('/tasks/{id}' , [TaskController::class , 'delete']);
Route::get('/tasks/search/{search}' , [TaskController::class , 'search']);

