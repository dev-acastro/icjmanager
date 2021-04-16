<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Distrito;
use App\Models\Sector;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class ChartsController extends Controller
{
    //

    public function index(){


        $length = strlen($_GET['codigo']);
        $codigo = $_GET['codigo'];
        $data = "";



        switch ($length) {
            case 2:
                $data = Zona::where("codigo_supervisor", $codigo)->get();
                break;
            case 4:
                $data = Distrito::where("codigo_distrito", $codigo)->get();
                break;
            case 6:
                $data= Area::where("codigo_area", $codigo)->get();
                break;

            case 8:
                $data = Sector::where("codigo_sector", $codigo)->get();

                break;
        }


        $grupos = DB::table('grupos')->where('codigo_grupo', 'like', $codigo."%")->get();
        $reportesThisWeek = DB::table('reportes')->where('codigo_grupo', 'like', $codigo."%")->whereRaw('YEARWEEK(fecha, 1) = YEARWEEK(NOW(), 1)')->get();
        $reportesLastWeek = DB::table('reportes')->where('codigo_grupo', 'like', $codigo."%")->whereRaw('YEARWEEK(fecha, 1) = YEARWEEK(NOW(), 1)-1')->get();
        $reportes = DB::table('reportes')->where('codigo_grupo', 'like', $codigo."%")->get();
        $lastMonth = DB::table('reportes')->where('codigo_grupo', 'like',  $codigo."%")->whereRaw("fecha BETWEEN (NOW() - interval 30 day) AND NOW()")->get();


        $countGroup = count($grupos);

        return view('charts.home', ['countGroup'=>$countGroup]);





    }
}
