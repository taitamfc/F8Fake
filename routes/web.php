<?php

use App\Http\Controllers\RequirementController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/dashboard', function () {
    return view('admin.master');
});

Route::prefix('admin')->group(function () {

    Route::prefix('requirements')->group(function () {
        Route::get('/trash', [RequirementController::class, 'getTrashed'])->name('requirements.getTrashed');
        Route::get('/restore/{id}', [RequirementController::class, 'restore'])->name('requirements.restore');
        Route::delete('/force_destroy/{id}', [RequirementController::class, 'force_destroy'])->name('requirements.force_destroy');
    });
    Route::resource('requirements', RequirementController::class);

    Route::prefix('steps')->group(function () {
        Route::get('/trash', [StepController::class, 'getTrashed'])->name('steps.getTrashed');
        Route::get('/restore/{id}', [StepController::class, 'restore'])->name('steps.restore');
        Route::delete('/force_destroy/{id}', [StepController::class, 'force_destroy'])->name('steps.force_destroy');
    });
    Route::resource('steps', StepController::class);

    Route::prefix('tracks')->group(function () {
        Route::get('/trash', [TrackController::class, 'getTrashed'])->name('tracks.getTrashed');
        Route::get('/restore/{id}', [TrackController::class, 'restore'])->name('tracks.restore');
        Route::delete('/force_destroy/{id}', [TrackController::class, 'force_destroy'])->name('tracks.force_destroy');
    });
    Route::resource('tracks', TrackController::class);
});
