@extends('master.principal')
@include('master.mensajes')
<?php $message=Session::get('message') ?>
@if($message=='store')
  <div class="alert alert-success alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Ingresó Correctamente!</strong> Bienvenido(a).
  </div>
@elseif($message=='advertencia')
  <div class="alert alert-warning alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Acción Peligrosa!</strong> Si cuntinúa así se bloquerá su cuenta.
  </div>
@elseif($message=='nuevo-registro')
  <div class="alert alert-success alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Exito!</strong> Se registró correctamente.
  </div>
@elseif($message=='editar-registro')
  <div class="alert alert-success alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Exito!</strong> Se editó correctamente 
  </div>
@elseif($message=='nuevo-Descargo')
  <div class="alert alert-success alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Exito!</strong> El Descargo se realizó correctamente 
  </div>
@elseif($message=='error-Descargo')
  <div class="alert alert-warning alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Error!</strong> Algo salió mal.  
  </div>
@elseif($message=='error-editar-registro')
  <div class="alert alert-warning alert-dismissible fade in" role="alert" align="rigth">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>¡Error!</strong> No se pudo actualizar.  
  </div>
@endif


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
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Área / Oficina: </b>{{$titulo}}<a href="{!! route('registro.create')!!}" title="Nuevo"><i id="ico-plus" class="fa fa-plus-circle"></i></a></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content table-responsive">
                    <div class="table-responsive">
                    
                    <table id="{{$id}}" class="table table-bordered table-hover" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Fecha</th>
                          <th>Documento</th>
                          <th>Emisor</th>
                          <th>Asunto</th>
                          <th>Adjunto</th>
                          <th>Descargo</th>
                          <th>Receptor</th>
                        </tr>
                      </thead>


                      <tbody>
                      <?php $tablallena="false";
                      foreach($registros as $registro) {
                          $sensor="false"; $tablallena="true";
                            
                          if($registro->desc == '0') {
                            $claseFilas='danger'; $documento=""; $receptor="";
                              ///$descargo=App\Descargo::find(3)->receptor;
                          }
                          else {$claseFilas=''; 
                          $documento=$td[1];}//.$descargo->cardex;} ?>
                            <tr 
                            data-toggle="modal" data-target=".bs-example-modal-lg" 
                           class="{{$claseFilas}}" 
                            onclick="cargarModal('{{$registro->id}}')">
                              <td>{!! $registro->n !!}</td>
                              <td>{!! $registro->created_at !!}</td>
                              <td>{!! $registro->documento !!}</td>
                              <td>{!! $registro->emisor !!}</td>
                              <td>{!! $registro->asunto !!}</td>
                              <td>{!! $registro->adjunto !!}</td>
                              @if($registro->desc=='1')

                              <td>{!! $td[$registro->descargo->tipo_doc].$registro->descargo->cardex!!}</td>
                              <td>{!! $registro->descargo->receptor!!}</td>
                              @else
                              <td></td><td></td>
                              @endif
                              
                            </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal-->
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h2 class="modal-title" id="myModalLabel">Cargando... </h2>
                        </div>
                        <div class="modal-body">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"> 
                          <div align="center" STYLE="position:absolute; top:2em; left:30%;     visibility:visible z-index:1">
                            <img id="carga" src="images/cargar_2.gif" width="300em">
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

                          <label ><b>Asunto: </b></label>
                          <i><label id="asunto" class="color-label"></label></i><br>

                          <label ><b>Adjunto: </b></label>
                          <i><label id="adjunto" class="color-label"></label></i><br>
                          <br>
                          <div id="descargo">
                            <ul>
                            @if($tablallena=="true")
                            <a href="" id="crear_descargo"></a>
                            @endif
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
                          <a href="" id="btn-m1" class="btn btn-info"></a>
                          <a href="#" id="btn-m3" class="btn btn-info"></a>
                          
                          <!--a href="#" id="btn-m4" 
                            onclick="javascript:return confirmacion('este Descargo');"class="btn btn-danger">El</a>
                          
                          <a href="#" id="btn-m2" 
                           onclick="javascript:return confirmacion('Todo (Registro y Descargo)');" class="btn btn-danger"></a>
                           -->
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          </div>

                      </div>
                    </div>
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
    var btnM1 = document.getElementById("btn-m1");
    //var btnM2 = document.getElementById("btn-m2");
    var btnM3 = document.getElementById("btn-m3");
    //var btnM4 = document.getElementById("btn-m4");

    //Enlaces de los botones
    
    btnM1.href='editar_registro/'+id;

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
        $('#carga').hide();
        //document.getElementById("img").style.visibility="hidden";
        

        var elemento = document.getElementById("crear_descargo");
        elemento.href='nd/'+id;
          //tipo documento
          if (result.fecha_a != result.fecha_d1) {
          var nombre_tipo_doc;
          switch(result.tipo_doc){
            case '1': nombre_tipo_doc='Proveido'; break;
            case '2': nombre_tipo_doc='Oficio'; break;
            case '3': nombre_tipo_doc='Oficio Multiple'; break;
            case '4': nombre_tipo_doc='Resolución de Decanato'; break;
            case '6': nombre_tipo_doc='Resolución de Consejo de Facultad'; break;
            case '7': nombre_tipo_doc="Proveido comisión de currícula"; break;
            case '5': nombre_tipo_doc='Otro/Sin Desc.'; break;
          }
        $('#fecha_d1').text(' Fecha de Descargo: '+ result.fecha_d1);
        $('#fecha_d2').text(' Última Actualización: '+ result.fecha_d2);
        $('#tipo_doc').text(nombre_tipo_doc+' N° '+ result.cardex);
        $('#receptor').text(' Descargo: '+ result.receptor);

        //botones de descargo    
        btnM1.style.display='inline';
        //btnM2.style.display='inline';    
        btnM3.style.display='inline';
        //btnM4.style.display='inline';
        $('#crear_descargo').text('');
      }
      else{    
        $('#crear_descargo').text('Generar Descargo'); 
        
        $('#fecha_d1').text(' ');
        $('#fecha_d2').text(' ');
        $('#tipo_doc').text(' ');
        $('#receptor').text(' ');
        
        //botones de descargo    
        btnM1.style.display='inline';
        //btnM2.style.display='inline';    
        btnM3.style.display='none';
        //btnM4.style.display='none';
      }
        //Valores mostrados de los Botones 
        btnM1.innerHTML="Editar Registro";
        //btnM2.innerHTML="Elimirar Todo";
        btnM3.innerHTML="Editar Descargo";
        //btnM4.innerHTML="Elimirar Descargo";

        //btnM4.href='eliminar_descargo/'+result.idDescargo;
        btnM3.href='editar_descargo/'+result.idDescargo;
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