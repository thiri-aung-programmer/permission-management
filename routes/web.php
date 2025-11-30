<?php

use App\Http\Controllers\FeatureController;
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
    Route::get('/','index')->name('role.index');
    Route::view('add','roles.add')->name('role.add');
    Route::post('create','create')->name('role.create');
    Route::get('edit/{id}','edit')->name('role.edit');
    Route::post('update/{id}','update')->name('role.update');
    Route::delete('delete/{id}','destroy')->name('role.delete');
}
);

Route::prefix('feature')->controller(FeatureController::class)->group(function () {
    // Route::get('roleindex','index1');
    Route::get('/','index')->name('feature.index');
    Route::view('add','features.add');
    Route::post('create','create');
    Route::get('edit/{id}','edit');
    Route::post('update/{id}','update');
    Route::delete('delete/{id}','destroy')->name('feature.delete');
}
);