<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\StudentController;
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
Route::prefix('students')->group(function () {
    Route::get('/trash',[StudentController::class , 'trashedItems'])->name('students.trash');
    Route::delete('/force_destroy/{id}', [StudentController::class, 'force_destroy'])->name('students.force_destroy');
    Route::put('/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
});
Route::resource('students',StudentController::class);



