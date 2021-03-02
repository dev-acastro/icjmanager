@extends('layouts.topbar')



@section('content')

{{$reportes}}

  {{--  @foreach($sector as $sector)

        @if(array_search("Z1D1A1S1", $sector) == "codigo_sector")


        {{$sector['supervisor']}}
        @endif

    @endforeach--}}

    <div class="container">

    <h1>Reporte</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Grupo</th>
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


                     {{--       <div style="width: 50%; background-color: #8a6d3b; height: 30px; text-align: center; margin: 10px auto; color:white;">--}}
                                @foreach($sector as $sectorIndividual)

                                    @if(array_search($x.$y.$z.$a, $sectorIndividual) == "codigo_sector")


                                <th>  {{$sectorIndividual['codigo_sector']}}</th>
                                <th>  {{$sectorIndividual['supervisor']}}</th>
                                    @endif

                                @endforeach
                            {{--</div>--}}


                    </tr>

                @endforeach
            @endforeach
        @endforeach
    @endforeach

        </tbody>
    </table>

    </div>

@endsection
