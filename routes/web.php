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
Route::middleware('guest')->group(function () {

    // Route::get("/", )->name('home');
    Route::get('/login', [HomeController::class, 'index'])->name('login');
    Route::post('/login', Login::class);

});

// note: middlewrare auth တွေကို တစ်ခါသာ သုံး၍ group ဖွဲ့နိုင်
Route::middleware('auth')->group(function () {

    Route::get("/", [HomeController::class, "dashboard"])->name("dashboard");

    Route::post('/logout', Logout::class)->name('logout');

    Route::prefix('role')->controller(RoleController::class)->group(
        function () {
            Route::get('/', 'index')->name('role.view');
            Route::get('add', 'add')->name('role.add');
            Route::post('create', 'create')->name('role.create');
            Route::get('{role}/edit', 'edit')->name('role.edit');
            Route::post('{role}/update', 'update')->name('role.update');
            Route::delete('{role}/delete', 'destroy')->name('role.delete');
            Route::get('{role}/permissions', 'showpermissions')->name('role.permissions');
            Route::post('{role}/updatePermission', 'updatePermissions')->name('role.updatePermission');
            Route::get('viewPermissionRole', 'viewPermissionRole')->name('role.viewPermissionRole');
        }
    );

    Route::prefix('feature')->controller(FeatureController::class)->group(
        function () {
            Route::get('/', 'index')->name('feature.view');
            Route::get('add', 'features.add');
            Route::post('create', 'create');
            Route::get('{feature}/edit', 'edit')->name('feature.edit');
            Route::post('{feature}/update', 'update')->name('feature.update');
            Route::delete('{feature}/delete', 'destroy')->name('feature.delete');
        }
    );

    Route::prefix('admin-user')->controller(AdminUserController::class)->group(
        function () {
            Route::get('/', 'index')->name('admin-user.view');
            Route::get('add', 'add')->name("admin-user.add");
            Route::post('create', 'create')->name("admin-user.create");
            Route::get('{adminuser}/edit', 'edit')->name("admin-user.edit");
            Route::post('{adminuser}/update', 'update')->name("admin-user.update");
            Route::delete('{adminuser}/delete', 'destroy')->name('admin-user.delete');
        }
    );
    Route::resource('permission', PermissionController::class);
});

