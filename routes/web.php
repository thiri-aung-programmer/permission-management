<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;


// Login routes
// Route::view('/test','loginpage');
Route::get('/stock', function () {
    return view('stock');
});
Route::get('/test',Counter::class);
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
    Route::get('{role}/edit','edit')->name('role.edit');
    Route::post('{role}/update','update')->name('role.update');
    Route::delete('{role}/delete','destroy')->name('role.delete');
    Route::get('{role}/permissions','showpermissions')->name('role.permissions');
    Route::post('{role}/updatePermission','updatePermissions')->name('role.updatePermission');
    Route::get('viewPermissionRole','viewPermissionRole')->name('role.viewPermissionRole');
   
}
);

Route::prefix('feature')->controller(FeatureController::class)->middleware('auth')->group(function () {
   
    Route::get('/','index')->name('feature.view');
    Route::view('add','features.add');
    Route::post('create','create');
    Route::get('{feature}/edit','edit')->name('feature.edit');
    Route::post('{feature}/update','update')->name('feature.update');
    Route::delete('{feature}/delete','destroy')->name('feature.delete');
}
);

Route::prefix('admin-user')->controller(AdminUserController::class)->middleware('auth')->group(function () {
   
    Route::get('/','index')->name('admin-user.view');
    Route::get('add','add')->name("admin-user.add");
    Route::post('create','create')->name("admin-user.create");
    Route::get('{adminuser}/edit','edit')->name("admin-user.edit");
    Route::post('{adminuser}/update','update')->name("admin-user.update");
    Route::delete('{adminuser}/delete','destroy')->name('admin-user.delete');
   
}
);
Route::resource('permission',PermissionController::class)->middleware('auth');
 

