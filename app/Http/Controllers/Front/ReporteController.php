<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $message = '';
        return view('reportes.login', ['message' => $message]);
    }

    public function login(Request $request){

        $codigo = [];

        $codigo = Grupo::where('codigo_grupo', $request->grupo)->get();

        $reporte = Reporte::where('fecha', 'YEARWEEK(NOW())');

        //var_dump($reporte) ;


       $message = "error";



        if(count($codigo)>0){
            return view('reportes.create', ['id' =>$codigo]);
        }else{

            return view('reportes.login', ['message' => $message]);


        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //



        $report = new Reporte([
            'grupo_id' => $request->input('id'),
            'codigo_grupo' => $request->input('codigo_grupo'),
            'fecha' => $request->input('fecha'),
            'asistencia_adultos'=> $request->input('adultos'),
            'invitados_inconversos' => $request->input('inconversos'),
            'conversiones' => $request->input('conversiones'),
            'integrados_ccdl' => $request->input('ccdl'),
            'integrados_biblico' => $request->input('ibbaj')


        ]);

        $report->save();
        $message = "success";


        return view('reportes.login', ['message' => $message]);

    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
