<?php

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\TrackStepController;
use App\Http\Controllers\Admin\TrackStepController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\RequirementExportController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\StepExportController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\TrackExportController;
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
Route::prefix('groups')->group(function () {
    Route::put('SoftDeletes/{id}', [GroupController::class, 'SoftDeletes'])->name('groups.SoftDeletes');
    Route::get('trash', [GroupController::class, 'trash'])->name('groups.trash');
    Route::put('RestoreDelete/{id}', [GroupController::class, 'RestoreDelete'])->name('groups.RestoreDelete');
});
// Route::get('groups/trash', [GroupController::class, 'trashedItems'])->name('groups.trash');
// Route::get('groups/{id}/destroy', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::resource('groups', GroupController::class);

Route::prefix('admin')->group(function () {
    Route::prefix('requirements')->group(function () {
        Route::get('/trash', [RequirementController::class, 'getTrashed'])->name('requirements.getTrashed');
        Route::get('/restore/{id}', [RequirementController::class, 'restore'])->name('requirements.restore');
        Route::delete('/force_destroy/{id}', [RequirementController::class, 'force_destroy'])->name('requirements.force_destroy');
        Route::get('requirements/export/', [RequirementExportController::class, 'export'])->name('requirements.export');
    });
    Route::resource('requirements', RequirementController::class);

    Route::prefix('steps')->group(function () {
        Route::get('/trash', [StepController::class, 'getTrashed'])->name('steps.getTrashed');
        Route::get('/restore/{id}', [StepController::class, 'restore'])->name('steps.restore');
        Route::delete('/force_destroy/{id}', [StepController::class, 'force_destroy'])->name('steps.force_destroy');
        Route::get('steps/export/', [StepExportController::class, 'export'])->name('steps.export');
    });
    Route::resource('steps', StepController::class);

    Route::prefix('tracks')->group(function () {
        Route::get('/trash', [TrackController::class, 'getTrashed'])->name('tracks.getTrashed');
        Route::get('/restore/{id}', [TrackController::class, 'restore'])->name('tracks.restore');
        Route::delete('/force_destroy/{id}', [TrackController::class, 'force_destroy'])->name('tracks.force_destroy');
        Route::get('tracks/export/', [TrackExportController::class, 'export'])->name('tracks.export');
    });
    Route::resource('tracks', TrackController::class);
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
