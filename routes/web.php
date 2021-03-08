<?php

use App\Mail\ReporteEntregado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ReporteController;
use App\Classes\GrupoArray;

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

/*Route::get('/', function () {
     return redirect ('/reporte');
});*/

Route::redirect('/', '/reporte');

Route::resource('reporte', ReporteController::class);

Route::post('reporte/login', [ReporteController::class, 'login'])->name('reporteLogin');

Route::get('reporte/create/{id}', [ReporteController::class, 'create'])->name('reporteCreate');

Route::get('/reporteSemanal', [\App\Http\Controllers\Front\ReporteriaController::class, 'reporteSemanal']);

Route::get('/chart', [\App\Http\Controllers\Front\ReporteriaController::class, 'chart']);
