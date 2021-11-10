<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamQuestionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/',[DashboardController::class, 'index'])->name('dashboard')->middleware(['auth','admin']);
Route::resource('user',UserController::class)->middleware(['auth','admin']);
Route::resource('question', ExamQuestionController::class)->middleware(['auth','admin']);
Route::resource('exam', ExamController::class)->middleware(['auth','admin']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth','admin']);
Route::resource('kelas', ClassController::class)->middleware(['auth','admin']);
Route::resource('mapel', SubjectController::class)->middleware(['auth','admin']);

Route::get('logout', [UserController::class,'logout'])->name('logout');




