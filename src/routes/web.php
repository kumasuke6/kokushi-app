<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectExamController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\DashboardController;

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

Route::get('/welcome', function () {
    return view('/welcome');
});

Route::get('/', function () {
    return view('top');
});

Route::prefix('questions')->group(function () {
    Route::get('/selectExam', [SelectExamController::class, 'showSubjects']);
    Route::get('/exam', [ExamController::class, 'showQuestions']);
});

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'showDashboard']);
    Route::post('/createSubject', [DashboardController::class, 'createSubject']);
    Route::post('/deleteSubject', [DashboardController::class, 'deleteSubject']);
    Route::get('/questions', [DashboardController::class, 'showDashboardQuestions']);
    Route::get('/users', [DashboardController::class, 'showDashboardUsers']);
});

require __DIR__ . '/auth.php';
