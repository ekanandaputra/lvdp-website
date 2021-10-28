<?php

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
    \Artisan::call('env:set APP_ENV "development"', $output);
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
    return view('content/dashboard');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/devices', function () {
    return view('devices');
});