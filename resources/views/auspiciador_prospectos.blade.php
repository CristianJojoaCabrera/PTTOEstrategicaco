@extends('layouts.home')

@section('title', 'Inicio')
@section('css')
    <!-- Ladda style -->
    <link href="{{ asset('css/plugins/ladda/ladda-themeless.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Auspiciador Prospectos</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('auspiciadores') }}">auspiciadores</a>
                </li>
                <li class="active">
                    <strong>Auspiciador Prospectos</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">


        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-lg-4">
                        <h4>Identificacion:<strong class="estado_strong">{{$auspiciador->identificacion}}</strong> </h4>
                        <h4>Nombre: <strong class="estado_strong"> {{$auspiciador->nombres.' '.$auspiciador->apelllidos}}</strong></h4>
                    </div>
                    <div class="col-lg-4">
                        <h4>Correo:<strong> {{$auspiciador->correo}}</strong></h4>
                        <h4>Telefono: <strong class="agenda_strong">{{$auspiciador->telefono}}</strong></h4>
                    </div>

                    <div class="col-md-12 table-responsive">
                        <br><br>
                            <table id="tblFolicular" class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Empresa</th>
                                    <th>Contacto</th>
                                    <th>Cargo</th>
                                    <th>Telefono</th>
                                    <th>Oportunidad</th>
                                    <th>Estado</th>
                                    <th>Agenda</th>
                                    <th>Acciones</th>
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
    <!-- Ladda -->
    <script src="{{asset('js/plugins/ladda/spin.min.js')}}"></script>
    <script src="{{asset('js/plugins/ladda/ladda.min.js')}}"></script>
    <script src="{{asset('js/plugins/ladda/ladda.jquery.min.js')}}"></script>

    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var id_auspiciador = '{{$id_auspiciador}}';
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
                'ajax': "{{ route('prospectos_auspiciador_tabla')}}"+'/'+id_auspiciador,
                'columns' : [
                    {data: 'nombre_empresa'},
                    {data: 'nombre_contacto'},
                    {data: 'cargo_contacto'},
                    {data: 'telefono'},
                    {data: 'oportunidad'},
                    //{data: 'estado.nombre'},
                    {data: function(data){
                        if(typeof(data.estado) != "undefined" && data.estado !== null) {
                            return data.estado.nombre;
                        }else{
                            return 'Sin esatdo';
                        }

                    }},
                    {data: function(data){
                        if(typeof(data.trazabilidad) != "undefined" && data.trazabilidad !== null) {
                            if(data.trazabilidad.fecha == ''){
                                return 'Sin agendar';
                            }else{
                                return data.trazabilidad.fecha+" "+data.trazabilidad.hora;
                            }
                        }else{
                            return 'Sin agendar'
                        }

                    }},

                    {
                        defaultContent:
                        '<button class="btn btn-warning dim btn-sm" type="button"><i class="fa fa-edit prospectos"></i></button>',

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
            auspiciador.on('click','.prospectos',function  (e){
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = auspiciador.row($tr).data();
                console.log(dataTable);
                var route = '{{route('auspiciador_prospectos_detalles')}}'+'/'+dataTable.id_prospecto;
                $('#content-ajax').load(route);
            });
        });
    </script>
@endsection
