<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
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

Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
    Route::get('/', function () {
        return view('Admin.master');
    })->middleware('auth');
    Route::prefix('users')->middleware('auth')->group(function () {
        Route::put('SoftDeletes/{id}', [UserController::class, 'SoftDeletes'])->name('users.SoftDeletes');
        Route::get('trash', [UserController::class, 'trash'])->name('users.trash');
        Route::put('RestoreDelete/{id}', [UserController::class, 'RestoreDelete'])->name('users.RestoreDelete');
    });
    Route::resource('users', UserController::class);

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/loginProcessing', [LoginController::class, 'loginProcessing'])->name('loginProcessing');
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
