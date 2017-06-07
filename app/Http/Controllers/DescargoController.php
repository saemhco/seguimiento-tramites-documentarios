<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use DB;
use Carbon\Carbon;
class DescargoController extends Controller
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
        //return "Este es el 2do";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view("tercero");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Si el Registro ya tiene un descargo- Los chistosos que intentan ingresar datos por URL
         $registro=$request->get('registros_id');
         
         $consulta=DB::table('descargos')->where('registros_id',$registro)->get();
         //consulta No(!) esta vacia - Es decir ya existe!
         if (!empty($consulta)){ 
            return Redirect::to('registro')->with('message','error-Descargo');
         }
         else{
            //En caso no halla problemas, llenamos todo.
            //Primero identificamos que tipo es
            $anio = Carbon::now()->format('Y').'%';
            $tipodescargo=$request->get('tipo_doc');
            $ultimo_descargo=\App\Descargo::join('registros','registros.id','=','descargos.registros_id')->where('registros.oficinas_id',Auth::user()->oficinas_id)->where('descargos.tipo_doc',$tipodescargo)->where('descargos.created_at','like',$anio)->orderBy('descargos.cardex','desc')
            ->first();
            //Si es el primero no retorna ningun valor, le damos por defecto 1
            if ($ultimo_descargo) {
                $n=$request->get('cardex');
                if ($ultimo_descargo->cardex >= $n) {
                    $n=$ultimo_descargo->cardex+1;
                }
            }else{
                $n=1;
            }
            //Llenamos los datos
            $descargo=new \App\Descargo;
            $descargo->tipo_doc=$request->get('tipo_doc');
            $descargo->cardex=$n;
            $descargo->receptor=$request->get('receptor');
            $descargo->registros_id=$registro;
            $descargo->users_id=Auth::user()->id;
            $descargo->users_ed=Auth::user()->id;
            $descargo->save();
            //Editamos el registro
            $r=\App\Registro::find($registro); $r->desc='1'; $r->save();
            return Redirect::to('registro')->with('message','nuevo-Descargo');
         }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Verificamos si el registro Existe, y no manden datos falsos
        //Verificamos si YA tiene descargo el registro (ya existe)
             $reg=DB::table('registros')->where('id',$id)->get();
             $cons=DB::table('descargos')->where('registros_id',$id)->get();
             
              if ( (empty($reg)) || (!empty($cons)) ){ 
                return Redirect::to('registro')->with('message','error-Descargo');
             } 
             //si no existe, abrimos la ventana
             else{
                    //El registro debempty($reg) || !empty($cons)e pertener a la oficina
                    $registro=DB::table('registros')
                        ->select('oficinas.id as oficina', 'registros.id as registro')
                        ->where('registros.id','=',$id)
                        ->join('users', 'users.id', '=', 'registros.users_id')
                        ->join('oficinas', 'oficinas.id', '=', 'users.oficinas_id')
                        ->first(); 
                    //Verificamos si el descargo pertenece a la oficina del usuario
                    if ($registro->oficina == Auth::user()->oficinas_id ) {
                        $r = DB::table('registros')->where('id', $id)->first();
                        return view('descargo.nuevo-descargo')->with('r',$r);    
                        //return $registro->oficina;    

                    } 
                    else {
                        return Redirect::to('registro');   
                    }          
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
        $desc=DB::table('descargos')->where('id',$id)->get();
        $ofic=DB::table('descargos')->join('users', 'users.id', '=', 'descargos.users_id')
                                    ->join('oficinas', 'oficinas.id', '=', 'users.oficinas_id')
                                    ->where('descargos.id',$id)
                                    ->select('oficinas.id as oficina')->first();
                //
              if ( empty($desc) || !($ofic->oficina==Auth::user()->oficinas_id) ){ 
                return Redirect::to('registro')->with('message','error-Descargo');
             } else{
                $descargos= \App\Descargo::FindOrFail($id);
                return view('descargo.edit-descargo', array('descargos'=>$descargos) );
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
        
         $descargos=\App\Descargo::FindOrFail($id);
         $input = $request->all();
         $descargos->fill($input)->save();

         if ($descargos) {
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
