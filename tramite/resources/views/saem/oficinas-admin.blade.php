<?php $message=Session::get('message') ?>
@if($message=='editar')
  <div class="alert alert-success alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Exito!</strong> Se editó correctamente 
  </div>
@elseif($message=='exito-eliminar')
 <div class="alert alert-success alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Exito!</strong> Se eliminó correctamente 
  </div>
@endif
@extends('master.admin')
@section('title','Usuarioso')
{!!Html::style('css/estilos-saem/registros.css')!!}
@section('contenido')
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Usuarios <a href="{!! route('oficina.create')!!}" id="ico-plus" title="Nuevo"><i class="fa fa-plus-circle"></i></a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content table-responsive">
                    <table id="datatable-responsive" 
                    class="table table-bordered dt-responsive table-striped nowrap table-hover'}}" 
                    cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Oficina</th>
                          <th>Facultad</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                      @foreach($oficinas as $oficina)
                                             
                            <tr data-toggle="modal" data-target=".bs-example-modal-lg">
                              <td>{!! $oficina->nombre !!}</td>
                              <td>{!! $oficina->facultad->nombre !!}</td>
                              <td>
                                  <a href="{{route('oficina.edit', $oficina->id )}}" class="btn btn-primary">Editar</a>
                              </td>
                            </tr>
                        
                            
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


@endsection

@section('pie')

@endsection