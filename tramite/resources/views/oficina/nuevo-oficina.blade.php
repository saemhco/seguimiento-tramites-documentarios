@extends('master.principal')
@section('title','Nuevo Usuario')
@section('estilos')

@endsection
@section('contenido')
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nueva Oficina</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    {!! Form::open(['route' => 'oficina.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left' ]) !!}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           {!!Form::text('nombre', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese N° de Registro'])!!}
                           
                        </div>
                      </div>
                      
                      {!!Form::hidden('facultads_id', $facultad)!!}
                      
                      <br>
                      <div class="ln_solid"></div>
                      <div class="col-md-6 col-md-offset-8">
                          <input type="submit" class="btn btn-success" value="Guardar">
                          <br><br><br>
                      </div>
                      <div align="center">
                      <img src="{{ URL::to('images/enfermeria_logo.png') }}" width="30%">
                      </div>
                      {!! Form::close() !!}
                      </div>
                    </form>
                  </div>
                </div>
              </div>
@endsection

@section('pie')

@endsection