<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use Illuminate\Support\Facades\Route;


// Login routes
Route::get("/", [HomeController::class,'index'])->middleware('guest')->name('home');
Route::view('/login', 'auth.login')

    ->middleware('guest')

    ->name('login');

 

Route::post('/login', Login::class)

    ->middleware('guest');

 

// Logout route

// Route::get('/logout', [Logout::class, 'logout']);
Route::post('/logout', Logout::class)

    ->middleware('auth')

    ->name('logout');


    // Route::get('/dashboard', function () {
    //     return view("login");
    // })->name('dashboard');
    Route::get("/dashboard",[HomeController::class,"dashboard"])->name("dashboard");

// Route::post('/login',route('admin-user.view'));
// Route::post('/login', [Login::class, 'login'])->name('login');
Route::prefix('role')->controller(RoleController::class)->middleware('auth')->group(function () {
  
    Route::get('/','index')->name('role.view');
    Route::view('add','roles.add')->name('role.add');
    Route::post('create','create')->name('role.create');
    Route::get('edit/{id}','edit')->name('role.edit');
    Route::post('update/{id}','update')->name('role.update');
    Route::delete('delete/{id}','destroy')->name('role.delete');
    Route::get('/permissions/{id}','showpermissions')->name('role.permissions');
    Route::post('updatePermission/{id}','updatePermissions')->name('role.updatePermission');
    Route::get('viewPermissionRole','viewPermissionRole')->name('role.viewPermissionRole');
   
}
);

Route::prefix('feature')->controller(FeatureController::class)->middleware('auth')->group(function () {
   
    Route::get('/','index')->name('feature.view');
    Route::view('add','features.add');
    Route::post('create','create');
    Route::get('edit/{id}','edit');
    Route::post('update/{id}','update');
    Route::delete('delete/{id}','destroy')->name('feature.delete');
}
);

Route::prefix('admin-user')->controller(AdminUserController::class)->middleware('auth')->group(function () {
   
    Route::get('/','index')->name('admin-user.view');
    Route::get('add','add')->name("admin-user.add");
    Route::post('create','create')->name("admin-user.create");
    Route::get('edit/{id}','edit')->name("admin-user.edit");
    Route::post('update/{id}','update')->name("admin-user.update");
    Route::delete('delete/{id}','destroy')->name('admin-user.delete');
}
);
Route::resource('permission',PermissionController::class)->middleware('auth');
 

