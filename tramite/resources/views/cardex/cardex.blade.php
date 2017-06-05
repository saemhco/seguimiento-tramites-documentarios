@extends('master.principal')
@section('title','Cardex')
@section('contenido')
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content table-responsive">
                          @if($tipo=='0')
                           <?php  $tip_doc= "N° Registros"; ?>
                          @elseif($tipo=='1')
                          <?php  $tip_doc= "N° Proveidos"; ?>
                          @elseif($tipo=='2')
                          <?php  $tip_doc= " N° Oficios";?>
                          @elseif($tipo=='3')
                          <?php  $tip_doc= " N° Oficios Múltiples";?>
                          @elseif($tipo=='4')
                          <?php  $tip_doc= "N° Resoluciones de Decanato"; ?>
                          @elseif($tipo=='6')
                          <?php  $tip_doc= "N° Resoluciones de Consejo de Facultad"; ?>
                          @elseif($tipo=='7')
                          <?php  $tip_doc= "N° Proveido comisión de currícula"; ?>
                          @else
                          <?php  $tip_doc="N° Otros Documentos";?>
                          @endif
                            <span class="section"> {{$tip_doc}} </i></span>
                          <table class="table table-bordered responsive">
                              <tbody>
                                 
                                  
                                  <?php $cont=1; ?>
                                @for ($i=0; $i < 500; $i++)
                                  <tr>
                                    @for ($j=0; $j < 10; $j++) 
                                      <?php $sensor="false";  ?>
                                      @foreach($cardex as $card)
                                          @if ($card->cardex == $cont)
                                            <?php $sensor="true"; ?>
                                          @endif
                                      @endforeach
                                          @if ($sensor == "true")
                                            <td align="center" class="success" >
                                              <?php echo $cont; ?>
                                            </td>
                                          @else
                                            <td align="center">
                                              <?php echo $cont; ?>
                                            </td>
                                          @endif 
                                          <?php $cont++; ?>
                                    @endfor
                                  </tr>
                                @endfor 
                              </tbody>
                          </table>
                      <div class="ln_solid"></div>
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