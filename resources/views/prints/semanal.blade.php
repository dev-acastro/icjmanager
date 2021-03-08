<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte Semanal</title>

</head>
<body>

<style>
    .tdzona{
        background-color: #00bb00;
    }

    .tddistrito{
        background-color: #0B90C4;
    }
    .tdarea{
        background-color: #7f3244;
    }
    tr{
        padding: 100px 0;
        margin: 50px 0;
    }

    th,td{
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
    table{
        page-break-after: always;
        margin-bottom: 100px;
        border: 1px solid gray;
    }

</style>


        <div style=" padding: 20px; page-break-after: always;">
            <h1>Reporte por Sector </h1>

            @foreach($reporte as $x => $zona)

                                <table>
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


                                    <tr>
                                        <th colspan="8" class="tdzona">
                                            {{$x}}
                                        </th>
                                    </tr>
                                    @foreach($zona as $y => $distrito)
                                        <tr>
                                            <th colspan="8" class="tddistrito">
                                                {{$y}}
                                            </th>
                                        </tr>

                                        @foreach($distrito as $z => $area)
                                            <tr>
                                                <th colspan="8" class="tdarea">
                                                    {{$z}}
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

                                </table>

            @endforeach

        </div>

       {{-- <div style="background-color: #eceff1; padding: 20px;">
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


</body>
</html>
