<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\TodosController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

//mysqlのplayer一覧表示に使うroute設定
// Route::get('/', [PlayersController::class, 'index']);
// Route::get('/index', [PlayersController::class, 'index']);

//pgsqlのTodoリストに使うroute設定
Route::get('/', [TodosController::class, 'index'])->name('todos.index');
// Route::resource('todos', TodosController::class);
Route::post('todos/delete/{todo}', [TodosController::class, 'delete'])->name('todos.delete');
Route::post('todos/add', [TodosController::class, 'add'])->name('todos.add');
Route::post('todos/store', [TodosController::class, 'store'])->name('todos.store');
Route::get('todos/edit/{todo}', [TodosController::class, 'edit'])->name('todos.edit');
Route::post('todos/edit/{todo}', [TodosController::class, 'update'])->name('todos.update');
Route::post('todos/delete/{todo}', [TodosController::class, 'delete'])->name('todos.delete');
