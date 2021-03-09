@extends('layouts.topbar')



@section('content')

    <script>

        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Zona1", "Zona2"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 50,
                            suggestedMax: 100
                        }
                    }]
                }
            }
        });


    </script>



    <div class="container" >


        <canvas id="myChart" width="400" height="400"></canvas>

    </div>

@endsection
