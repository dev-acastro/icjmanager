<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('area', 'AreaCrudController');
    Route::crud('distrito', 'DistritoCrudController');
    Route::crud('grupo', 'GrupoCrudController');
    Route::crud('reporte', 'ReporteCrudController');
    Route::crud('sector', 'SectorCrudController');
    Route::crud('usuario', 'UsuarioCrudController');
    Route::crud('zona', 'ZonaCrudController');
    Route::get('charts/general-charts', 'Charts\GeneralChartsChartController@response')->name('charts.general-charts.index');
    Route::get('charts/weekly-report', 'Charts\WeeklyReportChartController@response')->name('charts.weekly-report.index');
}); // this should be the absolute last line of this file