<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Reporte;
use Backpack\CRUD\app\Library\Widget;
use Carbon\Traits\Creator;
use DateTime;
use Illuminate\Http\Request;
use App\Classes\GrupoArray;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
Use PDF;


class ReporteriaController extends Controller
{
    //
    public function reporteSemanal(){
        $reporte = new GrupoArray();
        $reporteArray = $reporte->getArray();
        $sector = Sector::all()->toArray();
        $allReports = Reporte::all()->toArray();
        $dr = [];
        $reportes = DB::table('reportes')->whereRaw("WEEKOFYEAR(FECHA) = WEEKOFYEAR(NOW())-1")->get();
        $fr = array();
        $fixedReportes = array();
        $byWeekReports = array();


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
                }elseif(!isset($fr[$key])){
                    $fr[$key]['adultos'] =(int)$drrr->asistencia_adultos;
                    $fr[$key]['niños'] =(int)$drrr->asistencia_niños;
                    $fr[$key]['inconversos'] =(int)$drrr->invitados_inconversos;
                    $fr[$key]['conversiones'] =(int)$drrr->conversiones;
                    $fr[$key]['ccdl'] =(int)$drrr->integrados_ccdl;
                    $fr[$key]['ibbaj'] =(int)$drrr->integrados_biblico;
                }
            }
        }

        foreach($reportes as $cg ){
            $fixedReportes[$cg->codigo_grupo] = $cg;
        }

        return view('reportes.reporte', ["reporte"=>$reporteArray, 'sector'=> $sector, 'wReportes' => $fixedReportes, 'fr' =>$fr]);
    }





    public function chart (){

        $reportesByDate=array();
        $reportes= Reporte::all();
        $reportesByZona=array();

      foreach ($reportes as $a => $reporte){

            $ddate = $reporte->fecha;
            $date = new DateTime($ddate);
            $week = $date->format("W");
            $zona = substr($reporte->codigo_grupo, 0, 2);

            if(!isset($reportesByZona[$zona]) or
                !isset($reportesByZona[$zona][$week]) or
                !isset($reportesByZona[$zona][$week]['adultos']) or
                !isset($reportesByZona[$zona][$week]['niños']))
            {
                $reportesByZona[$zona][$week]['adultos'] = $reporte->asistencia_adultos;
            }else{
                $reportesByZona[$zona][$week]['adultos'] += $reporte->asistencia_adultos;
                $reportesByZona[$zona][$week]['niños'] += $reporte->asistencia_niños;
            }




            $reportesByDate[$week][$reporte->codigo_grupo] = $reporte;
      }



      return view('reportes.charts', ["reportes" => $reportes]);

    }

    public function print(){
        set_time_limit(300);

        $reporte = new GrupoArray();
        $reporteArray = $reporte->getArray();
        $sector = Sector::all()->toArray();
        $dr = [];
        $reportes = DB::table('reportes')->whereRaw("WEEKOFYEAR(FECHA) = WEEKOFYEAR(NOW())-1")->get();
        $fr = array();
        $fixedReportes = array();

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

        foreach($reportes as $cg ){
            $fixedReportes[$cg->codigo_grupo] = $cg;
        }


        $pdf = PDF::loadView('prints.semanal', ["reporte"=>$reporteArray, 'sector'=> $sector, 'wReportes' => $fixedReportes, 'fr' =>$fr]);

        $pdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');
        return $pdf->stream('reporteI.pdf');

    }

    public function byMonth(){


        $byWeek = DB::table('reportes')
            ->selectRaw('SUM(asistencia_adultos) as Adultos, SUM(asistencia_niños) as Niños, YEARWEEK(fecha) as Semana')
            ->where('codigo_grupo', 'like', 'Z3%')
            ->groupByRaw('YEARWEEK(fecha)')
            ->get();





        $byMonth = DB::table('reportes')
            ->selectRaw('SUM(asistencia_adultos) as Adultos,
  SUM(asistencia_niños) as Niños,
  MONTHNAME(fecha) as Mes,
  count(asistencia_adultos) as reportes')
            ->where('codigo_grupo', 'like', 'Z3%')
            ->groupByRaw('MONTHNAME(fecha)')
            ->get();






        $byYearMonth = DB::table('reportes')->whereRaw("WEEKOFYEAR(FECHA) = WEEKOFYEAR(NOW())-1")->get();
        $reportes = Reporte::all()->toArray();
        $byMonthArray = array();
        $statsByMonth= array();
        $byMonth = "";

        $adultos = DB::table('reportes')->select(DB::raw('count(asistencia_adultos) as adultos,
count(asistencia_niños) as niños,
YEARWEEK(fecha) as semana

'))->groupBy(DB::raw('YEARWEEK(fecha)'))->get();

        print_r($adultos);


        foreach ($reportes as $reporte){

            $date = new Carbon($reporte['fecha']);
            $month = $date->monthName;
            $year = $date->year;
            $byMonthArray[$year][$month] = $reporte;

         //   print_r($byMonthArray['2021']['February']);


        }



        foreach ($byMonthArray as $key => $year){



            foreach ($year as  $km => $months){

               // echo $km;


                if($km === array_key_first($year)){
                   $statsByMonth[$year][$km]= [
                     'adultos' => 0 ,
                       'niños' => 0 ,
                       'inconversos' => 0 ,
                       'conversiones' => 0 ,

                   ];
                }


                //$statsByMonth[$year][$km]['adultos']+=$months['asistencia_adultos'];

            }
        }

        //print_r($statsByMonth);


    }
}
