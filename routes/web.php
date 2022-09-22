<?php

use App\Http\Controllers\Admin\TrackStepController;
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

Route::get('/', function(){
    return view('Admin.master');
});
Route::prefix('tracksteps')->group(function () {
    Route::put('SoftDeletes/{id}', [TrackStepController::class, 'SoftDeletes'])->name('tracksteps.SoftDeletes');
    Route::get('trash', [TrackStepController::class, 'trash'])->name('tracksteps.trash');
    Route::put('RestoreDelete/{id}', [TrackStepController::class, 'RestoreDelete'])->name('tracksteps.RestoreDelete');
});
Route::resource('tracksteps', TrackStepController::class);
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
