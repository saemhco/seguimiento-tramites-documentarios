@extends('master.principal')
@section('title','Registros')
@section('estilos')
	{!!Html::style('css/estilos-saem/registros.css')!!}
@endsection
@section('contenido')
<?php  // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
//date_default_timezone_set('America/Lima');
//$yearactual= date("Y").'%';
//echo $yearactual;

 ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
              <div align="center">
              <img src="{{ URL::to('images/pronto.png')}}" width="70%">
              </div>
              </div>


@endsection

