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
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/', [StudentController::class, 'store'])->name('students.store');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/{id}/destroy', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/trash', [StudentController::class, 'trash'])->name('students.trash');
});

Route::prefix('banners')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banners.index');
    Route::get('/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('/', [BannerController::class, 'store'])->name('banners.store');
    Route::get('/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::put('/{id}', [BannerController::class, 'update'])->name('banners.update');
    Route::get('/{id}/destroy', [BannerController::class, 'destroy'])->name('banners.destroy');
    Route::get('/trash', [BannerController::class, 'trash'])->name('banners.trash');
});

// Route::get('/index', function () {
//     // echo '<br>'.route('index');
//     // echo '<br>'.route('create');

//     // goi view
//     $params = [
//         'first_name' => 'Nguyen Van',
//         'last_name' => 'A',
//     ];
//     return view('welcome', $params);

// })->name('index');

// Route::get('/create1234',function(){
//     dd('Trang them moi');
// })->name('create');

// // Nhan du lieu tu form them moi
// Route::post('/store',function(Request $request){
//     dd( $request->all() );
// });

// Route::get('/edit/{id}', function( $id ){
//     dd('Trang chinh sua' . $id);
// });

// // Nhan du lieu tu form cap nhat
// Route::put('/update/{id}',function(Request $request, $id){
//     dd( $request->all() );
// });
// Route::delete('/destroy/{id}',function($id){

// });
