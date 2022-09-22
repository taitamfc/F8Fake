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
Route::prefix('banners')->group(function () {
    Route::get('/trash',[BannerController::class , 'trashedItems'])->name('banners.trash');
    Route::put('/force_destroy/{id}', [BannerController::class, 'force_destroy'])->name('banners.force_destroy');
    Route::put('/restore/{id}', [BannerController::class, 'restore'])->name('banners.restore');
    Route::get('/export-banners',[BannerController::class,'exportBanners'])->name('export-banners');
});
Route::resource('banners',BannerController::class);




