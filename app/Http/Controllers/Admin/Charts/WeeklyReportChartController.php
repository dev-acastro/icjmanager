<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

/**
 * Class WeeklyReportChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklyReportChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels([
            'Today',
        ]);

        $this->chart->dataset('Red', 'pie', [10, 20, 80, 30])
            ->backgroundColor([
                'rgb(70, 127, 208)',
                'rgb(77, 189, 116)',
                'rgb(96, 92, 168)',
                'rgb(255, 193, 7)',
            ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/weekly-report'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        // $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
//     public function data()
//     {
//         $reportes = $reportes = DB::table('reportes')->whereRaw("WEEKOFYEAR(FECHA) = WEEKOFYEAR(NOW())-1")->get();
//
//         $this->chart->dataset('Reportes', 'bar', [
//                     $reportes,
//                 ])
//             ->color('rgba(205, 32, 31, 1)')
//             ->backgroundColor('rgba(205, 32, 31, 0.4)');
//     }
}
