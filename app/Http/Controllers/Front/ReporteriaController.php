<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\GrupoArray;
use App\Models\Sector;

class ReporteriaController extends Controller
{
    //

    public function reporteSemanal(){

        $reporte = new GrupoArray();
        $reporteArray = $reporte->getArray();
        $sector = Sector::all()->toArray();


        return view('reportes.reporte', ["reporte"=>$reporteArray, 'sector'=> $sector]);
    }
}
