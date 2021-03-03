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
        $dr = [];
        $reportes = DB::table('reportes')->whereRaw("WEEKOFYEAR(FECHA) = WEEKOFYEAR(NOW())-1")->get();
        $fr = array();

        foreach ($reportes as  $wr){
         $dr[substr($wr->codigo_grupo, 0, 8)][] = $wr;
        }
        foreach ($dr as $drr){
            foreach ($drr as $drrr){
                $key = substr($drrr->codigo_grupo, 0,8);
                if(isset($fr[$key])){
                    $fr[$key]['adultos'] +=$drrr->asistencia_adultos;
                    $fr[$key]['niños'] +=$drrr->asistencia_niños;
                    $fr[$key]['inconversos'] +=$drrr->invitados_inconversos;
                    $fr[$key]['conversiones'] +=$drrr->conversiones;
                    $fr[$key]['ccdl'] +=$drrr->integrados_ccdl;
                    $fr[$key]['ibbaj'] +=$drrr->integrados_biblico;
                }else{
                    $fr[$key]['adultos'] =(int)$drrr->asistencia_adultos;
                    $fr[$key]['niños'] =(int)$drrr->asistencia_niños;
                    $fr[$key]['inconversos'] =(int)$drrr->invitados_inconversos;
                    $fr[$key]['conversiones'] =(int)$drrr->conversiones;
                    $fr[$key]['ccdl'] =(int)$drrr->integrados_ccdl;
                    $fr[$key]['ibbaj'] =(int)$drrr->integrados_biblico;
                }
            }
        }





        return view('reportes.reporte', ["reporte"=>$reporteArray, 'sector'=> $sector, 'wReportes' => $reportes, 'fr' =>$fr]);
    }
}
