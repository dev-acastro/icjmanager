@extends('layouts.topbar')



@section('content')

    @foreach($sector as $sector)

        {{array_search("1", $sector)}}

    @endforeach

    <h1>Reporte</h1>



    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        </thead>

        <tbody>






@foreach($reporte as $x => $zona)
   <tr>
        <th colspan="3">
       <div style="width: 50%; background-color: #0B90C4; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$x}}</div>
        </th>
   </tr>
    @foreach($zona as $y => $distrito)
        <tr>
            <th colspan="3">
                <div style="width: 50%; background-color: #00bb00; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$y}}</div>
            </th>
        </tr>

            @foreach($distrito as $z => $area)
                <tr>
                    <th colspan="3">
                        <div style="width: 50%; background-color: #2f016b; height: 30px; text-align: center; margin: 10px auto; color:white;">{{$z}}</div>
                    </th>
                </tr>

                @foreach($area as $a => $sector)
                    <tr>
                        <th>
                           <!-- <div style="width: 50%; background-color: #8a6d3b; height: 30px; text-align: center; margin: 10px auto; color:white;"></div>-->
                        </th>

                    </tr>

                @endforeach
            @endforeach
        @endforeach
    @endforeach

        </tbody>
    </table>

@endsection
