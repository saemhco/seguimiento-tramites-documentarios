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
                <!--div class="x_panel">
                  <div class="x_title">
                    <h2>{{$titulo}}<a href="{!! route('registro.create')!!}" title="Nuevo"><i id="ico-plus" class="fa fa-plus-circle"></i></a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content table-responsive">
                    <table id="{{$id}}" class="{{$clase.' table-hover'}}" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Fecha</th>
                          <th>Facultad</th>
                          <th>Oficina</th>
                          <th>Documento</th>
                          <th>Emisor</th>
                          <th>Asunto</th>
                          <th>Adjunto</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php $tablallena="false";  ?>
                      @foreach($registros as $registro)
                          <?php $sensor="false"; $tablallena="true"; ?>
                          @foreach($descargos as $descargo)
                            @if($registro->id == $descargo->reg)
                              <?php $sensor="true"; ?>
                            @endif
                          @endforeach
                            @if($sensor != 'true')
                              <?php $claseFilas='danger'; ?>
                            @else
                              <?php $claseFilas=''; ?>
                            @endif
                            <tr 
                            data-toggle="modal" data-target=".bs-example-modal-lg" 
                           class="{{$claseFilas}}" 
                            onclick="cargarModal('{{$registro->id}}')">
                              <td>{!! $registro->created_at !!}</td>
                              <td>{!! $registro->facultad !!}</td>
                              <td>{!! $registro->oficina !!}</td>
                              <td>{!! $registro->documento !!}</td>
                              <td>{!! $registro->emisor !!}</td>
                              <td>{!! $registro->asunto !!}</td>
                              <td>{!! $registro->adjunto !!}</td>
                            </tr>
                      @endforeach()
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Modal-->
                  <!--div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h2 class="modal-title" id="myModalLabel" alt="Cargando...">Cargando... </h2>
                        </div>

                        <div class="modal-body">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"> 
                          <div align="center" STYLE="position:absolute; top:2em; left:30%;     visibility:visible z-index:1">
                            <img id="carga" src="{{ URL::to('images/cargar_2.gif') }}" alt="Cargando..." width="300em">
                          </div>
                          <label><b>N° Registro: </b></label>
                          <i><label id="nreg" class="color-label"></label></i><br>

                          <label><b>Fecha de Registro: </b></label>
                          <i><label id="fecha1" class="color-label"></label></i><br>

                          <label ><b>Última actualización: </b></label>
                          <i><label id="fecha2" class="color-label"></label></i><br>

                          <label ><b>Documento: </b></label>
                          <i><label id="documento" class="color-label"></label></i><br>

                          <label ><b>Emisor: </b></label>
                          <i><label id="emisor" class="color-label"></label></i><br>

                          <label ><b>Asuntor: </b></label>
                          <i><label id="asunto" class="color-label"></label></i><br>

                          <label ><b>Adjunto: </b></label>
                          <i><label id="adjunto" class="color-label"></label></i><br>
                          <br>
                          <div id="descargo">
                            <ul>
                              <li>
                                <label id="fecha_d1" class="descargo-label"></label>
                              </li>
                              <li>
                                <label id="fecha_d2" class="descargo-label"></label>
                              </li>
                              <li>
                                <label id="tipo_doc" class="descargo-label"></label>
                              </li>

                              <li>
                                <label id="receptor" class="descargo-label"></label>
                              </li>
                            </ul> 
                          </div>
                        </div>
                        <div class="modal-footer">
                          
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          </div>

                      </div>
                    </div-->
                  </div>


@endsection

@section('pie')
<script>
function cargarModal(ids){
    //var route="http://localhost/enfermeria/public/getcardex";
    var route="/getmodal";
    var id=ids;
    var data={'id':id};  

    //Botones del modal
    

 

    //Variables Modal  

    var token=$("#token").val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:route,
      data:data,
      type:'GET',

      success: function(result){
        //Declara variables 
        $('#myModalLabel').text(result.documento+': '+result.asunto);
        $('#nreg').text(result.n);
        $('#fecha1').text(result.fecha_a);
        $('#fecha2').text(result.fecha_b);
        $('#documento').text(result.documento);
        $('#emisor').text(result.emisor);
        $('#asunto').text(result.asunto);
        $('#adjunto').text(result.adjunto);
        $("#carga").hide();

          //tipo documento
          if (result.fecha_a != result.fecha_d1) {
          var nombre_tipo_doc;
          switch(result.tipo_doc){
            case '1': nombre_tipo_doc='Proveido'; break;
            case '2': nombre_tipo_doc='Oficio'; break;
            case '3': nombre_tipo_doc='Oficio Multiple'; break;
            case '4': nombre_tipo_doc='Resolución de Decanato'; break;
            case '6': nombre_tipo_doc='Resolución de Consejo de Facultad'; break;
            case '5': nombre_tipo_doc='Otro'; break;
          }
        $('#fecha_d1').text(' Fecha de Descargo: '+ result.fecha_d1);
        $('#fecha_d2').text(' Última Actualización: '+ result.fecha_d2);
        $('#tipo_doc').text(nombre_tipo_doc+' N° '+ result.cardex);
        $('#receptor').text(' Descargo: '+ result.receptor);

        
      }
      else{    
        $('#fecha_d1').text(' ');
        $('#fecha_d2').text(' ');
        $('#tipo_doc').text(' ');
        $('#receptor').text(' ');
        
      }
         console.log(result);                  
      } 
    });
  }
  function confirmacion(msj){
    confirmar = confirm('¿Está Seguro que desea eliminar '+msj+'?');
    return confirmar;
  }
  </script>
@endsection