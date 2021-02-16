<?php

use App\Mail\ReporteEntregado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ReporteController;

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

Route::get('/mail', function (){

    $user = json_decode('{
        "id": 162,
  "codigo_grupo": "Z3D1A1S1G1",
  "lider": "Arturo Castro Grupo",
  "telefono": "71506102",
  "email": "armicasdi@gmail.com",
  "sector_id": 37,
  "created_at": "2021-02-15T21:43:56.000000Z",
  "updated_at": "2021-02-15T21:43:56.000000Z",
  "sector": {
            "id": 37,
    "codigo_sector": "Z3D1A1S1",
    "supervisor": "Arturo Castro Sector",
    "telefono": "71506102",
    "email": "armicasdi@gmail.com",
    "area_id": 14,
    "created_at": "2021-02-15T21:43:20.000000Z",
    "updated_at": "2021-02-15T21:43:20.000000Z"
  }
}');

$report = json_decode('{
  "grupo_id": 162,
  "codigo_grupo": "Z3D1A1S1G1",
  "fecha": "2021-02-18T00:00:00.000000Z",
  "asistencia_adultos": "10",
  "invitados_inconversos": "10",
  "conversiones": "10",
  "integrados_ccdl": "10",
  "integrados_biblico": "10",
  "updated_at": "2021-02-16T15:19:25.000000Z",
  "created_at": "2021-02-16T15:19:25.000000Z",
  "id": 63
}');

$email = 'armicasdi@gmail.com';

    Mail::to($email)->send(new ReporteEntregado($report, $user));


    return view('mail.ReporteEntregado', ['grupo' => $user, 'reporte' => $report]);
});

