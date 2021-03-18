<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\BaseChart;
use Chartisan\PHP\Chartisan;



/**
 * Class GeneralChartsChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GeneralChartsChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels([
            'Semana1',
            'Semana2',
            'Semana3',
            'Semana4',
        ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/general-charts'));


    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
     public function data()
     {



                 $this->chart->dataset('Users Created', 'bar', ['1', '2', '3', '4' ])
             ->color('rgba(205, 32, 31, 1)')
             ->backgroundColor('rgba(205, 32, 31, 0.4)');
     }
}
