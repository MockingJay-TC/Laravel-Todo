<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\UserController;

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
Route::get('/todos', [TodoController::class, 'index']);

Route::get('/todos/create',[TodoController::class, 'create']);

Route::get('/todos/edit',[TodoController::class, 'edit']);

Route::post('/todos/create', [TodoController::class, 'store']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class,"index"]);


Route::post('/upload', [UserController::class, 'uploadAvatar']);

// Route::get('/user', function () {
//     return view('home');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
