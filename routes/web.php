<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtracurritulerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/students', [StudentController::class, 'index'])->middleware('auth');

//middleware di group biar tidak pengulangan di tulis
//ini untuk hak akses admin dan teacher
Route::middleware(['auth','must-admin-or-teacher'])->group(function(){
    //STUDENT route
    Route::get('/student/{id}', [StudentController::class, 'show']);
    Route::get('/students/add', [StudentController::class, 'create']);
    Route::post('/student', [StudentController::class, 'store']);
    Route::get('/students/edit/{id}', [StudentController::class, 'edit']);
    Route::put('/student/{id}', [StudentController::class, 'update']);
});

Route::middleware(['auth','must-admin-or-teacher'])->group(function(){
    //STUDENT route
    Route::any('/students/delete/{id}', [StudentController::class, 'delete']); 
    Route::get('/students-deleted', [StudentController::class, 'deletedStudents']); 
    Route::any('/students/restore/{id}', [StudentController::class, 'restore']); 
});







Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/class/{id}', [ClassController::class, 'show'])->middleware('auth');
Route::get('/classroom/add', [ClassController::class, 'create'])->middleware('auth')->name('class-add');
Route::post('/class', [ClassController::class, 'store'])->middleware('auth');
Route::get('/class/edit/{id}', [ClassController::class, 'edit'])->middleware('auth'); 
Route::put('/class/{id}', [ClassController::class, 'update'])->middleware('auth'); 
Route::any('/class/delete/{id}', [ClassController::class, 'delete'])->middleware('auth');

Route::get('/extracurrituller', [ExtracurritulerController::class, 'index'])->middleware('auth');
Route::get('/extracurrituller/{id}', [ExtracurritulerController::class, 'show'])->middleware('auth');
Route::get('/extracurritullers/add', [ExtracurritulerController::class, 'create'])->middleware('auth')->name('extracurrituller-add');
Route::post('/extracurrituller', [ExtracurritulerController::class, 'store'])->middleware('auth');
Route::get('/extracurrituller/edit/{id}', [ExtracurritulerController::class, 'edit'])->middleware('auth');
Route::put('/extracurrituller/{id}', [ExtracurritulerController::class, 'update'])->middleware('auth');

Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->middleware('auth');
Route::get('/teachers/add', [TeacherController::class, 'create'])->middleware('auth');
Route::post('/teacher', [TeacherController::class, 'store'])->middleware('auth');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->middleware('auth');
Route::put('/teacher/{id}', [TeacherController::class, 'update'])->middleware('auth');
