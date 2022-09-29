<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\TrackStepController;
use App\Http\Controllers\Admin\StepController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\WillLearnController;
use App\Http\Controllers\LevelController as ControllersLevelController;
use Illuminate\Support\Facades\Route;
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

Route::prefix('admin')->group(function () {
    // Banners
    Route::prefix('banners')->group(function () {
        Route::get('/trash', [BannerController::class, 'trashedItems'])->name('banners.trash');
        Route::put('/force_destroy/{id}', [BannerController::class, 'force_destroy'])->name('banners.force_destroy');
        Route::put('/restore/{id}', [BannerController::class, 'restore'])->name('banners.restore');
        Route::get('/export-banners', [BannerController::class, 'exportBanners'])->name('export-banners');
    });
    Route::resource('banners', BannerController::class);

    // Students
    Route::prefix('students')->group(function () {
        Route::get('/trash', [StudentController::class, 'trashedItems'])->name('students.trash');
        Route::delete('/force_destroy/{id}', [StudentController::class, 'force_destroy'])->name('students.force_destroy');
        Route::put('/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
    });
    Route::resource('students', StudentController::class);

    // User
    Route::prefix('users')->middleware('auth')->group(function () {
        Route::put('SoftDeletes/{id}', [UserController::class, 'SoftDeletes'])->name('users.SoftDeletes');
        Route::get('trash', [UserController::class, 'trash'])->name('users.trash');
        Route::put('RestoreDelete/{id}', [UserController::class, 'RestoreDelete'])->name('users.RestoreDelete');
    });
    Route::resource('users', UserController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Login
    Route::prefix('login')->group(function () {
        Route::get('/', [LoginController::class, 'login'])->name('login');
        Route::post('/loginProcessing', [LoginController::class, 'loginProcessing'])->name('loginProcessing');
    });

    // Comment
    Route::prefix('comments')->group(function () {
        Route::put('SoftDeletes/{id}', [CommentController::class, 'SoftDeletes'])->name('comments.SoftDeletes');
        Route::get('trash', [CommentController::class, 'trash'])->name('comments.trash');
        Route::put('RestoreDelete/{id}', [CommentController::class, 'RestoreDelete'])->name('comments.RestoreDelete');
        Route::put('force_destroy/{id}', [CommentController::class, 'force_destroy'])->name('comments.force_destroy');
    });
    Route::resource('comments', CommentController::class);

    // Blog
    Route::prefix('blogs')->group(function () {
        Route::put('SoftDeletes/{id}', [BlogController::class, 'SoftDeletes'])->name('blogs.SoftDeletes');
        Route::get('trash', [BlogController::class, 'trash'])->name('blogs.trash');
        Route::put('RestoreDelete/{id}', [BlogController::class, 'RestoreDelete'])->name('blogs.RestoreDelete');
        Route::put('force_destroy/{id}', [BlogController::class, 'force_destroy'])->name('blogs.force_destroy');
    });
    Route::resource('blogs', BlogController::class);

    // Group
    Route::prefix('groups')->group(function () {
        Route::put('SoftDeletes/{id}', [GroupController::class, 'SoftDeletes'])->name('groups.SoftDeletes');
        Route::get('trash', [GroupController::class, 'trash'])->name('groups.trash');
        Route::put('RestoreDelete/{id}', [GroupController::class, 'RestoreDelete'])->name('groups.RestoreDelete');
    });
    Route::resource('groups', GroupController::class);

    // Requirement
    Route::prefix('requirements')->group(function () {
        Route::get('/trash', [RequirementController::class, 'getTrashed'])->name('requirements.getTrashed');
        Route::get('/restore/{id}', [RequirementController::class, 'restore'])->name('requirements.restore');
        Route::delete('/force_destroy/{id}', [RequirementController::class, 'force_destroy'])->name('requirements.force_destroy');
        Route::get('requirements/export/', [RequirementController::class, 'export'])->name('requirements.export');
    });
    Route::resource('requirements', RequirementController::class);

    // Step
    Route::prefix('steps')->group(function () {
        Route::get('/trash', [StepController::class, 'getTrashed'])->name('steps.getTrashed');
        Route::get('/restore/{id}', [StepController::class, 'restore'])->name('steps.restore');
        Route::delete('/force_destroy/{id}', [StepController::class, 'force_destroy'])->name('steps.force_destroy');
        Route::get('steps/export/', [StepController::class, 'export'])->name('steps.export');
    });
    Route::resource('steps', StepController::class);

    // Track
    Route::prefix('tracks')->group(function () {
        Route::get('/trash', [TrackController::class, 'getTrashed'])->name('tracks.getTrashed');
        Route::get('/restore/{id}', [TrackController::class, 'restore'])->name('tracks.restore');
        Route::delete('/force_destroy/{id}', [TrackController::class, 'force_destroy'])->name('tracks.force_destroy');
        Route::get('tracks/export/', [TrackController::class, 'export'])->name('tracks.export');
    });
    Route::resource('tracks', TrackController::class);

    // tracksteps
    Route::prefix('tracksteps')->group(function () {
        Route::put('SoftDeletes/{id}', [TrackStepController::class, 'SoftDeletes'])->name('tracksteps.SoftDeletes');
        Route::get('trash', [TrackStepController::class, 'trash'])->name('tracksteps.trash');
        Route::put('RestoreDelete/{id}', [TrackStepController::class, 'RestoreDelete'])->name('tracksteps.RestoreDelete');
        Route::get('/export-track_steps', [TrackStepController::class, 'export'])->name('export-track_steps');
    });
    Route::resource('tracksteps', TrackStepController::class);

    // courses
    Route::prefix('courses')->group(function () {
        Route::put('SoftDeletes/{id}', [CourseController::class, 'SoftDeletes'])->name('courses.SoftDeletes');
        Route::get('trash', [CourseController::class, 'trash'])->name('courses.trash');
        Route::put('RestoreDelete/{id}', [CourseController::class, 'RestoreDelete'])->name('courses.RestoreDelete');
        Route::get('export-courses', [CourseController::class, 'exportCourse'])->name('levels.export-courses');
    });
    Route::resource('courses', CourseController::class);

    // levels
    Route::prefix('levels')->group(function () {
        Route::put('SoftDeletes/{id}', [LevelController::class, 'SoftDeletes'])->name('levels.SoftDeletes');
        Route::get('trash', [LevelController::class, 'trash'])->name('levels.trash');
        Route::put('RestoreDelete/{id}', [LevelController::class, 'RestoreDelete'])->name('levels.RestoreDelete');
        Route::get('export-levels', [LevelController::class, 'exportLevel'])->name('levels.export-levels');
    });
    Route::resource('levels', LevelController::class);

    // WillLearns
    Route::prefix('WillLearns')->group(function () {
        Route::put('SoftDeletes/{id}', [WillLearnController::class, 'SoftDeletes'])->name('WillLearns.SoftDeletes');
        Route::get('trash', [WillLearnController::class, 'trash'])->name('WillLearns.trash');
        Route::put('RestoreDelete/{id}', [WillLearnController::class, 'RestoreDelete'])->name('WillLearns.RestoreDelete');
        Route::get('export-WillLearns', [WillLearnController::class, 'exportWillLearn'])->name('levels.export-WillLearns');
    });
    Route::resource('WillLearns', WillLearnController::class);
});
