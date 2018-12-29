@extends('layouts.home')

@section('title', 'Inicio')

@section('content')

    <!--MODAL RESULTADOS PROSPECTOS-->
    <div class="modal inmodal" id="modal_resultados" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="width:800px;">
            <div class="modal-content animated bounceInLeft">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Información De Prospecto</h4>
                    <small class="font-bold">resultado de los prospectos registrados.</small>
                </div>
                <form  id="form" url='/forms' >
                    <div class="modal-body content_inputs_create_event_modal">

                        <div class="row">
                            <div>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <button type="button" class="ganados btn btn-primary m-r-sm"></button>
                                            Ganados
                                        </td>
                                        <td>
                                            <button type="button" class="perdidos btn btn-danger m-r-sm"></button>
                                            Perdidos
                                        </td>
                                        <td>
                                            <button type="button" class="proceso btn btn-info m-r-sm"></button>
                                            Proceso
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="close_modal" type="button" class="btn btn-warning">Cerrar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--FIN MODAL RESULTADOS PROSPECTOS -->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Auspiciadores</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="active">
                    <strong>Auspiciadores</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
              <div class="row  border-bottom white-bg dashboard-header">
                  <div class="table-responsive">
                  <table id="tblFolicular" class="table table-striped table-bordered table-hover dataTables-example" >
                      <thead>
                      <tr>
                          <th>Identificación</th>
                          <th>Correo</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Telefono</th>
                          <th >Acciones</th>
                      </tr>
                      </thead>
                  </table>
              </div>
              </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')

    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            var auspiciador = $('#tblFolicular').DataTable({
                pageLength: 25,
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                'proccesing':true,
                'serverSide':true,
                'ajax': "{{ route('auspiciadores_tabla')}}",
                'columns' : [
                    {data: 'identificacion'},
                    {data: 'correo'},
                    {data: 'nombres'},
                    {data: 'apellidos'},
                    {data: 'telefono'},

                    {
                        defaultContent:
                            '<button class="btn btn-success dim btn-sm" type="button"><i class="fa fa-handshake-o prospectos"></i></button>'+
                            '<button class="btn btn-info dim btn-sm" type="button"><i class="fa fa-bar-chart-o resultado"></i></button>',
                        data: 'action',
                        name: 'action',
                        title: 'Acciones',
                        orderable: false,
                        searchable: false,
                        exportable: false,
                        printable: false,
                        className: 'text-center',
                        render: null,
                        responsivePriority: 2
                    }
                ]
            });
            auspiciador.on('click','.resultado',function  (e){
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = auspiciador.row($tr).data();
                $('#modal_resultados').show();

                var route = '{{route('resulatos_prospecto')}}' + '/' + dataTable.id_usuario;
                $.ajax({
                    url: route,
                    type: 'GET',
                    beforeSend: function () {
                    },
                    success: function (response, xhr, request) {

                        $infoProspectos = response.msg;
                        $(".ganados").html($infoProspectos[0]);
                        $(".perdidos").html($infoProspectos[1]);
                        $(".proceso").html($infoProspectos[2]);

                    },
                    error: function (response, xhr, request) {
                        if (request.status === 422 && xhr === 'error') {
                        }
                    }
                });
            });

            auspiciador.on('click','.prospectos',function  (e) {
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = auspiciador.row($tr).data();
                window.location.href = "{{ route('auspiciador_prospecto')}}"+'/'+dataTable.id_usuario;

            });

            $('#close_modal').on('click',function(){
                $('#modal_resultados').hide();
            });



        });
    </script>
@endsection
