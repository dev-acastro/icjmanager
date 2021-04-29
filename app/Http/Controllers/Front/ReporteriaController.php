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


        $from = $_GET['start'];
        $to = $_GET['end'];
        $cat = $_GET['cat'];
        $codigo =(isset($_GET['codigo']))? $_GET['codigo'] : "";
        $codeCount = strlen($codigo);

        return $codeCount;

        $grupos = (new \App\Classes\GrupoArray)->getarray();

        $reportes ="";
        $sectores = DB::table('sectors')->get();
        $SectoresByCodigo= array();
        $ReportesByCodigo = array();



        if($cat == "grupo"){
            $reportes = DB::table('reportes')->selectRaw('SUM(asistencia_adultos) as adultos, SUM(asistencia_niños) as niños, SUM(invitados_inconversos) as inconversos, SUM(conversiones) as conversiones, SUM(integrados_biblico) as biblico, SUM(integrados_ccdl) as ccdl, SUM(asistencia_domingos) as domingo, codigo_grupo as codigo')
                ->whereBetween('fecha', [$from, $to])
                ->groupBy('codigo')
                ->get();
        }elseif ($cat == "sector"){
            $reportes = DB::table('reportes')->selectRaw('SUM(asistencia_adultos) as adultos, SUM(asistencia_niños) as niños, SUM(invitados_inconversos) as inconversos, SUM(conversiones) as conversiones, SUM(integrados_biblico) as biblico, SUM(integrados_ccdl) as ccdl, SUM(asistencia_domingos) as domingo, SUBSTRING(codigo_grupo, 1,8) as codigo')
                ->whereBetween('fecha', [$from, $to])
                ->groupBy('codigo')
                ->get();
        }elseif ($cat == "code"){
            $reportes = DB::table('reportes')->selectRaw('SUM(asistencia_adultos) as adultos, SUM(asistencia_niños) as niños, SUM(invitados_inconversos) as inconversos, SUM(conversiones) as conversiones, SUM(integrados_biblico) as biblico, SUM(integrados_ccdl) as ccdl, SUM(asistencia_domingos) as domingos, SUBSTRING(codigo_grupo, 1,'. $codeCount.') as codigo')
                ->where("codigo_grupo", "like", $code. "%")
                ->whereBetween('fecha', [$from, $to])
                ->groupBy('codigo')
                ->get();
        }

        foreach($reportes as $reporte ){
            $ReportesByCodigo[$reporte->codigo] = (array)$reporte;
        }

        foreach($sectores as $sector ){
            $SectoresByCodigo[$sector->codigo_sector] = (array)$sector;
        }

        return view('reportes.reporte', ["grupos"=>$grupos, 'sectores'=> $SectoresByCodigo, 'reportes' => $ReportesByCodigo, 'agrupacion'=>$cat]);
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



    public function fullReport(){






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

    public function selectDate(){



        return view('reportes.date');


    }
}
