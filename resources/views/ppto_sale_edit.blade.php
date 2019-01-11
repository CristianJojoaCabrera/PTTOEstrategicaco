
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content animated bounceInDown">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Editar Campos presupuesto - ejecución</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <br>
                    <div class="form-group col-lg-4">
                        <label>Porcentaje</label>
                        <input type="text" class="form-control input-sm" name="percentage_edit" id="percentage_edit" value = "">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Presupuesto</label>
                        <input type="text" class="form-control input-sm" name="budget_edit" id="budget_edit" value = "">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Ejecución</label>
                        <input type="text" class="form-control input-sm" name="execution_edit" id="execution_edit" value = "">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id = "save_data_edit_ppto">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
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
            <div class="table-responsive col-lg-12">
                <br>
                <a title="Agregar Criterio" class="btn btn-sm btn-primary show_table_criteria">Agregar Criterio<i class=""></i></a>
                <a title="Tabla ppto" class="btn btn-sm btn-success show_table_ppto hidden">Mostrar tabla PPTO<i class=""></i></a>

                <br><br>
                <div id ='tblPptoFuncionarityDiv'>
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
                            <th>Monto a pagar</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <table id="tblCriteria_edit" class="table table-striped table-bordered table-hover dataTables-example hidden" >
                    <thead>
                    <tr>
                        <th>Criterio</th>
                        <th>Porcentaje</th>
                        <th>Meta</th>
                        <th>Check</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($criterias as $criteria)
                        <tr id="tredit{{$criteria->id}}">
                            <td>
                                <input size="35" id ="criteriaedit{{$criteria->id}}" value="{{$criteria->name}}" disabled>
                            </td>
                            <td>
                                <input class="inputCriteriaeditPercen" id ="percentageedit{{$criteria->id}}" name="percentageedit{{$criteria->id}}" value="">
                            </td>
                            <td>
                                <input class="inputCriteriaeditGoal" id ="goaledit{{$criteria->id}}" name="goaledit{{$criteria->id}}" value="">
                            </td>
                            <td>
                                <div align="center" class="i-checksedit"><input class="checkCriteriaedit" data-id_checkCriteriaedit='{{$criteria->id}}' type="checkbox" id="checkedit{{$criteria->id}}" value=""></div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="button_submit_edit hidden" style="text-align:right; width:100%; padding:0;">
                    <a title="Finalizar ppto" class="btn btn-sm btn-success submit_edit">Finalizar<i class=""></i></a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var id_ppto;
            var objecDataCriteriaedit=[];
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
                            {data: 'accumulated_execution'},
                            {data: 'execution_percentage'},
                            {data: 'accumulated_percentage'},
                            {data: 'total_accrued'},
                            {   data:'Accion',
                                width:'8%',
                                orderable: false,
                                searchable: false
                            }
                        ]
                    });

            });

            tblPptoFuncionarity.on('click', '.asignar', function (e) {
                e.preventDefault();
                $tr = $(this).closest('tr');
                var dataTable = tblPptoFuncionarity.row($tr).data();
                console.log(dataTable);
                id_ppto = dataTable.id;
                $('#percentage_edit').val(dataTable.percentage);
                $('#budget_edit').val(dataTable.budget);
                $('#execution_edit').val(dataTable.execution);
                $('#modal').modal('toggle');
            });
            $('#save_data_edit_ppto').on('click',function(){
                var route = '{{ route('save_data_edit_ppto') }}';
                var typeAjax = 'POST';
                var async = async || false;
                var formDatas = new FormData();
                var percentage = $('#percentage_edit').val();
                percentage = percentage.replace('%','');
                console.log(percentage);
                console.log($('#percentage_edit').val());
                formDatas.append('percentage', percentage);
                formDatas.append('budget', $('#budget_edit').val());
                formDatas.append('execution',$('#execution_edit').val());
                formDatas.append('id_ppto',id_ppto);
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    type: typeAjax,
                    contentType: false,
                    data: formDatas,
                    processData: false,
                    async: async,
                    beforeSend: function () {

                    },
                    success: function (response, xhr, request) {

                    console.log(response);
                        tblPptoFuncionarity.ajax.reload();
                        $('#modal').modal('toggle');
                    },
                    error: function (response, xhr, request) {


                    }
                });
            });
            $('.show_table_criteria').on('click',function(){
                $("#tredit1,#tredit2,#tredit3,#tredit4,#tredit5,#tredit6,#tredit7").addClass('hidden');

                var date_id = $('#date_table_ppto').val();
                console.log(date_id);
                var route = '{{route('list_criteria_date_without_check')}}'+'/'+date_id;
                $.ajax({
                    url: route,
                    type: 'GET',
                    beforeSend: function () {
                    },
                    success: function (response, xhr, request) {
                        console.log(response);
                        $(response).each(function (key, value) {
                            var tredit = "#tredit" + value.id;
                            console.log(tredit);
                            $(tredit).removeClass('hidden');
                        });
                        $('.show_table_ppto').removeClass('hidden');
                        $('.show_table_criteria').addClass('hidden');
                        $('#tblCriteria_edit').removeClass('hidden');
                        $('#tblPptoFuncionarityDiv').addClass('hidden');
                        $('.button_submit_edit').removeClass('hidden');
                    },
                    error: function (response, xhr, request) {

                    }
                });
            });
            $('.show_table_ppto').on('click',function(){
                $('.show_table_criteria').removeClass('hidden');
                $('.show_table_ppto').addClass('hidden');
                $('#tblPptoFuncionarityDiv').removeClass('hidden');
                $('#tblCriteria_edit').addClass('hidden');
                $('.button_submit_edit').addClass('hidden');
            });
            $('.checkCriteriaedit').on('ifChecked', function(event){
                var idCriteria = $(this).data('id_checkcriteriaedit');
                var goal = '#goaledit'+idCriteria;
                goal = $(goal).val();
                var percentage = '#percentageedit'+idCriteria;
                percentage = $(percentage).val();
                objecDataCriteriaedit.push({
                    idCriteria :idCriteria ,
                    percentage :percentage,
                    budget :goal
                });
                console.log(objecDataCriteriaedit);
            });
            $('.checkCriteriaedit').on('ifUnchecked', function(event){
                var id_checkcriteria = $(this).data('id_checkcriteriaedit');
                objecDataCriteriaedit =   objecDataCriteriaedit.filter(function(idCriteria) {
                    return idCriteria.idCriteria != id_checkcriteria;
                });
                console.log(objecDataCriteriaedit);
            });
            $('.submit_edit').on('click',function(){
                var route = '{{ route('save_criteria_funcionarity_edit') }}';
                var typeAjax = 'POST';
                var async = async || false;
                var formDatas = new FormData();
                formDatas.append('sale_id',$('#date_table_ppto').val());
                formDatas.append('objecDataCriteriaedit',JSON.stringify(objecDataCriteriaedit));
                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    type: typeAjax,
                    contentType: false,
                    data: formDatas,
                    processData: false,
                    async: async,
                    beforeSend: function () {
                    },
                    success: function (response, xhr, request){
                        tblPptoFuncionarity.ajax.reload();
                        swal("Registrado", "Se ha agregado criterios al ppto de venta.", "success");
                        $('.checkCriteriaedit').iCheck('uncheck');
                        $(".inputCriteriaedit").val('');
                        objecDataCriteriaedit=[];
                        $('.show_table_criteria').removeClass('hidden');
                        $('.show_table_ppto').addClass('hidden');
                        $('#tblPptoFuncionarityDiv').removeClass('hidden');
                        $('#tblCriteria_edit').addClass('hidden');
                        $('.button_submit_edit').addClass('hidden');
                    },
                    error: function (response, xhr, request) {
                        swal("Error", "algo salio mal.", "error");
                        objecDataCriteria=[]
                    }
                });
            });
            $('.inputCriteriaeditPercen,#percentage_edit').on("keyup",function( event ){
                var selection = window.getSelection().toString();
                if ( selection !== '' ) return;
                if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 )  return;
                var $this = $( this );
                var input = $this.val();
                var input = input.replace(/[\D\s\._\-]+/g, "");
                input = input ? parseInt( input, 10 ) : 0;
                $this.val( function() {
                    return ( input === 0 ) ? "" : input.toLocaleString( "es" )+'%';
                } );
            });
            $('.inputCriteriaeditGoal,#budget_edit,#execution_edit').on("keyup",function( event ){
                var selection = window.getSelection().toString();
                if ( selection !== '' ) return;
                if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 )  return;
                var $this = $( this );
                var input = $this.val();
                var input = input.replace(/[\D\s\._\-]+/g, "");
                input = input ? parseInt( input, 10 ) : 0;
                $this.val( function() {
                    return ( input === 0 ) ? "" : '$'+input.toLocaleString( "es" );
                } );
            });
            $('.i-checksedit').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
            $('.createPpto').on('click',function(){
                var route = '{{route('ppto_sale_ajax',$funcionarity->id)}}';
                $("#content-ajax").load(route);
            });
        });
    </script>

