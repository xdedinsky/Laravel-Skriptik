<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainTaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/maintasks', [App\Http\Controllers\MainTaskController::class, 'index'])->name('maintasks');
Route::get('/levelOne', [App\Http\Controllers\LevelOneController::class, 'index'])->name('levelOne');
Route::get('/levelTwo', [App\Http\Controllers\LevelTwoController::class, 'index'])->name('levelTwo');
Route::get('/levelThree', [App\Http\Controllers\LevelThreeController::class, 'index'])->name('levelThree');
Route::get('/levelBonus', [App\Http\Controllers\LevelBonusController::class, 'index'])->name('levelBonus');

Route::get('/createMainTask', [MainTaskController::class, 'createMainTask']);
