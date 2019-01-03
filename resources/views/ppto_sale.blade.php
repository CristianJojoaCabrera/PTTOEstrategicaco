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
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <div class="row">
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
                        <a title="Finalizar Ppto" class="btn btn-sm btn-success submit hidden">Finalizar<i class=""></i></a>
                    </div>
                </div>
                <div class="table-responsive col-md-10 col-md-offset-1">
                    <table id="tblCriteria" class="table table-striped table-bordered table-hover dataTables-example" >
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
                            <tr id="tr{{$criteria->id}}">
                                <td>
                                    <input size="35" id ="criteria{{$criteria->id}}" value="{{$criteria->name}}" disabled>
                                </td>
                                <td>
                                    <input class="inputCriteria" id ="percentage{{$criteria->id}}" name="percentage{{$criteria->id}}" value="">
                                </td>
                                <td>
                                    <input class="inputCriteria" id ="goal{{$criteria->id}}" name="goal{{$criteria->id}}" value="">
                                </td>
                                <td>
                                    <div align="center" class="i-checks"><input class="checkCriteria" data-id_checkCriteria='{{$criteria->id}}' type="checkbox" id="check{{$criteria->id}}" value=""></div>

                                </td>
                            </tr>
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
                var date = $('#date_ppto_sale').val();
                var funcionarity_id = '{{$funcionarity->id}}';
                var route = '{{route('exist_date_ptto_sale')}}'+'/'+funcionarity_id+'/'+date;
                $.ajax({
                    url: route,
                    type: 'GET',
                    beforeSend: function () {
                    },
                    success: function (response, xhr, request) {
                        if(response){

                        }else{
                            $('.sale').addClass('hidden');
                            $('.submit').removeClass('hidden');

                        }
                    },
                    error: function (response, xhr, request) {

                    }
                });

            });

            $('.checkCriteria').on('ifChecked', function(event){
                var idCriteria = $(this).data('id_checkcriteria');
                var goal = '#goal'+idCriteria;
                goal = $(goal).val();
                var percentage = '#percentage'+idCriteria;
                    percentage = $(percentage).val();
                objecDataCriteria.push({
                    idCriteria :idCriteria ,
                    percentage :percentage,
                    budget :goal

                });
            });
            $('.checkCriteria').on('ifUnchecked', function(event){
                var idSubservicio = $(this).data('id_checkcriteria');
            });
            $('.submit').on('click',function(){
                var funcionarity_id = '{{$funcionarity->id}}';
                var route = '{{ route('save_criteria_funcionarity') }}';
                var typeAjax = 'POST';
                var async = async || false;
                var formDatas = new FormData();
                formDatas.append('funcionarity_id',funcionarity_id);
                formDatas.append('objecDataCriteria',JSON.stringify(objecDataCriteria));
                formDatas.append('date_ppto_sale',$('#date_ppto_sale').val());
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
                        swal({
                                title: "",
                                text: "Se ha registrado el ppto venta, desea agregar otro",
                                type: "success",
                                showCancelButton: true,
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Si",
                                cancelButtonText: "No",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    $(".inputCriteria").val('');
                                    $('.submit').addClass('hidden');
                                    $('.sale').removeClass('hidden');

                                } else {

                                }
                            }
                        );
                    },
                    error: function (response, xhr, request) {
                        console.log('no hecho');
                    }
                });

            });

        });
    </script>
@endsection
