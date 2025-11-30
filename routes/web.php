<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('index',[RoleController::class,'index']);
// });
Route::prefix('role')->controller(RoleController::class)->group(function () {
    Route::get('roleindex','index1');
    Route::get('/','index');
    Route::view('add','roles.add');
    Route::post('create','create');
    Route::get('edit/{id}','edit');
    Route::post('update/{id}','update');
    Route::delete('delete/{id}','destroy')->name('role.delete');
}
);