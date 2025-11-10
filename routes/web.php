<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WeatherController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/weather', WeatherController::class);

Route::get('/jobs',[JobController::class,'index'])->name('jobs');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

Route::prefix('/jobs')->group(function(){
   Route::get('/tags',[JobController::class,'byTags'])->name('tags');
   Route::get('/company',[JobController::class,'byCompany'])->name('company');
   Route::get('/studies',[JobController::class, 'byStudy'])->name('studies');
});


Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);


Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});
Route::delete('logout', [SessionController::class, 'destroy']);
