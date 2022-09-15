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
Route::get('/hello', function () {
    return view(' welcome');
});
Route::resource('requirement', RequirementController::class);
Route::resource('step', StepController::class);
Route::resource('track', TrackController::class);

