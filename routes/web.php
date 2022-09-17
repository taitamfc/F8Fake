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
    return view('Admin.master');
});

Route::resource('requirement', RequirementController::class);
Route::resource('step', StepController::class);
Route::resource('track', TrackController::class);

Route::get('track/restore', [TrackController::class, 'getTrashed'])->name('track.getTrashed');
Route::get('track/restore/{id}', [TrackController::class, 'restore'])->name('track.restore');
Route::delete('track/force_destroy/{id}', [TrackController::class, 'force_destroy'])->name('track.force_destroy');
