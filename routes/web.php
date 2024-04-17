<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainTaskController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupChatController;
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
Route::get('/documentation', [App\Http\Controllers\DocumentationController::class, 'index']);
Route::get('/ladder', [App\Http\Controllers\LadderController::class, 'index']);
Route::get('/addtask', function () {return view('addtask');})->middleware('auth');
Route::get('/group-chat', [GroupChatController::class, 'index'])->name('group.chat');

Route::get('/levelOne', [App\Http\Controllers\LevelOneController::class, 'index'])->name('levelOne');
Route::get('/levelTwo', [App\Http\Controllers\LevelTwoController::class, 'index'])->name('levelTwo');
Route::get('/levelThree', [App\Http\Controllers\LevelThreeController::class, 'index'])->name('levelThree');
Route::get('/levelBonus', [App\Http\Controllers\LevelBonusController::class, 'index'])->name('levelBonus');
Route::get('/tasks/{id}/detailed', [TaskController::class, 'showDetailedView'])->name('tasks.show');
Route::get('/createMainTask', [MainTaskController::class, 'createMainTask']);


Route::post('/send-message', [GroupChatController::class, 'sendMessage'])->name('send.message');
Route::post('/tasks/done', [App\Http\Controllers\TaskDoneController::class, 'store']);
Route::post('/main-tasks', [App\Http\Controllers\MainTaskController::class, 'store'])->name('main_tasks.store');
Route::delete('/messages/{id}', [GroupChatController::class, 'deleteMessage'])->name('delete.message');



