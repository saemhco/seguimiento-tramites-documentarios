<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Redirect;
use Carbon\Carbon;

class CardexController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //date_default_timezone_set('America/Lima');
        //$anio=date("Y").'%';
        $anio = Carbon::now()->format('Y').'%';
        $tipo=$id;
        switch ($id) {
            
            case '0':
                $cardex = DB::table('registros')->join('users', 'users.id', '=', 'registros.users_id')
                                                ->where('users.oficinas_id',Auth::user()->oficinas_id)
                                                ->where('registros.created_at', 'like',$anio)->orderBy('registros.n','asc')
                                                ->select('registros.n as cardex')->get();
                break;
            case '1':case '2':case '3':case '4':case '5':case '6':case '7':
            $cardex = DB::table('descargos')->join('users', 'users.id', '=', 'descargos.users_id')
                                            ->where('descargos.tipo_doc',$id)
                                            ->where('users.oficinas_id',Auth::user()->oficinas_id)
                                            ->where('descargos.created_at', 'like',$anio)
                                            ->get();
                break;
            default: 
                return Redirect::to('registro')->with('message','advertencia');
                break;
        }
        return view('cardex.cardex',compact('cardex','tipo'));
    }

    public function nuevo_cardex_descargo(Request $request)
    {
        //fecha actual, si lo puedes hacer con CARBON corriges el where (created_at,like, fechaactual)
        $anio = Carbon::now()->format('Y').'%';
       
      
        $id=$request->get('id');
          $datos=\App\Descargo::join('users', 'users.id', '=', 'descargos.users_id')
                            ->where('descargos.tipo_doc',$id)
                            ->where('users.oficinas_id',Auth::user()->oficinas_id)
                            ->where('descargos.created_at', 'like',$anio)
                            ->select('descargos.cardex as caxd')
                            ->get();


        
        //Buscamos el número mayor y le agregamos 1
        $mayor=0;
        if (!empty($datos)){
        
       
        foreach ($datos as $car) {
            
            if($car->caxd>$mayor)
                $mayor=$car->caxd;
        }
        }
        return $mayor+1;

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
