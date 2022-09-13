<?php

use App\Http\Controllers\RequirementController;
use App\Http\Controllers\StepController;
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
Route::get('/step', function () {
    return view('Admin.step.index');
})->name('step.index');
Route::get('/step/create', function () {
    return view('Admin.step.create');
})->name('step.create');
Route::get('/step/edit', function () {
    return view('Admin.step.edit');
})->name('step.edit');

Route::get('/requirement', function () {
    return view('Admin.requirement.index');
})->name('requirement.index');
Route::get('/requirement/create', function () {
    return view('Admin.requirement.create');
})->name('requirement.create');
Route::get('/requirement/edit', function () {
    return view('Admin.requirement.edit');
})->name('requirement.edit');

Route::get('/track', function () {
    return view('Admin.track.index');
})->name('track.index');
Route::get('/track/create', function () {
    return view('Admin.track.create');
})->name('track.create');
Route::get('/track/edit', function () {
    return view('Admin.track.edit');
})->name('track.edit');
