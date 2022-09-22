<?php

use App\Http\Controllers\Admin\TrackStepController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\WillLearnController;
use App\Http\Controllers\LevelController as ControllersLevelController;
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

Route::get('/', function () {
    return view('Admin.master');
});
Route::prefix('tracksteps')->group(function () {
    Route::put('SoftDeletes/{id}', [TrackStepController::class, 'SoftDeletes'])->name('tracksteps.SoftDeletes');
    Route::get('trash', [TrackStepController::class, 'trash'])->name('tracksteps.trash');
    Route::put('RestoreDelete/{id}', [TrackStepController::class, 'RestoreDelete'])->name('tracksteps.RestoreDelete');
    Route::get('/export-track_steps',[TrackStepController::class,'export'])->name('export-track_steps');
});
Route::resource('tracksteps', TrackStepController::class);
// Route::get('/index', function () {
//     // echo '<br>'.route('index');
//     // echo '<br>'.route('create');

Route::prefix('admin')->group(function () {
    Route::prefix('courses')->group(function () {
        Route::put('SoftDeletes/{id}', [CourseController::class, 'SoftDeletes'])->name('courses.SoftDeletes');
        Route::get('trash', [CourseController::class, 'trash'])->name('courses.trash');
        Route::put('RestoreDelete/{id}', [CourseController::class, 'RestoreDelete'])->name('courses.RestoreDelete');
        Route::get('export-courses',[CourseController::class,'exportCourse'])->name('levels.export-courses');

    });
    Route::prefix('levels')->group(function () {
        Route::put('SoftDeletes/{id}', [LevelController::class, 'SoftDeletes'])->name('levels.SoftDeletes');
        Route::get('trash', [LevelController::class, 'trash'])->name('levels.trash');
        Route::put('RestoreDelete/{id}', [LevelController::class, 'RestoreDelete'])->name('levels.RestoreDelete');
        Route::get('export-levels', [LevelController::class, 'exportLevel'])->name('levels.export-levels');
    });
    Route::prefix('WillLearns')->group(function () {
        Route::put('SoftDeletes/{id}', [WillLearnController::class, 'SoftDeletes'])->name('WillLearns.SoftDeletes');
        Route::get('trash', [WillLearnController::class, 'trash'])->name('WillLearns.trash');
        Route::put('RestoreDelete/{id}', [WillLearnController::class, 'RestoreDelete'])->name('WillLearns.RestoreDelete');
        Route::get('export-WillLearns', [WillLearnController::class, 'exportWillLearn'])->name('levels.export-WillLearns');

    });
    Route::resource('levels', LevelController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('WillLearns', WillLearnController::class);
});
