<?php 
//Las previas: Oficina Facultad
$registros = DB::table('users')
                    ->join('oficinas', 'oficinas.id', '=', 'users.oficinas_id')
                    ->join('facultads', 'facultads.id', '=', 'oficinas.facultads_id')
                    ->where('users.id', Auth::user()->id)
                    ->select('oficinas.nombre as oficina', 'facultads.nombre as facultad')
                    ->first();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Super Admin</title>
    <link rel="icon" type="image/png" href="{{url('images/enfermeria_logo.png')}}" />
    <!-- Bootstrap -->
    {!!Html::style('vendors/bootstrap/dist/css/bootstrap.min.css')!!}
        <!-- Font Awesome -->
    {!!Html::style('vendors/font-awesome/css/font-awesome.min.css')!!}
    <!-- iCheck -->
    {!!Html::style('vendors/iCheck/skins/flat/green.css')!!}
    <!-- Datatables -->
    {!!Html::style('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')!!}
    {!!Html::style('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')!!}
    {!!Html::style('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')!!}
    {!!Html::style('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')!!}
    {!!Html::style('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')!!}
    <style type="text/css">
      #foto-user{
        width: auto;
        height: 6em;
        margin-left: 0.7em;
      }
    </style>

    <!-- Custom Theme Style -->
 {!!Html::style('css/custom.css')!!}
     @yield('estilos')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{url('registro')}}" class="site_title"><img src="{{ URL::to('images/enfermeria_logo.png') }}" width="46em"> Mis Trámites</a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="{{ URL::to('images/'.Auth::user()->foto) }}"  alt="Foto" height="60em" class="img-circle profile_img" title="{{Auth::user()->name}}" id="foto-user">
              </div>
              <div class="profile_info">
                <strong><span> {!!Auth::user()->funcion!!}</span></strong><br>
                <strong>{{$registros->oficina}}</strong>
                <h2 >{{$registros->facultad}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>___________________________</h3>
                <ul class="nav side-menu">
                 

                  @if(Auth::user()->id==1)
                  <li><a><i class="fa fa-cog"></i> Configuraciones<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="{{route('admin.index')}}">Usuarios</a>
                      </li>
                      <li>
                        <a href="{{route('oficina.show', Auth::user()->id)}}">Oficinas / Area</a>
                      </li>
                    </ul>
                  </li>
                  @endif
                  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <p>Facultad de Enfermería</p>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ URL::to('images/'.Auth::user()->foto) }}" alt="">{!!Auth::user()->name!!}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{route('usuario.edit', Auth::user()->id )}}"><i class="fa fa-edit pull-right"></i>  Actualizar mis Datos</a></li>
                            
                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="row">

               @yield('contenido')

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right"><br>
            @Derechos reservados <a href="http://www.unheval.edu.pe/portal/"><b>Facultad de Enfermería - UNHEVAL </b></a>|| 2016 -2017<br>
          </div>
          <div class="pull-left"><br>
            <i>Practicante de E.P. Ing. Sistemas: <b>Saúl Escandón Munguía</b></i><br>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    {!!Html::script('vendors/jquery/dist/jquery.min.js')!!}
    <!-- Bootstrap -->
    {!!Html::script('vendors/bootstrap/dist/js/bootstrap.min.js')!!}
    <!-- FastClick -->
    {!!Html::script('vendors/fastclick/lib/fastclick.js')!!}
    <!-- NProgress -->
    {!!Html::script('vendors/nprogress/nprogress.js')!!}
    <!-- Datatables -->
    {!!Html::script('vendors/datatables.net/js/jquery.dataTables.min.js')!!}
    {!!Html::script('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons/js/buttons.flash.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons/js/buttons.html5.min.js')!!}
    {!!Html::script('vendors/datatables.net-buttons/js/buttons.print.min.js')!!}
    {!!Html::script('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')!!}
    {!!Html::script('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')!!}
    {!!Html::script('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')!!}
    {!!Html::script('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')!!}
    {!!Html::script('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')!!}
    {!!Html::script('vendors/datatables.net-scroller/js/datatables.scroller.min.js')!!}
    {!!Html::script('vendors/jszip/dist/jszip.min.js')!!}
    {!!Html::script('vendors/pdfmake/build/pdfmake.min.js')!!}
    {!!Html::script('vendors/pdfmake/build/vfs_fonts.js')!!}

    <!-- Custom Theme Scripts -->
    {!!Html::script('js/custom.js')!!}
    @yield('pie')


    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
  </body>
</html>