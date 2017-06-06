<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OficinaController extends Controller
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
        
        if (Auth::user()->id>0 && Auth::user()->id<16) {
       
            $oficinas=\App\Facultad::find(Auth::user()->oficina->facultad->id)->oficinas;
            //Selecionamos a todos los usuarios que pertenecen a la facultad del Admin
            $fac=Auth::user()->oficina->facultad->id;
            $usuarios=\App\User::join('oficinas', 'oficinas.id', '=', 'users.oficinas_id')
                              ->join('facultads', 'facultads.id', '=', 'oficinas.facultads_id')
                              ->where('facultads.id','=',$fac)
                              ->select('oficinas.id')
                              ->get();
            //return $usuarios;
            return view('oficina.lista-oficina', compact('oficinas','usuarios'));
        }
        else {
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
            $facultad=Auth::user()->oficina->facultad->id;
            return view('oficina.nuevo-oficina',compact('facultad'));
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
        
        \App\Oficina::create($request->all());
        return Redirect::to('oficina');//->with('message','nuevo-registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //Vista Super admin de oficina     
        if (Auth::user()->id==1) {
       
           $oficinas=\App\Oficina::where('oficinas.id','<>',Auth::user()->id)->get();
            //return $usuarios;
            return view('saem.oficinas-admin', compact('oficinas'));
        }
        else {
            return Redirect::to('registro')->with('message','advertencia');
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
        if ( (Auth::user()->oficina->facultad->id== \App\Oficina::find($id)->facultad->id) && (Auth::user()->id>0 && Auth::user()->id<16) ) {
            $oficina=\App\Oficina::FindOrFail($id);
            
            return view('oficina.edit-oficina',compact('oficina'));
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
         $oficinas=\App\Oficina::FindOrFail($id);
         $input = $request->all();
         $oficinas->fill($input)->save();
         if ($oficinas) {
             return Redirect::to('oficina')->with('message','editar');
         }
         else {
            return Redirect::to('registro')->with('message','advertencia');  
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
        //Si esta vacio (No tiene usuarios, eliminamos tranquilos)
        if(\App\Oficina::find($id)->usuarios=="[]"){
            if(\App\Oficina::destroy($id)){
             return Redirect::to('oficina')->with('message','exito-eliminar');
            }
            else{
               return Redirect::to('registro')->with('message','advertencia');   
            }
        }
        else{
         return Redirect::to('registro')->with('message','advertencia');  
        }
       
    }
}
