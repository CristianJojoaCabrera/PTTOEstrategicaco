    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Presupuesto de Ventas</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Ppto Gestion</strong>
                </li>
            </ol>
        </div>
    </div>
    <br>
    <div class="ibox-content m-b-sm border-bottom">
        <div data-toggle="buttons" class="btn-group">
            <label class="btn btn-sm btn-white  createPpto">
                <input type="radio" id="option1" name="options">
                Crear PTTO
            </label>
            <label class="btn btn-sm btn-white active editPpto">
                <input type="radio" id="option2" name="options">
                Editar PTTO
            </label>
            <br>
        </div>

        <div class="row">
            <br>
            <div class="form-group col-lg-4">
                <label>Cargo</label>
                <input type="text" class="form-control input-sm" name="position" id="position" value = "{{$funcionarity->position}}">
            </div>
            <div class="form-group col-lg-4">
                <label>Nombres</label>
                <input type="text" class="form-control input-sm" name="name" id="name" value = "{{$funcionarity->name}}">
            </div>
            <div class="form-group col-lg-4">
                <label>Tipo Contrato</label>
                <input type="text" class="form-control input-sm" name="contract_type" id="contract_type" value="{{$funcionarity->contract_type}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-4">
                <label>Fecha Ingreso</label>
                <input type="text" class="form-control input-sm" name="date_admision" id="date_admision" value="{{$funcionarity->date_admision}}">
            </div>
            <div class="form-group col-lg-4">
                <label>Tiempo Contrato</label>
                <input type="text" class="form-control input-sm" name="duration" id="duration" value="{{$funcionarity->duration}}">
            </div>
            <div class="form-group col-lg-4">
                <label>Salario</label>
                <input type="text" class="form-control input-sm" name="basic_salary" id="basic_salary" value="{{$funcionarity->basic_salary}}">
            </div>
        </div>
    </div>
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <br>

            <div class="row">
                <div class="form-group col-md-4 col-md-offset-2">
                    <label>Fecha</label>
                    <select class="form-control" id="date_table_ppto">
                        @foreach($sales as $sale)
                            <option value={{$sale['id']}}>{{$sale['date']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <a title="Consultar Ppto" class="btn btn-sm btn-primary consult">Consultar<i class=""></i></a>
                </div>
            </div>
            <br>
            <div class="table-responsive col-lg-12">
                <table id="tblPptoFuncionarity" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Criterio</th>
                            <th>Porcentaje</th>
                            <th>Presupuesto</th>
                            <th>Acumulado</th>
                            <th>Ejecución</th>
                            <th>Acumulado Ejecución</th>
                            <th>Cumplimiento</th>
                            <th>Acumulado Cumplimiento</th>
                            <th>Devengado</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var tblPptoFuncionarity =
                $('#tblPptoFuncionarity').DataTable({
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
                    }
                });
            $('.consult').on('click',function(){
                var date = $('#date_table_ppto').val();
                var route = '{{route('table_ppto_funcionarity',$funcionarity->id)}}'+'/'+date;
                tblPptoFuncionarity.destroy();
                tblPptoFuncionarity =
                    $('#tblPptoFuncionarity').DataTable({
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
                        'ajax': route,
                        'columns' : [
                            {data: 'criteria'},
                            {data: 'percentage'},
                            {data: 'budget'},
                            {data: 'accumulated'},
                            {data: 'execution'},
                            {data: 'accumulated_budget'},
                            {data: 'execution_percentage'},
                            {data: 'accumulated_percentage'},
                            {data: 'total_accrued'},
                            {
                                defaultContent:
                                    '<div class="align-content-center"><a title="" href="javascript:;" class="btn btn-warning btn-sm asignar"><i class="glyphicon glyphicon-pencil"></i></a>',
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

            tblPptoFuncionarity.on('click', '.asignar', function (e) {
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = tblPptoFuncionarity.row($tr).data();
                console.log(dataTable);
                swal({
                        title: "Ejecución",
                        text: "Ejecución Mes:",
                        type: "input",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        confirmButtonText: "Guardar",
                        cancelButtonText: "Salir",
                        animation: "slide-from-top",
                        inputPlaceholder: "Ejecución Mes"
                    },
                    function(inputValue){
                        if (inputValue === false) return false;
                        if (inputValue === "") {
                            swal.showInputError("Error");
                            return false;
                        }
                    });

            });

            $('#txtQuota,#quota,#serviceValue').on("keyup",function( event ){
                var selection = window.getSelection().toString();
                if ( selection !== '' ) return;
                if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 )  return;
                var $this = $( this );
                var input = $this.val();
                var input = input.replace(/[\D\s\._\-]+/g, "");
                input = input ? parseInt( input, 10 ) : 0;
                $this.val( function() {
                    return ( input === 0 ) ? "" : input.toLocaleString( "es" );
                } );
            });
        });
    </script>

