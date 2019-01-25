@extends('layouts.home')
@section('title', 'Inicio')
@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection
@section('content')

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
            <label class="btn btn-sm btn-white active createPpto">
                <input type="radio" id="option1" name="options">
                Crear PTTO
            </label>
            <label class="btn btn-sm btn-white editPpto">
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
            <div class="form-group col-md-4 col-md-offset-2">
                <label>Fecha Ppto</label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="date_ppto_sale" id="date_ppto_sale" class="form-control input-sm">
                </div>
            </div>

            <div class="form-group col-md-2 col-md-offset-1">
                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <a title="Aplica Ppto" class="btn btn-sm btn-primary sale">Ingresar<i class=""></i></a>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-2 progress progress-striped active">
                <div style="text-align: center" id="progressPercent" style="width: 0%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="75" role="progressbar" class="progress-bar progress-bar-danger">
                    <span style="text-align: center" id='progressPercentVal'>0% Asignado</span>
                </div>
            </div>
        </div>
        <div style="text-align: center">
            <a title="Finalizar Ppto" class="btn btn-sm btn-success submit hidden">Finalizar Presupuesto de Venta<i class=""></i></a>
        </div>

        <div class="row">
            <br>
            <div class="col-lg-12">
                <div class="table-responsive col-md-10 col-md-offset-1 hidden">
                    <table id="tblCriteria" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th style="text-align: center">Check</th>
                            <th>Criterio</th>
                            <th>Peso</th>
                            <th>Meta</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($criterias as $criteria)
                            @if($criteria->name === 'Visitas realizadas')
                                <tr id="tr{{$criteria->id}}">
                                    <td>
                                        <div align="center" class="i-checks"><input class="checkCriteria" data-id_checkCriteria='{{$criteria->id}}' type="checkbox" id="check{{$criteria->id}}" value=""></div>
                                    </td>
                                    <td>
                                        <input size="35" id ="criteria{{$criteria->id}}" value="{{$criteria->name}}" disabled>
                                    </td>
                                    <td>
                                        <input class="inputCriteriaVisita" id ="percentage{{$criteria->id}}" name="percentage{{$criteria->id}}" value="">
                                    </td>
                                    <td>
                                        <input class="inputCriteriaGoal" id ="goal{{$criteria->id}}" name="goal{{$criteria->id}}" value="">
                                    </td>
                                </tr>
                            @else
                                <tr id="tr{{$criteria->id}}">
                                    <td>
                                        <div align="center" class="i-checks"><input class="checkCriteria" data-id_checkCriteria='{{$criteria->id}}' type="checkbox" id="check{{$criteria->id}}" value=""></div>
                                    </td>
                                    <td>
                                        <input size="35" id ="criteria{{$criteria->id}}" value="{{$criteria->name}}" disabled>
                                    </td>
                                    <td>
                                        <input class="inputCriteriaPercentage" id ="percentage{{$criteria->id}}" name="percentage{{$criteria->id}}" value="">
                                    </td>
                                    <td>
                                        <input class="inputCriteriaGoal" id ="goal{{$criteria->id}}" name="goal{{$criteria->id}}" value="">
                                    </td>
                                </tr>
                            @endif
                        @endforeach
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
    <!-- iCheck -->
    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var objecDataCriteria=[] ;
            var updateProgressBar = (id_checkcriteria)=>{
                let sumatoriapeso = 0;
                objecDataCriteria.forEach(function(value,index){
                    let pesoVal = 0;
                    if(value.percentage != ''){
                        pesoVal = parseInt(((value.percentage).replace('%','')));
                        sumatoriapeso += pesoVal;
                    }
                });
                if(sumatoriapeso>100){
                    let check = '#check'+id_checkcriteria;
                    $(check).iCheck('uncheck');
                    swal({
                            title: "Ha superado el 100% ",
                            text: "debe ajustar los porcentajes",
                            type: "warning",
                            confirmButtonText: "ok",
                            closeOnConfirm: true
                        },
                        function(){
                            $(check).iCheck('update');
                        });
                }else{
                    if(sumatoriapeso<=50)$('#progressPercent').removeClass('progress-bar-warning progress-bar-primary').addClass('progress-bar-danger');
                    if(sumatoriapeso>=51 && sumatoriapeso<=99)$('#progressPercent').removeClass('progress-bar-danger progress-bar-primary').addClass('progress-bar-warning');
                    if(sumatoriapeso == 100){
                        $('#progressPercent').removeClass('progress-bar-danger progress-bar-warning').addClass('progress-bar-primary');
                    }
                    $('#progressPercent').css("width", sumatoriapeso+"%");
                    $('#progressPercentVal').text(`${sumatoriapeso}% Asignado`);
                }
                if(sumatoriapeso >= 100){$('.submit').removeClass('hidden');}else{$('.submit').addClass('hidden');}
            };
            $('.input-group.date').datepicker({
                format: "yyyy-mm",
                viewMode: "months",
                minViewMode: "months"
            });
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
            $('.sale').on('click',function(){
                if(Object.keys(objecDataCriteria).length >0){
                    swal({
                            title: "Esta Seguro de Ingresar otra fecha",
                            text: "La fecha tiene criterios asignados y se borraran",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Si, Continuar",
                            cancelButtonText: "Cancelar",
                            closeOnConfirm: true,
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $('#progressPercent').css("width", 0+"%");
                                $('#progressPercentVal').text(`0% Asignado`);
                                $('.checkCriteria').iCheck('uncheck');
                                $(".inputCriteriaPercentage,.inputCriteriaGoal,.inputCriteriaVisita").val('');
                                $("#date_ppto_sale").val('');
                                $('.submit').addClass('hidden');
                                $('.sale').removeClass('hidden');
                            }
                        });
                }else{
                    var date = $('#date_ppto_sale').val()+'-01';
                    var funcionarity_id = '{{$funcionarity->id}}';
                    var route = '{{route('exist_date_ptto_sale')}}'+'/'+funcionarity_id+'/'+date;
                    $.ajax({
                        url: route,
                        type: 'GET',
                        beforeSend: function () {
                        },
                        success: function (response, xhr, request) {
                            if(response){
                                swal("", "Esta Fecha ya existe.", "info");
                            }else{
                                $('.table-responsive').removeClass('hidden');
                            }
                        },
                        error: function (response, xhr, request) {
                        }
                    });
                }

            });
            $('.checkCriteria').on('ifChecked', function(event){
                let idCriteria = parseInt($(this).data('id_checkcriteria'));
                let goal = '#goal'+idCriteria;
                goal = $(goal).val();
                let percentage = '#percentage'+idCriteria;
                    percentage = $(percentage).val();
                objecDataCriteria.push({
                    idCriteria :idCriteria ,
                    percentage :percentage,
                    budget :goal,
                    updatePercentage:function(percentage){
                        this.percentage = percentage;
                    },
                    updateBudget:function(budget){
                        this.budget = budget;
                    },
                });
                updateProgressBar(idCriteria);

            });
            $('.checkCriteria').on('ifUnchecked', function(event){
                var id_checkcriteria = $(this).data('id_checkcriteria');
                objecDataCriteria =   objecDataCriteria.filter(function(idCriteria) {
                    return idCriteria.idCriteria != id_checkcriteria;
                });
                $('#check2').iCheck('update');
                let sumatoriapeso = 0;
                objecDataCriteria.forEach(function(value,index){
                    let pesoVal = 0;
                    if(value.percentage != ''){
                        pesoVal = parseInt(((value.percentage).replace('%','')));
                        sumatoriapeso += pesoVal;
                    }
                });
                if(sumatoriapeso<=50)$('#progressPercent').removeClass('progress-bar-warning progress-bar-primary').addClass('progress-bar-danger');
                if(sumatoriapeso>=51 && sumatoriapeso<=99)$('#progressPercent').removeClass('progress-bar-danger progress-bar-primary').addClass('progress-bar-warning');
                if(sumatoriapeso == 100){
                    $('#progressPercent').removeClass('progress-bar-danger progress-bar-warning').addClass('progress-bar-primary');
                }
                $('#progressPercent').css("width", sumatoriapeso+"%");
                $('#progressPercentVal').text(`${sumatoriapeso}% Asignado`);
                if(sumatoriapeso >= 100){$('.submit').removeClass('hidden');}else{$('.submit').addClass('hidden');}

            });
            $('.submit').on('click',function(){
                var funcionarity_id = '{{$funcionarity->id}}';
                var route = '{{ route('save_criteria_funcionarity') }}';
                var typeAjax = 'POST';
                var async = async || false;
                var formDatas = new FormData();
                formDatas.append('funcionarity_id',funcionarity_id);
                formDatas.append('objecDataCriteria',JSON.stringify(objecDataCriteria));
                formDatas.append('date_ppto_sale',$('#date_ppto_sale').val()+'-01');
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
                        swal("Registrado", "Se ha registrado el ppto venta.", "success");
                        $('.checkCriteria').iCheck('uncheck');
                        $(".inputCriteriaPercentage,.inputCriteriaGoal,.inputCriteriaVisita").val('');
                        $("#date_ppto_sale").val('');
                        $('.submit').addClass('hidden');
                        $('.sale').removeClass('hidden');
                        objecDataCriteria=[]
                    },
                    error: function (response, xhr, request) {
                        swal("Error", "algo salio mal.", "error");
                        objecDataCriteria=[]
                    }
                });
            });
            $('.editPpto').on('click',function(){
                var route = '{{route('ppto_sale_edit',$funcionarity->id)}}';
                $("#content-ajax").load(route);
            });
            $('.inputCriteriaPercentage').on("keyup",function( event ){
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
            $('.inputCriteriaGoal').on("keyup",function( event ){
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
            $(".inputCriteriaPercentage").focusout(function(){
                let thisPeso = $(this).val();
                let idCriteria = parseInt((($(this).attr('id')).replace('percentage','')));
                let index = objecDataCriteria.findIndex(x => x.idCriteria === idCriteria);
                if(index >= 0){
                    let tempPeso = objecDataCriteria[index].percentage;
                    if(objecDataCriteria[index].percentage != thisPeso){
                        objecDataCriteria[index].updatePercentage(thisPeso);
                        let sumatoriapeso = 0;
                        objecDataCriteria.forEach(function(value,index){
                            let pesoVal = 0;
                            if(value.percentage != ''){
                                pesoVal = parseInt(((value.percentage).replace('%','')));
                                sumatoriapeso += pesoVal;
                            }
                        });
                        if(sumatoriapeso>100){
                            $(this).val(tempPeso);
                            objecDataCriteria[index].updatePercentage(tempPeso);
                            let check = '#check'+objecDataCriteria[index].idCriteria;
                            if(tempPeso == '')$(check).iCheck('uncheck');
                            swal({
                                    title: "Ha superado el 100% ",
                                    text: "debe ajustar los porcentajes",
                                    type: "warning",
                                    confirmButtonText: "ok",
                                    closeOnConfirm: true
                                },
                                function(){
                                    $(check).iCheck('update');
                                });
                        }else{
                            if(sumatoriapeso<=50)$('#progressPercent').removeClass('progress-bar-warning progress-bar-primary').addClass('progress-bar-danger');
                            if(sumatoriapeso>=51 && sumatoriapeso<=99)$('#progressPercent').removeClass('progress-bar-danger progress-bar-primary').addClass('progress-bar-warning');
                            if(sumatoriapeso == 100){
                                $('#progressPercent').removeClass('progress-bar-danger progress-bar-warning').addClass('progress-bar-primary');
                            }
                            $('#progressPercent').css("width", sumatoriapeso+"%");
                            $('#progressPercentVal').text(`${sumatoriapeso}% Asignado`);
                        }
                        if(sumatoriapeso >= 100){$('.submit').removeClass('hidden');}else{$('.submit').addClass('hidden');}
                    }
                }
            });
            $(".inputCriteriaGoal").focusout(function(){
                let thisGoal = $(this).val();
                let idCriteria = parseInt((($(this).attr('id')).replace('goal','')));
                let index = objecDataCriteria.findIndex(x => x.idCriteria === idCriteria);
                if(index >= 0){
                    if(objecDataCriteria[index].budget != thisGoal){
                        objecDataCriteria[index].updateBudget(thisGoal);
                    }
                }
            });
        });
    </script>
@endsection
