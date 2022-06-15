<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
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

Route::get('/', [StudentController::class, 'view']);
/*Excel import*/
Route::get('/view', [StudentController::class, 'view']);
Route::post('/export-csv',[StudentController::class, 'export']);
Route::post('/import-csv',[StudentController::class, 'import']);
//Ajax Live Search
Route::get("search",[StudentController::class,'search']);

