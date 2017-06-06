@extends('master.admin')
@section('title','Usuarios')
{!!Html::style('css/estilos-saem/registros.css')!!}
@section('contenido')
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Usuarios <a href="{!! route('usuario.create')!!}" id="ico-plus" title="Nuevo"><i class="fa fa-plus-circle"></i></a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content table-responsive">
                    <table id="datatable-responsive" 
                    class="table table-bordered dt-responsive table-striped nowrap table-hover'}}" 
                    cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>DNI</th>
                          <th>Nombres</th>
                          <th>Email</th>
                          <th>Facultad</th>
                          <th>Oficina</th>
                          <th>Cargo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>


                      <tbody>
                      @foreach($usuarios as $usuario)
                         
                            <tr data-toggle="modal" data-target=".bs-example-modal-lg">
                              <td>{!! $usuario->dni !!}</td>
                              <td>{!! $usuario->name !!}</td>
                              <td>{!! $usuario->email !!}</td>
                              <td>{!! $usuario->oficina->facultad->nombre !!}</td>
                              <td>{!! $usuario->oficina->nombre!!}</td>
                              
                              <td>{!! $usuario->funcion !!}</td>
                              <td>
                                  <a href="{{route('admin.edit', $usuario->id )}}" class="btn btn-primary">Editar</a>
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
<script>
   function confirmacion(msj){
    confirmar = confirm('¿Está Seguro que desea eliminar '+msj+'?');
    return confirmar;
  }
</script>
@endsection