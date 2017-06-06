@extends('master.principal')
@include('master.mensajes')
@section('title','Editar Usuario')
@section('estilos')
@endsection
@section('contenido')



              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar mis datos </h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content table-responsive">
                      {!! Form::model($usuarios, ['route' =>['usuario.update', $usuarios->id], 'method' => 'PUT', 'files'=>true, 'class'=>'form-horizontal form-label-left' ]) !!}
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Nombre</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('name', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese Nombres y Apellidos'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">DNI </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('dni', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'onkeypress'=>'return valida(event)','maxlength'=>'8', 'placeholder'=>'Ingrese DNI'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website"> Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('email', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese Email'])!!}
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website"> Cargo/Función</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        {!!Form::text('funcion', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ejm. Secretaria, Decano(a), Supervisor, Etc. '])!!}
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website"> Nueva Contraseña</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::password('password', [ 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese nueva contraseña'])!!}
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website"> Foto</label>
                        <div class="col-md-6 col-sm-6 col-xs-12"><br>
                        {!!form::file('foto',[ 'accept'=> 'image/*'])!!}
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="col-md-6 col-md-offset-3" align="right">
                          <input type="submit" class="btn btn-success" value="Guardar">
                          <br><br><br><br><br><br>
                      </div>
                      {!! Form::close() !!}
                  </div>
                </div>
              </div>
              <!-- Modal-->
              


@endsection