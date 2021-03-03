@extends('layouts.topbar')



@section('content')



   <div class="container">

       <div style="background-color: #eceff1; padding: 20px;">
    <h1>Reporte por Sector </h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Sector</th>
            <th>Adultos</th>
            <th>Niños</th>
            <th>Inconversos</th>
            <th>Conversiones</th>
            <th>IBBAJ</th>
            <th>CCDL</th>
        </tr>
        </thead>
        <tbody>
@foreach($reporte as $x => $zona)
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


                    <tr style="{{isset($fr[$x.$y.$z.$a])? '' : 'background-color:#ff6f60' }}">
                        @foreach($sector as $sectorIndividual)

                                    @if(array_search($x.$y.$z.$a, $sectorIndividual) == "codigo_sector")
                                <td>  {{$sectorIndividual['codigo_sector']}}</td>
                                <td>  {{$sectorIndividual['supervisor']}}</td>
                                    @endif
                        @endforeach


                                @if(isset($fr[$x.$y.$z.$a]))
                                <td> {{$fr[$x.$y.$z.$a]['adultos']}} </td>
                                <td>{{$fr[$x.$y.$z.$a]['niños']}}</td>
                                <td>{{$fr[$x.$y.$z.$a]['inconversos']}}</td>
                                <td>{{$fr[$x.$y.$z.$a]['conversiones']}}</td>
                                <td>{{$fr[$x.$y.$z.$a]['ccdl']}}</td>
                                <td>{{$fr[$x.$y.$z.$a]['ibbaj']}}</td>
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
       </div>



       <div style="background-color: #eceff1; padding: 20px;">
           <h1>Reporte por Grupo </h1>

           <table class="table table-striped table-bordered">
               <thead>
               <tr>
                   <th>Codigo</th>
                   <th>Sector</th>
                   <th>Adultos</th>
                   <th>Niños</th>
                   <th>Inconversos</th>
                   <th>Conversiones</th>
                   <th>IBBAJ</th>
                   <th>CCDL</th>
               </tr>
               </thead>
               <tbody>
               @foreach($reporte as $x => $zona)
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



                                    <tr>
                                        <th>
                                            {{$grupo->codigo_grupo}}
                                        </th>
                                        <th>
                                            {{$grupo->lider}}
                                        </th>
                                        @foreach($wReportes as $wr)
                                            @if($wr->codigo_grupo == $grupo->codigo_grupo)

                                                <td>{{$wr->asistencia_adultos}}</td>
                                                <td>{{$wr->asistencia_niños}}</td>
                                                <td>{{$wr->invitados_inconversos}}</td>
                                                <td>{{$wr->conversiones}}</td>
                                                <td>{{$wr->integrados_ccdl}}</td>
                                                <td>{{$wr->integrados_biblico}}</td>

                                            @endif
                                        @endforeach
                                    </tr>
                               @endforeach


                               {{--<tr style="{{isset($fr[$x.$y.$z.$a])? '' : 'background-color:#ff6f60' }}">
                                   @foreach($sector as $sectorIndividual)

                                       @if(array_search($x.$y.$z.$a, $sectorIndividual) == "codigo_sector")
                                           <td>  {{$sectorIndividual['codigo_sector']}}</td>
                                           <td>  {{$sectorIndividual['supervisor']}}</td>
                                       @endif
                                   @endforeach


                                   @if(isset($fr[$x.$y.$z.$a]))
                                       <td> {{$fr[$x.$y.$z.$a]['adultos']}} </td>
                                       <td>{{$fr[$x.$y.$z.$a]['niños']}}</td>
                                       <td>{{$fr[$x.$y.$z.$a]['inconversos']}}</td>
                                       <td>{{$fr[$x.$y.$z.$a]['conversiones']}}</td>
                                       <td>{{$fr[$x.$y.$z.$a]['ccdl']}}</td>
                                       <td>{{$fr[$x.$y.$z.$a]['ibbaj']}}</td>
                                   @else
                                       <td> {{"--"}}</td>
                                       <td> {{"--"}}</td>
                                       <td> {{"--"}}</td>
                                       <td> {{"--"}}</td>
                                       <td> {{"--"}}</td>
                                       <td> {{"--"}}</td>

                                   @endif






                               </tr>--}}



                           @endforeach
                       @endforeach
                   @endforeach
               @endforeach

               </tbody>
           </table>
       </div>

    </div>

@endsection
