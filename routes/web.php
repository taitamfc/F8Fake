<?php

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\TrackStepController;
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
Route::get('groups/trash', [GroupController::class, 'trashedItems'])->name('groups.trash');
// Route::get('groups/{id}/destroy', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::resource('groups', GroupController::class);
//  Route::prefix('branches')->group(function () {
// Route::delete('/force_destroy/{id}', [BranchController::class, 'force_destroy'])->name('branches.force_destroy');
// Route::get('/restore/{id}', [BranchController::class, 'restore'])->name('branches.restore');
    // });
