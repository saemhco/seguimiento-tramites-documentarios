@extends('master.principal')
<?php $message=Session::get('message') ?>
@if($message=='store')
	<div class="alert alert-success alert-dismissible fade in" role="alert" align="rigth">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	  <strong>¡Ingresó Correctamente!</strong> Bienvenido(a).
	</div>
@endif


@section('contenido')
@endsection

