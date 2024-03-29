<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PusherNotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController as SensorController;

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

Route::get('/table', [SensorController::class, 'monitoringTable']);
Route::get('/chart', [SensorController::class, 'monitoringChart']);
Route::get('/sensor/{param}/{device_id}', [SensorController::class, 'sensorData']);
Route::post('/filter', [SensorController::class, 'monitoringTableFilter']);

Route::get('/rollback', function() {
    $output = [];
    Artisan::call('db:wipe', ['--force' => true ]);
    Artisan::call('migrate', ['--force' => true ]);
    Artisan::call('db:seed', ['--force' => true ]);
    dd($output);
});

Route::get('/set_env/prod', function() {
    $output = [];
    \Artisan::call('env:set APP_NAME "LVDP"', $output);
    \Artisan::call('env:set APP_ENV "production"', $output);
    \Artisan::call('env:set DB_DATABASE "ojouvdpd_lvdp"', $output);
    \Artisan::call('env:set DB_USERNAME "ojouvdpd_admin"', $output);
    \Artisan::call('env:set DB_PASSWORD "pass_admin"', $output);
    dd($output);
});

Route::get('/set_env/dev', function() {
    $output = [];
    \Artisan::call('env:set APP_NAME "LVDP"', $output);
    \Artisan::call('env:set APP_ENV "local"', $output);
    \Artisan::call('env:set DB_DATABASE "lvdp"', $output);
    \Artisan::call('env:set DB_USERNAME "admin"', $output);
    \Artisan::call('env:set DB_PASSWORD "pass_admin"', $output);
    dd($output);
});

Route::get('/generate_key', function() {
    $output = [];
    dd($output);
});

Route::get('/dashboard', function () {
    return view('content/dashboard');
});
Route::get('/', function () {
    return view('landing');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/devices', [DeviceController::class, 'getDevices']);
Route::post('/devices', [DeviceController::class, 'patchDevice'])->name('devices.patch');
Route::get('/dashboard/{device_uuid}/sensor', [SensorController::class, 'getData']);
Route::get('/dashboard/{device_uuid}', [SensorController::class, 'getDashboard']);
Route::get('/table/{device_uuid}', [SensorController::class, 'getTable']);
Route::post('/table/{device_uuid}', [SensorController::class, 'getTableFilter'])->name('filter.table');
Route::get('/table/{device_uuid}', [SensorController::class, 'getTable']);

Route::get('/chart/{device_uuid}', [SensorController::class, 'getChart']);
Route::get('/chart/{device_uuid}/sensor', [SensorController::class, 'getDataChart']);

Route::get('/hardware', function () {
    return view('hardware');
});

Route::get('/notification', function () {
    return view('notification');
});
 
Route::get('send',[PusherNotificationController::class, 'notification']);
?>
