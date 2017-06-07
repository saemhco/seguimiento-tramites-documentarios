@extends('master.principal')
@section('title','Descargo')
@section('contenido')
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                  {!! Form::model($descargos, ['route'=>['descargo.update', $descargos->id], 'method' => 'PUT', 'class'=>'form-horizontal form-label-left' ]) !!}

                      
                      <span class="section">Editar Descargo</i></span>

                      <div class="item form-group">
                        {!!Form::label('email', 'Tipo de Documento', ['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select onchange="cambiar();" id='tipo_doc' name='tipo_doc' class='form-control unidad'>
                          <option value='1'>Proveido</option>
                          <option value='2'>Oficio</option>
                          <option value='3'>Oficio Multiple</option>
                          <option value='4'>Resolución de Decanato</option>
                          <option value="6">Resolución de Consejo de Facultad</option> 
                          <option value='7'>Proveido comisión de currícula</option>
                          <option value='5'>Sin Descargo</option>
                        </select>
                        <a href="" id="verificar" TARGET="_new">Verificar N°</a>

                        </div>
                      </div>

		      <div id="divcardex">
                      <div class="item form-group" id="idcardex">
                        {!!Form::label('labe2', 'Cardex',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('cardex', null, ['required', 'class'=> 'form-control','id'=>'txt_cardex','maxlength'=>'4', 'onkeypress'=>'return valida(event)' ,'placeholder'=>'N° Registro de de documeto']) !!}
                       
                        </div>
                      </div>

                      <div class="item form-group">
                        {!!Form::label('email', 'Receptor',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('receptor', null, ['required', 'class'=> 'form-control', 'placeholder'=>'Persona o oficina a la que se envia el documento'] ) !!}
                        </div>
                      </div>
                      </div>
                      {!!Form::hidden('users_id', Auth::user()->id)!!}
                      {!!Form::hidden('users_ed', Auth::user()->id)!!}
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-7">
                          <input type="submit" class="btn btn-success" value="Guardar Cambios">
                          <br><br><br><br><br><br>
                      </div>
                      </div>
                    {!! Form::close() !!}
                    <br><br><br><br><br><br><br><br><br><br>
                  </div>
                </div>
              </div>
              <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"> 
@endsection

@section('pie')
<script>
function opcion_defecto(){
  var tipo = <?php echo $descargos->tipo_doc?>;
  $("#tipo_doc option[value='"+ tipo +"']").attr("selected",true);
}
opcion_defecto();

function cambiar(){
    //var route="http://localhost/enfermeria/public/getcardex";
    var route="/ncd";
    var id=$('#tipo_doc').val();
      var data={
      'id':id
    };    

    var token=$("#token").val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:route,
      data:data,
      type:'GET',

      success: function(result){

        $('#txt_cardex').val(result);
        $('#txt_cardex2').val(id);
         //console.log(result);                  
      } 
    });


    //Direccionar URL 
    var elemento = document.getElementById("verificar");
    var tipoDocumento;
switch (id){
 case "1": tipoDocumento = "Proveido"; break;
 case "2": tipoDocumento = "Oficio"; break;
 case "3": tipoDocumento = "Oficio Multiple"; break;
 case "4": tipoDocumento = "Resolución de Decanato"; break;
 case "6": tipoDocumento = "Resolución de Consejo de Facultad"; break;
 case "7": tipoDocumento = "Proveido comisión de currícula"; break;
 default: tipoDocumento = "Otro"; break; 
}
  elemento.innerHTML="Verificar N°"+" "+ tipoDocumento;
  elemento.href="../cardex/"+id;

 //Si es sin resolución, otro
    if (id=='5') {
      //$('#receptor').val("Ninguno");
      //ocultamos
      $('#idcardex').hide();
    }else{
      $('#receptor').val("");
      //Mostramos
      $('#idcardex').show();
    }
    
  } 



      $(document).ready(function() {
        
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
      });      
      function valida(e){
          tecla = (document.all) ? e.keyCode : e.which;

          //Tecla de retroceso para borrar, siempre la permite
          if (tecla==8){
              return true;
          }
              
          // Patron de entrada, en este caso solo acepta numeros
          patron =/[0-9]/;
          tecla_final = String.fromCharCode(tecla);
          return patron.test(tecla_final);
      }
</script>
@endsection