 <?php  
 //las previas
                     
                      $usuario= Auth::user()->id;
?>

@extends('master.principal')
@section('title','Nuevo Registro')
@section('contenido')
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Registro</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    {!! Form::model($registros, ['route' =>['registro.update', $registros->id], 'method' => 'PUT', 'class'=>'form-horizontal form-label-left' ]) !!}
                      <p>Ingrese los datos en el siguiente Formulario </p>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">N° de Registro
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           {!!Form::text('n', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese N° de Registro'])!!}
                           <a href="{{url('registro/show')}}" target="_blank">Verificar registro</a>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Documento </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('documento', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese código del documento'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Emisor </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('emisor', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese nombres del que emite el documento'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Asunto</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('asunto', null, ['required', 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Ingrese el asunto'])!!}
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Adjunto </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!!Form::text('adjunto', null, [ 'class'=> 'form-control col-md-7 col-xs-12', 'placeholder'=>'Documentos/archivos que adjunta el emisor'])!!}
                        </div>
                      </div>
                      
                      
                      {!!Form::hidden('users_ed', $usuario)!!}
                      
                      <div class="ln_solid"></div>
                      <div class="col-md-6 col-md-offset-7">
                          <input type="submit" class="btn btn-success" value="Guardar Cambios">
                          <br><br><br><br><br><br>
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
</script>
@endsection