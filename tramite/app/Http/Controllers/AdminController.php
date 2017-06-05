<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
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
         if (Auth::user()->id==1) {
            
            
            $usuarios=\App\User::join('oficinas','users.oficinas_id','=','oficinas.id')
                               ->where('users.id', '<>', Auth::user()->id)
                               ->select('users.*')->get();
            return view('saem.usuarios-admin')->with('usuarios',$usuarios);
            
        }
        else{
            return Redirect::to('registro')->with('message','advertencia');
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
        //Si exiate usuario
        //return \App\User::find($id);
        if (\App\User::find($id) ==null){
            return Redirect::to('registro')->with('rojo','Usuario no existe');
        }
        $fac_adm=Auth::user()->oficina->facultad->id;
        $fac_user=\App\User::FindOrFail($id)->oficina->facultad->id;

        if ( (Auth::user()->id==1) || (($fac_adm==$fac_user)&&(Auth::user()->id>0 && Auth::user()->id<16)) ) {
            $usuario=\App\User::FindOrFail($id);
            $oficinas=DB::table('oficinas')
                        ->where('facultads_id',$usuario->oficina->facultad->id)->get();
            return view('usuario.adm_edit-usuario',compact('oficinas', 'usuario'));
        }else{
            return Redirect::to('registro')->with('message','advertencia');
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
        $user=\App\User::find($id);
        //return $user;
        if($user){
            if (Auth::user()->id>0 && Auth::user()->id<16) {
                //Verificamos los usuarios
                $usuarios=\App\User::get();
                
                if ($user->dni != $request->get('dni') ) {
                    $sensor=0;
                    foreach ($usuarios as $usuario) {
                         if ($usuario->dni==$request->get('dni')) {
                             $sensor=1;
                         }
                    }
                    if ($sensor==1) {
                        return Redirect::to('admin/'.$id.'/edit')->with('naranja','El n° de DNI ya está registrado por otro usuario');
                    }
                }
                if ($user->email != $request->get('email') ) {
                    $sensor=0;
                    foreach ($usuarios as $usuario) {
                         if ($usuario->email==$request->get('email')) {
                             $sensor=1;
                         }
                    }
                    if ($sensor==1) {
                        return Redirect::to('admin/'.$id.'/edit')->with('naranja','El e-mail ya está registrado por otro usuario');
                    }
                }

              $input = $request->all();
              $user->fill($input)->save();
              return redirect()->route('usuario.index')->with('verde','Se editó usuario');
               
            }else{
                return redirect()->route('registro.index')->with('rojo','Ud. no está autorizado para realizar esta acción');
            }
        }else{
            return redirect()->route('registro.index')->with('rojo','Usuario no identificado');    
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
