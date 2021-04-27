{{--@extends(backpack_view('blank'))--}}

@extends('layouts.topbar')



@section('content')

@if($agrupacion == "sector")

    <div  class="container">
        <div style="background-color: #eceff1; padding: 20px; page-break-after: always;">
        <h1>Reporte por {{$agrupacion}}   </h1>




@foreach($grupos as $ZonaKey => $zona)
               <table  id="" class="table table-striped table-bordered " style=" margin-bottom: 100px">
                   <thead>
                   <tr>
                       <th>Codigo</th>
                       <th>Sector</th>
                       <th>Adultos</th>
                       <th>Niños</th>
                       <th>Inconversos</th>
                       <th>Conversiones</th>
                       <th>Domingo</th>
                       <th>IBBAJ</th>
                       <th>CCDL</th>

                   </tr>
                   </thead>
                   <tbody>

   <tr>
        <th colspan="8">
       <div style="width: 100%; background-color: #0B90C4; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$ZonaKey}}</div>
        </th>
   </tr>
    @foreach($zona as $DistritoKey => $distrito)
        <tr>
            <th colspan="8">
                <div style="width: 100%; background-color: #00bb00; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$DistritoKey}}</div>
            </th>
        </tr>

            @foreach($distrito as $AreaKey => $area)
                <tr>
                    <th colspan="8">
                        <div style="width: 100%; background-color: #2f016b; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$AreaKey}}</div>
                    </th>
                </tr>

                @foreach($area as $SectorKey => $sectores)


                    <tr style="{{isset($reportes[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey])? '' : 'background-color:#ff6f60' }}">



                                <td>  {{$sectores[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]['codigo_sector']}}</td>
                                <td>  {{$sectores[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]['supervisor']}}</td>



                                @if(isset($reportes[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]))
                                <td> {{$reportes[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]['adultos']}} </td>
                                <td>{{$reportes[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]['niños']}}</td>
                                <td>{{$reportes[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]['inconversos']}}</td>
                                <td>{{$reportes[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]['conversiones']}}</td>
                                <td>{{$reportes[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]['ccdl']}}</td>
                                <td>{{$reportes[$ZonaKey.$DistritoKey.$AreaKey.$SectorKey]['ibbaj']}}</td>
                                @else
                                <td> {{"--"}}</td>
                                <td> {{"--"}}</td>
                                <td> {{"--"}}</td>
                                <td> {{"--"}}</td>
                                <td> {{"--"}}</td>
                                <td> {{"--"}}</td>

                                    @endif
                    </tr>

                @endforeach
            @endforeach
        @endforeach
                   </tbody>
               </table>

    @endforeach

        </div>
        @endif


       {{--<div style="background-color: #eceff1; padding: 20px;">
           <h1>Reporte por Grupo </h1>


               @foreach($reporte as $x => $zona)
               <table class="table table-striped table-bordered">
                   <thead>
                   <tr>
                       <th>Codigo</th>
                       <th>Grupo.,</th>
                       <th>Adultos</th>
                       <th>Niños</th>
                       <th>Inconversos</th>
                       <th>Conversiones</th>
                       <th>IBBAJ</th>
                       <th>CCDL</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                       <th colspan="8">
                           <div style="width: 100%; background-color: #0B90C4; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$x}}</div>
                       </th>
                   </tr>
                   @foreach($zona as $y => $distrito)
                       <tr>
                           <th colspan="8">
                               <div style="width: 100%; background-color: #00bb00; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$y}}</div>
                           </th>
                       </tr>

                       @foreach($distrito as $z => $area)
                           <tr>
                               <th colspan="8">
                                   <div style="width: 100%; background-color: #2f016b; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$z}}</div>
                               </th>
                           </tr>

                           @foreach($area as $a => $sectores)

                               <tr>
                                   <th colspan="8">
                                       <div style="width: 100%; background-color: #d4e157; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$a}}</div>
                                   </th>
                               </tr>

                               @foreach($sectores as $cg => $grupo)


                                    <tr style="{{isset($wReportes[$grupo->codigo_grupo])? "" : "background-color: #ff6f60 "}}">
                                        <th>
                                            {{$grupo->codigo_grupo}}
                                        </th>
                                        <th>
                                            {{$grupo->lider}}
                                        </th>

                                        @if(isset($wReportes[$grupo->codigo_grupo]))
                                            <td>{{$wReportes[$grupo->codigo_grupo]->asistencia_adultos}}</td>
                                            <td>{{$wReportes[$grupo->codigo_grupo]->asistencia_niños}}</td>
                                            <td>{{$wReportes[$grupo->codigo_grupo]->invitados_inconversos}}</td>
                                            <td>{{$wReportes[$grupo->codigo_grupo]->conversiones}}</td>
                                            <td>{{$wReportes[$grupo->codigo_grupo]->integrados_ccdl}}</td>
                                            <td>{{$wReportes[$grupo->codigo_grupo]->integrados_biblico}}</td>
                                        @else
                                            <td> {{"--"}}</td>
                                            <td> {{"--"}}</td>
                                            <td> {{"--"}}</td>
                                            <td> {{"--"}}</td>
                                            <td> {{"--"}}</td>
                                            <td> {{"--"}}</td>

                                        @endif

                                    </tr>
                               @endforeach
                           @endforeach
                       @endforeach
                   @endforeach
                   </tbody>
               </table>



               @endforeach
       </div>--}}
   </div>

  {{--  <div style="height: 60px; width: 100%; background-color: red; position: fixed; bottom: 0;">
        <div class="w-100 h-100 bg-primary">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>--}}
@endsection
