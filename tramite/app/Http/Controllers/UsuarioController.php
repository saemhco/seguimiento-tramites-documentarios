<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Redirect;
use Input;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        //Vista del super admin
         if (Auth::user()->id>0 && Auth::user()->id<16) {
            
            // La facultad es 
            $facultad=Auth::user()->oficina->facultad->id;
            $usuarios=\App\User::join('oficinas','users.oficinas_id','=','oficinas.id')
                               ->where('oficinas.facultads_id',$facultad)
                               ->where('users.id', '<>', Auth::user()->id)
                               ->select('users.*')->get();
            return view('usuario.lista-usuario')->with('usuarios',$usuarios);
            
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
         if (Auth::user()->id>0 && Auth::user()->id<16) {
            $facultad=\App\Facultad::join('oficinas','facultads.id','=','oficinas.facultads_id')
                                       ->join('users','oficinas.id','=', 'users.oficinas_id')
                                       ->where('users.id', Auth::user()->id)
                                       ->select('facultads.id as facultad')->first();

            $oficinas=DB::table('oficinas')->where('facultads_id',$facultad->facultad)->get();
            return view('usuario.nuevo-usuario',compact('oficinas'));
        }
        else{
            return Redirect::to('registro')->with('message','advertencia');            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $usuarios=\App\User::get();
         $sensor=0;
         foreach ($usuarios as $usuario) {
             if (($usuario->dni==$request->get('dni'))||($usuario->email==$request->get('email')) ) {
                 $sensor=1;
             }
         }
         if ($sensor==1) {
            return Redirect::to('usuario/create')->with('rojo',' El n° de DNI o el e-mail ingresado ya pertenecen a otro usuario');  
         }else{
        \App\User::create($request->all());
        return Redirect::to('usuario')->with('verde','Se registró un nuevo usuario');
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
        if (Auth::user()->id =='1' || Auth::user()->id== $id) {
            $usuarios=\App\User::FindOrFail($id);
            return view('usuario.edit-usuario', array('usuarios'=>$usuarios) );
       }
       else{
        return redirect()->route('registro.index');
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
        if (Auth::user()->id==$id) {

            $usuarios=\App\User::FindOrFail($id);
            $users=\App\User::get();
            if ($usuarios->dni != $request->get('dni') ) {
                    $sensor=0;
                    foreach ($users as $user) {
                         if ($user->dni==$request->get('dni')) {
                             $sensor=1;
                         }
                    }
                    if ($sensor==1) {
                        return Redirect::to('usuario/'.$id.'/edit')->with('naranja','El n° de DNI ya está registrado por otro usuario');
                    }
            }
            if ($usuarios->email != $request->get('email') ) {
                    $sensor=0;
                    foreach ($users as $user) {
                         if ($user->email==$request->get('email')) {
                             $sensor=1;
                         }
                    }
                    if ($sensor==1) {
                        return Redirect::to('usuario/'.$id.'/edit')->with('naranja','El e-mail ya está registrado por otro usuario');
                    }
            }

            $file = Input::file('foto');
             if (empty($file)){
                $input = $request->all();
                $usuarios->fill($input)->save();
              }
             else{  
                //Extención del archivo
                $extencion = explode('.', trim(Input::file('foto')->getClientOriginalName()));
                $extencion = $extencion[count($extencion)-1];

                if ($extencion=="jpg" || $extencion=="png" || $extencion=="gif") {
                     $input = $request->all();
                     $usuarios->fill($input)->save();
                     $name=Carbon::now()->second.$file->getClientOriginalName();
                     $file->move('images', $name);
                     $usuarios->foto=$name;
                     $usuarios->save();
                     
                }
                else{
                    $mensaje = "El tipo de Archivo no es válido, solo imágenes .png o .jpg";
                    return Redirect::to('usuario/'.$id.'/edit')->with('naranja', $mensaje);
                }
             

             }

            if ($usuarios) {
                 return redirect()->route('registro.index')->with('message','editar-registro');
            }
            return redirect()->route('registro.index')->with('message','error-Descargo'); 
        }
        else{
           return redirect()->route('registro.index')->with('message','error-Descargo');   
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
