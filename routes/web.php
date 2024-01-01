<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TyperTitleController;

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/blog-details', function () {
    return view('frontend.blog-details');
});
Route::get('/portfolio-details', function () {
    return view('frontend.portfolio-details');
});


Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

// Admin Group Route

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);

    // Service Route
    Route::resource('service', ServiceController::class);

    // About Route
    Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');

    Route::resource('about', AboutController::class);
});
