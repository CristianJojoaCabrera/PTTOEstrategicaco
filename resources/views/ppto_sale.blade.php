@extends('layouts.home')

@section('title', 'Inicio')

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
                        <label>Tiempo Contrato</label>devengado
                        <input type="text" class="form-control input-sm" name="duration" id="duration" value="{{$funcionarity->duration}}">
                    </div>
                    <div class="form-group col-lg-4">
                        <label>Salario</label>
                        <input type="text" class="form-control input-sm" name="basic_salary" id="basic_salary" value="{{$funcionarity->basic_salary}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Fecha Ppto</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="date_admision" id="date_admision" class="form-control input-sm">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a title="Aplica Ppto" class="btn btn-sm btn-primary sale">Ingresar<i class=""></i></a>
                    </div>
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
            $('.input-group.date').datepicker({
                format: "mm-yyyy",
                viewMode: "months",
                minViewMode: "months"
            });

        });
    </script>
@endsection
