<?php

use App\Http\Controllers\{
    AboutController,
    DashboardController,
    FrontController,
    PakanManualController,
    PemberiMinumController,
    PenjadwalanPakanController,
    PermissionController,
    PermissionGroupController,
    RoleController,
    SensorPakanController,
    SettingController,
    UserController
};
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.landingpage');
// });
Route::get('/', [FrontController::class, 'landingpage'])->name('landingpage');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['role_or_permission:Dashboard Index']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::group(['middleware' => ['permission:User Index']], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/ajax/users/role_search', 'roleSearch')->name('users.role_search');
            Route::get('/users/data', 'data')->name('users.data');
            Route::get('/users', 'index')->name('users.index');
            Route::get('/users/{users}/detail', 'detail')->name('users.detail');
            Route::get('/users/{users}', 'edit')->name('users.edit');
            Route::put('/users/{users}/update', 'update')->name('users.update');
            Route::post('/users', 'store')->name('users.store');
            Route::delete('/users/{users}/destroy', 'destroy')->name('users.destroy');
            Route::delete('/user/profile', 'show')->name('profile.show');;
        });
    });

    Route::group(['middleware' => ['permission:Role Index']], function () {
        Route::controller(RoleController::class)->group(function () {
            Route::get('/role/data', 'data')->name('role.data');
            Route::get('/role', 'index')->name('role.index');
            Route::get('/role/{role}/detail', 'detail')->name('role.detail');
            Route::get('/role/{role}', 'edit')->name('role.edit');
            Route::put('/role/{role}/update', 'update')->name('role.update');
            Route::post('/role', 'store')->name('role.store');
            Route::delete('/role/{role}/destroy', 'destroy')->name('role.destroy');
        });
    });

    Route::group(['middleware' => ['permission:Permission Index']], function () {
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/permissions/data', 'data')->name('permission.data');
            Route::get('/permissions', 'index')->name('permission.index');
            Route::get('/permissions/{permission}/detail', 'detail')->name('permission.detail');
            Route::get('/permissions/{permission}', 'edit')->name('permission.edit');
            Route::put('/permissions/{permission}/update', 'update')->name('permission.update');
            Route::post('/permissions', 'store')->name('permission.store');
            Route::delete('/permissions/{permission}/destroy', 'destroy')->name('permission.destroy');
        });
    });

    Route::group(['middleware' => ['permission:Group Permission Index']], function () {
        Route::controller(PermissionGroupController::class)->group(function () {
            Route::get('/permissiongroups/data', 'data')->name('permissiongroups.data');
            Route::get('/permissiongroups', 'index')->name('permissiongroups.index');
            Route::get('/permissiongroups/{permissionGroup}/detail', 'detail')->name('permissiongroups.detail');
            Route::get('/permissiongroups/{permissionGroup}', 'edit')->name('permissiongroups.edit');
            Route::put('/permissiongroups/{permissionGroup}/update', 'update')->name('permissiongroups.update');
            Route::post('/permissiongroups', 'store')->name('permissiongroups.store');
            Route::delete('/permissiongroups/{permissionGroup}/destroy', 'destroy')->name('permissiongroups.destroy');
        });
    });

    Route::group(['middleware' => ['permission:Pengaturan Index']], function () {
        Route::controller(SettingController::class)->group(function () {
            Route::get('/setting', 'index')->name('setting.index');
            Route::put('/setting/{setting}', 'update')->name('setting.update');
        });
    });

    // ROUTE PENJADWALAN
    Route::group(['middleware' => ['permission:Penjadwalan Pakan Index']], function () {
        Route::get('penjadwalan/data', [PenjadwalanPakanController::class, 'data'])->name('penjadwalanpakan.data');
        Route::resource('penjadwalan', PenjadwalanPakanController::class);
    });

    // ROUTE SENSOR PAKAN
    Route::group(['middleware' => ['permission:Sensor Pakan Index']], function () {
        Route::get('sensorpakan/data', [SensorPakanController::class, 'data'])->name('sensorpakan.data');
        Route::resource('sensorpakan', SensorPakanController::class);
    });

    // ROUTE SENSOR MINUM
    Route::group(['middleware' => ['permission:Sensor Minum Index']], function () {
        Route::get('sensorminum/data', [PemberiMinumController::class, 'data'])->name('sensorminum.data');
        Route::resource('sensorminum', PemberiMinumController::class);
    });

    // Monitoring
    Route::get('pakanmanual/status', [PakanManualController::class, 'getStatus'])->name('pakanmanual.status');
    Route::resource('/pakanmanual', PakanManualController::class);

    // Route::group(['middleware' => ['permission: About Index']], function () {
    // });
    Route::get('/abouts/data', [AboutController::class, 'data'])->name('abouts.data');
    Route::resource('/abouts', AboutController::class);
});
