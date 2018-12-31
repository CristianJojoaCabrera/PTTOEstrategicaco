@extends('layouts.home')

@section('title', 'Inicio')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Personal</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Personal</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <br>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <div>
                    <a href="{{route('funcionarity')}}" type="button" class="btn btn-primary">Crear</a>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="tblFuncionarity" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo Identificación</th>
                            <th>Número</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>Venta</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')

    <!-- Toastr script -->
    <script src="{{ asset('js/plugins/toastr/toastr.min.js')}}"></script>
    <!--sweet-->
    <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            var tblFuncionarity = $('#tblFuncionarity').DataTable({
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
                'ajax':  '{{ route('funcionarity_table') }}',
                'columns' : [
                    {data: 'name'},
                    {data: 'last_name'},
                    {data: 'document_type'},
                    {data: 'document_number'},
                    {data: 'phone'},
                    {data: 'position'},
                    {data: 'sell'},
                    {
                        defaultContent:
                            '<div class="align-content-center"><a title="Editar Costo" href="javascript:;" class="btn btn-sm btn-warning edit"><i class="glyphicon glyphicon-pencil"></i></a>',
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


        });
    </script>
@endsection
