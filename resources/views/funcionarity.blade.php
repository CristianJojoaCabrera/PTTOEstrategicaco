@extends('layouts.home')

@section('title', 'Inicio')
@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection
@section('content')


    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7">
                <h2>Crear Personal</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="{{route('funcionarity_index')}}">Personal</a>
                    </li>
                    <li class="active">
                        <strong>Formulario Crear Personal</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <br>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <form id="form" method="POST" action="{{route('save_funcionarity')}}" class="wizard-big">
                    {{ csrf_field() }}
                    <h1>Formulario</h1>
                    <fieldset>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Fecha Ingreso</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="date_admision" id="date_admision" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Cargo</label>
                                        <select class="form-control" name ="position" id="position">
                                            <option value="Ejecutivo">Ejecutivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control input-sm" name="name" id="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Apellidos</label>
                                        <input type="text" class="form-control input-sm" name="last_name" id="last_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Tipo de Identificación</label>
                                        <select class="form-control" name = "document_type" id="document_type">
                                            <option value="CC">CC</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Numero</label>
                                        <input type="text" class="form-control input-sm" name="document_number" id="document_number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>De</label>
                                        <input type="text" class="form-control input-sm" name="document_from" id="document_from">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Dirección</label>
                                        <input type="text" class="form-control input-sm" name="address" id="address">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Telefono</label>
                                        <input type="text" class="form-control input-sm" name="phone" id="phone">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Celular</label>
                                        <input type="text" class="form-control input-sm" name="cell_phone" id="cell_phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <h1>Formulario</h1>
                    <fieldset>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Eps</label>
                                        <input type="text" class="form-control input-sm" name="eps" id="eps">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Pensiones</label>
                                        <input type="text" class="form-control input-sm" name="pension" id="pension">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Cesantias</label>
                                        <input type="text" class="form-control input-sm" name="unemployment" id="unemployment">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tipo Contrato</label>
                                        <select class="form-control"  name="contract_type" id="contract_type">
                                            <option value="Termino Fijo">Termino Fijo</option>
                                            <option value="Termino Indefinido">Termino Indefinido</option>
                                            <option value="Prestación de servicios">Prestación de servicios</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Numero Contrato</label>
                                        <input type="text" class="form-control input-sm" name="number_contract" id="number_contract">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Riesgo</label>
                                        <input type="text" class="form-control input-sm" name="risk" id="risk">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Duración</label>
                                        <input type="text" class="form-control input-sm" name="duration" id="duration">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>mes-año</label>
                                        <select class="form-control" id="">
                                            <option value="mes">mes</option>
                                            <option value="año">año</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Salario Basico</label>
                                        <input type="text" class="form-control input-sm" name="basic_salary" id="basic_salary">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Comisiones</label>
                                        <select class="form-control" name="commission" id="commission">
                                            <option value="si">si</option>
                                            <option value="no">no</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Funciones</label>
                                        <textarea class="form-control" name="" ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')

    <!-- Steps -->
    <script src="{{ asset('js/plugins/steps/jquery.steps.min.js') }}"></script>
    <!--sweet-->
    <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $("#form").steps({
                labels: {
                    next: "Siguiente",
                    previous: "Anterior",
                    finish: "Finalizar",
                },
                bodyTag: "fieldset",
                beforeForward: function( event, state ) {

                    if ( state.stepIndex === 1 ) {
                        $("#name").text($("[name=name]").val());

                    } else if ( state.stepIndex === 2 ) {
                        $("#gender").text($("[name=gender]").val());
                    }
                    return $( this ).wizard( "form" ).valid();
                },
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {

                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });

            //$("#form").steps("getCurrentIndex");

            if ( $("#form").steps("getCurrentIndex") == 0 ) {
                $('.input-group.date').datepicker({
                    todayBtn: "linked",
                    language: 'es',
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    format: 'yyyy/mm/dd',
                    autoclose: true
                });
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            }
        });
    </script>
@endsection
