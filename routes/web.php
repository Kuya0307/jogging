<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogController;

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
Route::controller(JogController::class)->group(function () {
    Route::get('login', 'login');
    Route::get('user_reg', 'user_reg');
    Route::get('month_look', 'month_look');
    Route::get('jog_reg', 'jog_reg');
    Route::post('jog_create', 'jog_create');
    Route::get('view', 'view');
    Route::get('edit', 'edit');
    Route::post('edit_function', 'edit_function')->name('edit_function');
    Route::get('report', 'report');
    Route::get('config', 'config');
    Route::post('config_update', 'config_update')->name('config_update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
