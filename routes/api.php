<?php

use App\Http\Controllers\Api\ApiPenjadwalanPakanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemberiMinumController;
use App\Http\Controllers\SensorPakanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/v1/penjadwalanpakan/getJadwalPakan', [ApiPenjadwalanPakanController::class, 'getJadwalPakan'])->name('api.penjadwalanpakan.jadwalpakan');
Route::get('/v1/penjadwalanpakan/bacadata', [ApiPenjadwalanPakanController::class, 'bacadata'])->name('api.penjadwalanpakan.bacadata');
Route::get('/v1/penjadwalanpakan/ubahstatus', [ApiPenjadwalanPakanController::class, 'ubahstatus'])->name('api.penjadwalanpakan.ubahstatus');

Route::get('/v1/sensorpakan/delete_all', [SensorPakanController::class, 'deleteAll'])->name('api.sensorpakan.delete_all');
Route::get('/v1/sensorminum/delete_all', [PemberiMinumController::class, 'deleteAll'])->name('api.sensorminum.delete_all');

Route::get('/v1/monitoring/getDataPakan', [DashboardController::class, 'getDataPakan'])->name('api.monitoring.data_pakan');
