<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Reporte;
use Illuminate\Http\Request;
use App\Classes\GrupoArray;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReporteriaController extends Controller
{
    //

    public function reporteSemanal(){

        $reporte = new GrupoArray();
        $reporteArray = $reporte->getArray();
        $sector = Sector::all()->toArray();

        $reportes = DB::table('reportes')->where("WEEKOFYEAR(`fecha`)", "=", "WEEKOFYEAR(NOW())-1")->get();
        return count($reportes);


        return view('reportes.reporte', ["reporte"=>$reporteArray, 'sector'=> $sector, 'reportes' => $reportes]);
    }
}
