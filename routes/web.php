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
Route::get('/', [TodosController::class, 'index']);
