<?php

use App\Http\Controllers\candidate\CandidateController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\interview\InterviewerController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\LogoutController;
use App\Http\Controllers\Users\SignUpController;
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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::get('register', [SignUpController::class, 'index']);
Route::post('register', [SignUpController::class, 'store']);
Route::get('logout', [LogoutController::class, 'perform']);


Route::middleware(['auth'])->group(function() {
    Route::prefix('users')->group(function() {
        Route::get('/', [MainController::class, 'index'])->name('user');

        #interview
        Route::prefix('interview')->group(function() {
            Route::get('add', [InterviewerController::class, 'create']);
            Route::post('add', [InterviewerController::class, 'store']);
            Route::get('list', [InterviewerController::class, 'index']);
            Route::get('edit/{interview}', [InterviewerController::class, 'show']);
            Route::post('edit/{interview}', [InterviewerController::class, 'update']);
            Route::DELETE('destroy', [InterviewerController::class, 'destroy']);
        });

        #category
        Route::prefix('category')->group(function() {
            Route::get('add', [CategoryController::class, 'create']);
            Route::post('add', [CategoryController::class, 'store']);
            Route::get('list', [CategoryController::class, 'index']);
            Route::get('edit/{category}', [CategoryController::class, 'show']);
            Route::post('edit/{category}', [CategoryController::class, 'update']);
            Route::DELETE('destroy', [CategoryController::class, 'destroy']);
        });

        #candidate
        Route::prefix('candidate')->group(function() {
            Route::get('add', [CandidateController::class, 'create']);
            Route::post('add', [CandidateController::class, 'store']);
            Route::get('list', [CandidateController::class, 'index']);
            Route::get('edit/{candidate}', [CandidateController::class, 'show']);
            Route::post('edit/{candidate}', [CandidateController::class, 'update']);
            Route::DELETE('destroy', [CandidateController::class, 'destroy']);
        });
    });
});