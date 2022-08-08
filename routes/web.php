<?php

use App\Http\Controllers\candidate\CandidateController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\interview\InterviewerController;
use App\Http\Controllers\listusers\ListusersController;
use App\Http\Controllers\question\QuestionController;
use App\Http\Controllers\setupquestion\SetupquestionController;
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
Route::post('register', [SignUpController::class, 'register']);


Route::middleware(['auth'])->group(function() {
    Route::prefix('users')->group(function() {

        #interview
        Route::prefix('interview')->group(function() {
            Route::get('add', [InterviewerController::class, 'create']);
            Route::post('add', [InterviewerController::class, 'store']);
            Route::get('list', [InterviewerController::class, 'index']);
            Route::get('edit/{user}', [InterviewerController::class, 'show']);
            Route::post('edit/{user}', [InterviewerController::class, 'update']);
            Route::DELETE('destroy', [InterviewerController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        #category
        Route::prefix('category')->group(function() {
            Route::get('add', [CategoryController::class, 'create']);
            Route::post('add', [CategoryController::class, 'store']);
            Route::get('list', [CategoryController::class, 'index']);
            Route::get('edit/{category}', [CategoryController::class, 'show']);
            Route::post('edit/{category}', [CategoryController::class, 'update']);
            Route::DELETE('destroy', [CategoryController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        #candidate
        Route::prefix('candidate')->group(function() {
            Route::get('add', [CandidateController::class, 'create']);
            Route::post('add', [CandidateController::class, 'store']);
            Route::get('list', [CandidateController::class, 'index']);
            Route::get('edit/{candidate}', [CandidateController::class, 'show']);
            Route::post('edit/{candidate}', [CandidateController::class, 'update']);
            Route::DELETE('destroy', [CandidateController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        #question
        Route::prefix('question')->group(function() {
            Route::get('add', [QuestionController::class, 'create']);
            Route::post('add', [QuestionController::class, 'store']);
            Route::get('list', [QuestionController::class, 'index']);
            Route::get('edit/{question}/{id}', [QuestionController::class, 'show']);
            Route::post('edit/{question}/{id}', [QuestionController::class, 'update']);
            Route::DELETE('destroy', [QuestionController::class, 'destroy']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        #setup
        Route::prefix('setup')->group(function() {
            Route::get('add', [SetupquestionController::class, 'index']);
            Route::post('add', [SetupquestionController::class, 'store']);
            Route::post('create', [SetupquestionController::class, 'create']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });

        #listusers
        Route::prefix('listusers')->group(function() {
            Route::get('list', [ListusersController::class, 'index'])->name('user');
            Route::get('add/{id}', [ListusersController::class, 'show']);
            Route::post('insert', [ListusersController::class, 'insert']);
            Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        });
    });
});