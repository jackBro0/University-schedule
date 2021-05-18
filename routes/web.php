<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Groups\GroupController;
use App\Http\Controllers\Auditory\AuditoryController;
use App\Http\Controllers\Schedule\ScheduleController;

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

////Auth
Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'register'])->name('getRegister');
    Route::post('/register', [RegisterController::class, 'createUser'])->name('postRegister');
});
Route::post('/check', [LoginController::class, 'check'])->name('check');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('index', [IndexController::class, 'index'])->name('index');
    Route::resource('teacher', TeacherController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('group', GroupController::class);
    Route::resource('auditory', AuditoryController::class);
    Route::resource('schedule', ScheduleController::class);
});



