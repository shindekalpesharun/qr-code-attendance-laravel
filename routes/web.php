<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lecture\LecturesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SingleStudentProfileController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Teacher\SingleTeacherController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Report\ReportController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Routes that require authentication
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'show'])->name('home');
    Route::get('/management', [ManagementController::class, 'show'])->name('management');
    Route::get('/department/{id}', [ClassesController::class, 'show'])->name('classes');

    Route::get('/class/{id}', [StudentsController::class, 'show'])->name('students');
    Route::get('/student/{id}', [SingleStudentProfileController::class, 'show'])->name('singlestudentprofile');

    Route::get('/teacher', [TeacherController::class, 'show'])->name('teacher');
    Route::get('/teacher/{id}', [SingleTeacherController::class, 'show'])->name('singlestudentprofile');

    Route::get('/lecture/{id}', [LecturesController::class, 'show'])->name('singlestudentprofile');

    // report
    Route::get('/report', [ReportController::class, 'show'])->name('singlestudentprofile');
});


Route::get('/signup', [SignupController::class, 'index']);
Route::get('/login', [LoginController::class, 'show'])->name('login');

// about us
Route::get('/about', [AboutController::class, 'show'])->name('aboutus');
