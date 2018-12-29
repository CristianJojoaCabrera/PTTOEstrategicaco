@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <!--MODAL AUSPICIADORPROSPECTO EVENTO -->
    <div class="modal inmodal" id="auspiciador_info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInLeft">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Información De Prospecto</h4>
                    <small class="font-bold">Detalles auspiciador-prospecto.</small>
                </div>
                <div class="modal-body content_inputs_create_event_modal">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label>Identificación</label>
                                <input id = 'identificacionAuspiciador' type="text" class="form-control input-sm" name="identificacionAuspiciador">
                            </div>
                            <div class="">
                                <label>Nombre</label>
                                <input id = 'nombreAuspiciador' type="text" class="form-control input-sm" name="nombreAuspiciador">
                            </div>
                            <div class="">
                                <label>Apellido</label>
                                <input id = 'apellidoAuspiciador' type="text" class="form-control input-sm" name="apellidoAuspiciador">
                            </div>
                            <div class="">
                                <label>Correo</label>
                                <input id = 'correoAuspiciador' type="text" class="form-control input-sm" name="correoAuspiciador">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label id="lbl_other_event">Empresa: </label>
                                <input id = 'empresaAuspiciador' type="text" class="form-control input-sm" name="empresaAuspiciador">
                            </div>
                            <div class="">
                                <label id="lbl_other_event">Contacto: </label>
                                <input id = 'contactoAuspiciador' type="text" class="form-control input-sm" name="empresaAuspiciador">
                            </div>
                            <div class="">
                                <label id="lbl_other_event">Telefono: </label>
                                <input id = 'telefonoAuspiciador' type="text" class="form-control input-sm" name="empresaAuspiciador">
                            </div>
                            <div class="">
                                <label id="lbl_other_event">Oportunidad: </label>
                                <input id = 'oportunidadAuspiciador' type="text" class="form-control input-sm" name="oportunidadAuspiciador">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="close_modal" type="button" class="btn btn-warning">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--FIN MODAL AUSPICIADROPROSPECTO EVENTO-->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Prospectos</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
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

                          <th>Nombre</th>
                          <th>Empresa</th>
                          <th>Contacto</th>
                          <th>Telefono</th>
                          <th>Oportunidad</th>
                          <th>Estado</th>
                          <th >Acciones</th>
                      </tr>
                      </thead>
                      <tbody>

                      </tbody>
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

            var prospectos = $('#tblFolicular').DataTable({
                pageLength: 10,
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
                'ajax': "{{ route('prospectos_tabla')}}",
                'columns' : [

                    {data: 'user.nombres'},
                    {data: 'nombre_empresa'},
                    {data: 'nombre_contacto'},
                    {data: 'telefono'},
                    {data: 'oportunidad'},
                    {data: 'estado.nombre'},
                    {
                        defaultContent:
                            '<button class="btn btn-warning dim" type="button"><i class="fa fa-edit editar"></i></button>'+
                            '<button class="btn btn-info dim" type="button"><i class="fa fa-user info_auspiciador"></i></button>',
                        data: 'action',
                        name: 'action',
                        title: 'Acciones',
                        orderable: false,
                        searchable: false,
                        exportable: false,
                        printable: false,
                        className: 'text-center',
                        render: null,
                        responsivePriority: 3
                    }
                ]
            });
            prospectos.on('click','.editar',function  (e){
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = prospectos.row($tr).data();
                window.location.href = "{{ route('detalles_prospecto')}}"+'/'+dataTable.id_prospecto;
            });
            prospectos.on('click','.info_auspiciador',function  (e){
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = prospectos.row($tr).data();
                console.log(dataTable);
                $('#identificacionAuspiciador').val(dataTable.user.identificacion);
                $('#nombreAuspiciador').val(dataTable.user.nombres);
                $('#apellidoAuspiciador').val(dataTable.user.apellidos);
                $('#correoAuspiciador').val(dataTable.user.correo);
                $('#empresaAuspiciador').val(dataTable.nombre_empresa);
                $('#contactoAuspiciador').val(dataTable.nombre_contacto);
                $('#telefonoAuspiciador').val(dataTable.telefono);
                $('#oportunidadAuspiciador').val(dataTable.oportunidad);
                $('#auspiciador_info').show();

            });
            $('#close_modal').on('click',function(){
                $('#auspiciador_info').hide();
            });

        });
    </script>
@endsection
