<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectExamController;
use App\Http\Controllers\TopController;

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

Route::prefix('questions')->group(function(){
    Route::get('/select_exam', [SelectExamController::class, 'subjectShow']);

    Route::get('/exam',function(){
        return view('exam');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
