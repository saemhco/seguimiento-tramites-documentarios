<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','LogController@index');
Route::resource('log','LogController');
Route::get('logout','LogController@logout');

Route::resource('registro','RegistroController');
Route::get('getmodal','RegistroController@getmodal');
Route::resource('editar_registro','RegistroController@edit'); //Que se quede con resource. no Get 
Route::resource('editar_descargo','DescargoController@edit');
Route::resource('descargo','DescargoController');


Route::resource('cardex','CardexController');
Route::get('ncd','CardexController@nuevo_cardex_descargo');//Incremeta en 1 el cardex del 
Route::resource('nd','DescargoController@show'); //nuevo Descargo

Route::resource('usuario','UsuarioController');
Route::resource('oficina','OficinaController');
/*Route::get('dante',function(){
	//$facultad=App\Facultad::find(1);
	//return $facultad->oficinas;
	//$oficina=App\Facultad::find(1)->oficinas;
	//$oficina=Auth::user()->oficina->facultad->id;
	$oficina=Auth::user()->oficina->facultad;
	return $oficina;
});*/

Route::resource('admin','AdminController');
Route::resource('eliminar','OficinaController@destroy');


// Route::get('saem',function(){
// 	$registro=App\Registro::where('oficinas_id','2')->where('created_at','like','2017%')->orderBy('n','desc')->get();
// 	$anterior=0;
// 	foreach ($registro as $r) {
		
// 		if ($anterior==$r->n) {
// 			echo "El id=".$r->id.' El N°='.$r->n.'<br>';
// 		}
// 		$anterior=$r->n;
// 	}
// });
// Route::get('saul',function(){
// 	$registros=App\Registro::get();
// 	$descargos=App\Descargo::get();
// 	foreach($registros as $registro){
//         $sensor="false"; $tablallena="true";
//         foreach($descargos as $descargo){
//             if($registro->id == $descargo->registros_id){
//                 $sensor="true";
//                 break;
//             } 
//         } 
//         if($sensor == 'true'){
//             $r=App\Registro::find($registro->id);
//             $r->desc='1';
//             $r->save();
//         }else{
//         	$r=App\Registro::find($registro->id);
//             $r->desc='0';
//             $r->save();
//         }
//     } 
//         return "Éxito";
// });
