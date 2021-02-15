<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ReporteEntregado;
use App\Models\Grupo;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\DB;

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

        $codigo_grupo = $request->grupo;
        $codigo = Grupo::where('codigo_grupo', $codigo_grupo)->get();
        $reporte = DB::table('reportes')->where('codigo_grupo', $codigo_grupo)->whereRaw('YEARWEEK(fecha) = YEARWEEK(NOW())')->get();


       $message = "error";



        if(count($codigo)>0){
            if(count($reporte)==0){
                return view('reportes.create', ['id' =>$codigo]);
            }else{
                $message = "entregado";
                return view('reportes.login', ['message' => $message]);
            }

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

        $user = Grupo::find($request->input('id'))->load('Sector');
        //return $user;

        $email = $user->sector->email;

        if($email !== Null){
            Mail::to($email)->send(new ReporteEntregado($report, $user));
        }





       // return view('mail.ReporteEntregado', ['grupo' => $user, 'reporte' => $report]);

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
