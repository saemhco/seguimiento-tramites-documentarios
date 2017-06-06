 <?php  
 //las previas
                     
                      $usuario= Auth::user()->id;
                      $oficina_id = Auth::user()->oficina->id;
                      
?>

@extends('master.principal')
@section('title','Nuevo Registro')
@section('contenido')
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nuevo Registro</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    {!! Form::open(['route' => 'registro.store', 'method' => 'POST', 'class'=>'form-horizontal form-label-left' ]) !!}
                      <p>Ingrese los datos en el siguiente Formulario </p>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">N° de Registro
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           {!!Form::text('n', $nums, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese N° de Registro'])!!}
                           <a href="{{route('cardex.show','0')}}" target="_blank">Verificar registro</a>
                           <br><br><input type="checkbox" id="check" />
                                    <label style="color: blue">*Sin Registro</label>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Documento </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('documento', null, ['required', 'id'=>'documento', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese código del documento'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Emisor </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('emisor', null, ['required','id'=>'emisor', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese nombres del que emite el documento'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Asunto</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('asunto', null, ['required', 'id'=>'asunto', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese el asunto'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Adjunto </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('adjunto', null, ['id'=>'adjunto', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Documentos/archivos que adjunta el emisor'])!!}
                        </div>
                      </div>
                      
                      {!!Form::hidden('oficinas_id', $oficina_id)!!}
                      {!!Form::hidden('users_id', $usuario)!!}
                      {!!Form::hidden('users_ed', $usuario)!!}
                      <br><br><br><br>
                      <p>*Sin Registro: Usar esta opción si emitirá un documento/descargo sin algún registro</p>
                      <div class="ln_solid"></div>
                      <div class="col-md-6 col-md-offset-8">
                          <input type="submit" class="btn btn-success" value="Guardar">
                      </div>
                      {!! Form::close() !!}
                      </div>
                    </form>
                  </div>
                </div>
              </div>
@endsection

@section('pie')
<script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
      });
      $("#check").click( function(){

        if( $(this).is(':checked') ) {
          $('#documento').val('Sin Registro');
          $('#emisor').val('Mi Oficina');
          $('#asunto').val('Ninguno');
          $('#adjunto').val('');
        }else{
          $('#documento').val('');
          $('#emisor').val('');
          $('#asunto').val('');
          $('#adjunto').val('');
        }
      });
</script>
@endsection