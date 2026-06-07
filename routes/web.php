<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPaswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CvController;

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\EmployerController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/jobs')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('jobs');
    Route::get('/panel', [JobController::class, 'panel'])->middleware('auth', 'verified')->name('panel');
    Route::post('/', [JobController::class, 'store'])->middleware('auth', 'verified');
    Route::get('/career', [JobController::class, 'byCareer'])->name('career');
    Route::get('/tags', [JobController::class, 'byTags'])->name('tags');
    Route::get('/salaries', [JobController::class, 'bySalaries'])->name('salaries');
    Route::get('/company', [JobController::class, 'byCompany'])->name('company');
    Route::get('/studies', [JobController::class, 'byStudy'])->name('studies');
    Route::get('/{job:title_slug}', [JobController::class, 'show'])->name('job');
});

Route::get('/company/{employer:company_slug}', [EmployerController::class,'view'])->name('company.show');

Route::post('/send-cv/{job}', [CvController::class, 'send'])->name('cv');
Route::get('/applications', [CvController::class, 'applications'])->name('applications');

Route::middleware('guest')->group(function () {
    Route::get('auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
    Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');
});


Route::get('/search/{job?}', SearchController::class);
Route::get('/tags/{tag:slug}', TagController::class)->name('tags.show');


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});
Route::delete('logout', [SessionController::class, 'destroy']);

Route::prefix('/email')->group(function () {
    Route::get('/verify', [EmailVerificationController::class, 'view'])->middleware('auth')->name('verification.notice');
    Route::get('/verify/{id}/{hash}', [EmailVerificationController::class, 'validate_redirect'])->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/verification-notification', [EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [ForgotPaswordController::class, 'view'])->name('password.request');
    Route::post('/forgot-password', [ForgotPaswordController::class, 'validate_send'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPaswordController::class, 'reset_password'])->name('password.reset');
    Route::post('/reset-password/{token}', [ForgotPaswordController::class, 'update'])->name('password.update');
});
