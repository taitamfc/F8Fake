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
Route::prefix('groups')->group(function () {
    Route::put('SoftDeletes/{id}', [GroupController::class, 'SoftDeletes'])->name('groups.SoftDeletes');
    Route::get('trash', [GroupController::class, 'trash'])->name('groups.trash');
    Route::put('RestoreDelete/{id}', [GroupController::class, 'RestoreDelete'])->name('groups.RestoreDelete');
});
// Route::get('groups/trash', [GroupController::class, 'trashedItems'])->name('groups.trash');
// Route::get('groups/{id}/destroy', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::resource('groups', GroupController::class);

