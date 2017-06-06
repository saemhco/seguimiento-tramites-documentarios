<?php $msj=Session::get('mensaje') ?>
@if($msj=='error')
  <div class="alert alert-danger alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <b>¡Error!</b> Usuario o Contraseña Incorrecto.
  </div>
@elseif($msj=='salir')
<div class="alert alert-info alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <b>¡Exito!</b> Cerró sesión Correctamente.
  </div>
@endif
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    {!!Html::style('vendors/bootstrap/dist/css/bootstrap.min.css')!!}
    {!!Html::style('vendors/font-awesome/css/font-awesome.min.css')!!}

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>


  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">
           
            {!! Form::open(['route' => 'log.store', 'method' => 'POST']) !!}
              <h1>Iniciar Sesión</h1>
              <div>
              	<a href="http://www.unheval.edu.pe/enfermeria/"><img src="images/enfermeria_logo.png" height="70 em"></a><br><br>
              	{!! Form::text('email', null, ['required', 'class'=> 'form-control', 'placeholder'=>'E-mail'] ) !!}
            
              </div>
              <div>
                {!! Form::password('password', ['required', 'class'=> 'form-control', 'placeholder'=>'Contraseña'] ) !!}
              </div>
              <div align="center">
                <input type="submit" class="btn btn-round btn-success" value="Ingresar">
                <a href="#">No puedo ingresar, Ayuda?!</a>
              </div>

              <div class="clearfix"></div>
              <div class="separator">                
                <div class="clearfix"></div>
                <br />
               
              </div>
            {!! Form::close() !!}
          </section>
        </div>


      </div>
    </div>
     <!-- jQuery -->
    {!!Html::script('vendors/jquery/dist/jquery.min.js')!!}
    <!-- Bootstrap -->
    {!!Html::script('vendors/bootstrap/dist/js/bootstrap.min.js')!!}
  </body>
</html>