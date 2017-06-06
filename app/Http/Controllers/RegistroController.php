<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use DB;
use Carbon\Carbon;

class RegistroController extends Controller
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
        //$registros = \enfermeria\Models\Registro::all();
       /* $registros = DB::table('registros')
                        ->join('users', 'users.id', '=', 'registros.users_id')
                        ->where('users.oficinas_id', Auth::user()->oficinas_id)
                        ->select('registros.*',
                                 'registros.n',
                                 'registros.documento',
                                 'registros.emisor',
                                 'registros.asunto',
                                 'registros.adjunto',
                                 'registros.users_id',
                                 'registros.users_ed',
                                 'registros.created_at', 
                                 'registros.updated_at')
                        ->get();*/
        if (Auth::user()->id==1) {
           return Redirect::to('admin');
        }
        else{
            $registros=\App\Oficina::Find(Auth::user()->oficinas_id)->registros;                
            $descargos = DB::table('registros')
                ->join('descargos', 'registros.id', '=', 'descargos.registros_id')
                ->where('registros.oficinas_id', Auth::user()->oficinas_id)
                ->select('registros.id as reg','descargos.*')
                ->get();

            //return view('tablas.tablas')->with('registros',$registros);
            $id="datatable-responsive";
            $clase="table table-bordered dt-responsive nowrap";
            $oficina = DB::table('oficinas')->where('id', Auth::user()->oficinas_id)->select('nombre')->first(); 
            $titulo=$oficina->nombre;
            return view('registro.area',compact('registros','descargos', 'id', 'clase', 'titulo'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      
    public function create()
    {
        //date_default_timezone_set('America/Lima');
        //$anio=date("Y").'%';
        $anio = Carbon::now()->format('Y').'%';
        
        $dato=\App\Registro::join('users', 'users.id', '=', 'registros.users_id')
                            ->where('users.oficinas_id',Auth::user()->oficinas_id)
                            ->where('registros.created_at', 'like',$anio)
                            ->select('registros.n')
                            ->orderBy('registros.n','desc')
                            ->first();
        $nums=1;
        if (!empty($dato)){
        $nums+=$dato->n;
       }
        return view('registro.nuevo-registro',compact('nums'));
       
       //return $dato->n;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\Registro::create($request->all());
        return Redirect::to('registro')->with('message','nuevo-registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id=='1') {
                    $registros = DB::table('registros')
                        ->join('oficinas', 'oficinas.id', '=', 'registros.oficinas_id')
                        ->where('oficinas.facultads_id', Auth::user()->oficina->facultad->id)
                        ->select('registros.id','registros.n', 'oficinas.nombre as oficina','registros.documento','registros.emisor','registros.asunto','registros.adjunto','registros.users_id','registros.users_ed','registros.created_at', 'registros.updated_at')
                        ->get();
        $descargos = DB::table('registros')
            ->join('descargos', 'registros.id', '=', 'descargos.registros_id')
            ->select('registros.id as reg')
            ->get();

        $id='datatable-buttons'; $clase='table table-bordered';
        $facultad = DB::table('facultads')
                    ->join('oficinas', 'facultads.id', '=', 'oficinas.facultads_id')
                    ->where('oficinas.id', Auth::user()->oficinas_id)->select('facultads.nombre')
                    ->first(); 
        $titulo=$facultad->nombre;
        return view('registro.facultad',compact('registros','descargos', 'id', 'clase', 'titulo'));
        }
        //Universidad
        elseif ($id=='2') {
        $registros = DB::table('registros')
                        ->join('oficinas', 'oficinas.id', '=', 'registros.oficinas_id')
                        ->join('facultads', 'facultads.id', '=', 'oficinas.facultads_id')
                        ->select('registros.id','registros.n','facultads.nombre as facultad' ,'oficinas.nombre as oficina','registros.documento','registros.emisor','registros.asunto','registros.adjunto','registros.users_id','registros.users_ed','registros.created_at', 'registros.updated_at')
                            ->get();
        $descargos = DB::table('registros')
            ->join('descargos', 'registros.id', '=', 'descargos.registros_id')
            ->select('registros.id as reg')
            ->get();

        $id='datatable-buttons'; $clase='table table-bordered';
        $titulo="Registros: Universidad";
        return view('registro.universidad',compact('registros','descargos', 'id', 'clase', 'titulo')); 
        }
        else{
        return Redirect::to('registro')->with('message','advertencia');
        }
        
    }

    public function getmodal(Request $request)
    {

        $id=$request->get('id');

        $descargos=\App\Descargo::where('registros_id',$id)->get();
        $num_rows=0;
        foreach ($descargos as $descargo) {
            $num_rows++;
        }

        if ($num_rows>0) {
            
            $datos=\App\Registro::
                select( 'registros.documento', 
                        'registros.asunto',
                        'registros.n', 
                        'registros.created_at as fecha_a', 
                        'registros.updated_at as fecha_b',
                        'registros.emisor',
                        'registros.adjunto',
                        'users.name as usuario',
                        //descargos
                        'descargos.id as idDescargo',
                        'descargos.tipo_doc',
                        'descargos.cardex',
                        'descargos.receptor',
                        'descargos.created_at as fecha_d1', 
                        'descargos.updated_at as fecha_d2'

                        )
            ->join('users', 'users.id', '=', 'registros.users_id')
            ->join('descargos', 'registros.id', '=', 'descargos.registros_id')
            ->where('registros.id',$id)
            ->first();
            
             return $datos;
        }
        else {
           $datos=\App\Registro::
                select( 'registros.documento', 
                        'registros.asunto',
                        'registros.n', 
                        'registros.created_at as fecha_a', 
                        'registros.updated_at as fecha_b',
                        'registros.emisor',
                        'registros.adjunto',
                        'users.name as usuario',
                        'registros.created_at as fecha_d1'
                        )
            ->join('users', 'users.id', '=', 'registros.users_id')
            ->where('registros.id',$id)
            ->first();
             return $datos;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

 
    public function edit($id)
    {
       //return $id;
         
         
         $reg=DB::table('registros')->where('id',$id)->get();
         $ofic=DB::table('registros')->join('users', 'users.id', '=', 'registros.users_id')
                                    ->join('oficinas', 'oficinas.id', '=', 'users.oficinas_id')
                                    ->where('registros.id',$id)
                                    ->select('oficinas.id as oficina')->first();
                //
              if ( empty($reg) || !($ofic->oficina==Auth::user()->oficinas_id) ){ 
                return Redirect::to('registro')->with('message','error-Descargo');
             } else{
                $registros=\App\Registro::FindOrFail($id);
                return view('registro.edit-registro', array('registros'=>$registros) );
            }
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
        
         $registros=\App\Registro::FindOrFail($id);
         $input = $request->all();
         $registros->fill($input)->save();
         if ($registros) {
             return Redirect::to('registro')->with('message','editar-registro');
         }
         else {
            return Redirect::to('registro')->with('message','error-editar-registro');  
         }
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
