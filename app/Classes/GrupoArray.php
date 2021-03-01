<?php

namespace App\Classes;

use App\Models\Zona;
use App\Models\Distrito;
use App\Models\Area;
use App\Models\Sector;
use App\Models\Grupo;
use App\Models\Reporte;

Class GrupoArray {
   public $grupoArray = array();

   public function getArray(){

       $grupos = Grupo::all();
       foreach ($grupos as $grupo){
          // echo $grupo . "<br><br><hr>";
           $cZ = substr($grupo->codigo_grupo, 0, 2);
           $cD = substr($grupo->codigo_grupo, 2, 2);
           $cA = substr($grupo->codigo_grupo, 4, 2);
           $cS = substr($grupo->codigo_grupo, 6, 2);
           $cG = substr($grupo->codigo_grupo, 8, 2);
           if($cZ == "Z1" or $cZ == "Z2" or $cZ == "Z3"){
           $this->grupoArray[$cZ][$cD][$cA][$cS][$cG] = $grupo;
           }
       }

       return(json_decode(json_encode($this->grupoArray)));



}


}




