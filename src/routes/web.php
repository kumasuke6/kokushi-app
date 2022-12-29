<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyAccountController;

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

Route::get('/', [TopController::class, 'showSubjects']);

Route::prefix('questions')->group(function () {
    Route::get('/exam', [ExamController::class, 'showQuestions']);
});

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'showDashboard']);
    Route::post('/createSubject', [DashboardController::class, 'createSubject']);
    Route::post('/deleteSubject', [DashboardController::class, 'deleteSubject']);
    Route::post('/createQuestion', [DashboardController::class, 'createQuestion']);
    Route::post('/updateQuestion', [DashboardController::class, 'updateQuestion']);
    Route::get('/questionList', [DashboardController::class, 'showDashboardQuestionList']);
    Route::get('/questionDetail', [DashboardController::class, 'showDashboardQuestionDetail']);
    Route::get('/users', [DashboardController::class, 'showDashboardUsers']);
});

Route::get('/myAccount', [MyAccountController::class, 'myAccount'])->middleware(['auth'])->name('myAccount');

require __DIR__ . '/auth.php';
