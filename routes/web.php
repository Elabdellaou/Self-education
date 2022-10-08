<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FacebookController,Controller,AnswerController,QuestionController,AuthController, CertificateController, UserController,SessionController,Line_SessionController};

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
//auth
Route::get('/Sign-in', [AuthController::class, 'Login_index'])->name('Login');
Route::get('/Sign-up', [AuthController::class, 'register'])->name('Register');
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('Forgot-password');
Route::get('/Compte/{email}', [AuthController::class, 'search']);
Route::get('/reset', [AuthController::class, 'reset'])->name('Reset');
Route::post('/password_update', [UserController::class, 'password_update'])->name('password.edit');
Auth::routes();
//pages
Route::get('/', [Controller::class, 'index'])->name('Home');
Route::get('/home', [Controller::class, 'index'])->name('Home');
Route::get('/contact', [Controller::class, 'contact'])->name('Contact');
Route::get('/settings', [Controller::class, 'settings'])->name('Settings');
Route::get('/leaderboard', [Controller::class, 'leaderboard'])->name('Leaderboard');
Route::get('/test/{id}', [Controller::class, 'test'])->name('Test');
//search of event keyup
Route::get('/country/{country}', [Controller::class, 'getCountry']);
//contact me
Route::post('/Contact_me',[Controller::class,'contact_me']);
//leaderboard
Route::get('/users/{id?}',[AuthController::class, 'leaderboard']);
//certificate
Route::get('/certificate/jpg/{image}',[CertificateController::class,'download_jpg']);
Route::get('/certificate/pdf/{pdf}',[CertificateController::class,'download_pdf'])->name('certificate_pdf');
//start test
Route::get('/session/{session_id}', [SessionController::class, 'start']);
Route::get('/questions/{session_id}', [QuestionController::class, 'show']);
Route::get('/Line_sessions/{session_id}', [Line_SessionController::class, 'show']);
Route::get('/answers/{session_id}', [AnswerController::class, 'show']);
//auth facebook
Route::prefix('facebook')->name('facebook.')->group(function(){
    Route::get('/auth',[FacebookController::class,'LoginUsingFacebook'])->name('Login');
    Route::get('/callback',[FacebookController::class,'CallbackFromFacebook'])->name('Callback');
});
//answer question

Route::post('/answer_question',[AnswerController::class,'test_check_result']);
Route::post('/answer_question_end',[AnswerController::class,'test_check_result_end']);
Route::post('/answer_question_order',[AnswerController::class,'test_order']);
Route::post('/answer_question_order_end',[AnswerController::class,'test_order_end']);

// Route::get('/test_cer',[AnswerController::class,'validate_language']);
