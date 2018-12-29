@extends('layouts.home')

@section('title', 'Inicio')

@section('content')
    <!--MODAL ACTUALIZAR PROSPECTO EVENTO -->
    <div class="modal inmodal" id="modal_acualizar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="width:800px;">
            <div class="modal-content animated bounceInLeft">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"></span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Información De Prospecto</h4>
                    <small class="font-bold">Detalles actualización-prospecto.</small>
                </div>
                <form  id="form" url='/forms' >
                <div class="modal-body content_inputs_create_event_modal">

                        <div class="row">
                            <div class="form-group col-md-7">
                                <label>Estado</label>
                                <select name='estado' id='estado' class="select2_demo_3 form-control">
                                    <option></option>
                                    <option value="1">Cita agendada</option>
                                    <option value="2">agendar otra cita</option>
                                    <option value="3">solicita cotización</option>
                                    <option value="4">cotización presentada</option>
                                    <option value="5">negocio ganado</option>
                                    <option value="6">negocio perdido</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7"><label>Agendar Cita</label></div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 form-group">
                                <label>Fecha</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="fecha" id="fecha" class="form-control">
                                </div>
                            </div>
                            <div id='dateEndEdit ' class="col-md-6 form-group">
                                <label>Hora</label>
                                <div class="input-group clockpicker">
                                     <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    <select name='hora' id='hora' class="select2_demo_3 form-control">
                                        <option></option>
                                        <option value="1">9-10 AM</option>
                                        <option value="2">2-4 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=" row form-group col-md-12">
                            <label>Observación</label>
                            <textarea id = 'observacion'  class="form-control input-sm" name="observacion"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button id="close_modal" type="button" class="btn btn-warning">Cerrar</button>
                    <button class="btn btn-success" type="submit">Actualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--FIN MODAL ACTUALIZAR PROSPECTO EVENTO -->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Detalle Prospecto</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('prospectos') }}">Prospectos</a>
                </li>
                <li class="active">
                    <strong>Detalles del Prospecto</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
              <div class="row  border-bottom white-bg dashboard-header">
                  <div class="row">
                      <div class="panel panel-success">
                          <div class="panel-heading">
                              Estado Prospecto
                          </div>
                          <div class="panel-body">
                              <div class="col-lg-4">
                                  <h3>Oportunidad: Impresión</h3>
                                  <h3>Estado Actual: <strong class="estado_strong">@php echo $estado; @endphp</strong></h3>
                              </div>
                              <div class="col-lg-4">
                                  <h3><strong>Agenda Actual</strong></h3>
                                  <h3>Fecha: <strong class="agenda_strong"></strong></h3>
                              </div>
                            <div class="col-lg-12">
                              <div class="table-responsive">
                                  <br>
                                  <button id='crear' class="btn btn-success " type="button"><i class="fa fa-plus"></i>&nbsp;Crear</button>
                                  <br><br>
                                  <table id="tblFolicular" class="table table-striped table-bordered table-hover dataTables-example" >
                                      <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Estado</th>
                                                <th>Fecha Actualizacion</th>
                                                <th>Agenda</th>
                                                <th>Observacion</th>
                                            </tr>
                                      </thead>
                                      <tbody></tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
  <!-- datepicker language-->
  <script src="{{ asset('js/plugins/datapicker/datepicker-es.js') }}" ></script>
  <!--sweet-->
  <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            var id_prospecto  = '{{$id_prospecto}}';
            console.log('este es el id '+id_prospecto);
            $('.input-group.date').datepicker({

                dateFormat: "dd/mm/yy",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                language:'es'

            });
            function estado(){
                var route = '{{route('estado_prospecto')}}' + '/' + id_prospecto;
                $.ajax({
                    url: route,
                    type: 'GET',
                    beforeSend: function () {
                    },
                    success: function (response, xhr, request) {
                        console.log(response.msg);
                        $(".estado_strong").html(response.msg.estado.nombre);
                        var agenda = response.msg.trazabilidad.fecha + ' '+response.msg.trazabilidad.hora;
                        $(".agenda_strong").html(agenda);

                    },
                    error: function (response, xhr, request) {
                        if (request.status === 422 && xhr === 'error') {
                        }
                    }
                });
            }
            estado();

            var tblPlanillas = $('#tblFolicular').DataTable({
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
                'ajax': "{{ route('trazabilidad_tabla')}}"+'/'+id_prospecto,
                'columns' : [
                    {data: 'DT_Row_Index'},
                    {data: 'estado.nombre'},
                    {data: 'updated_at'},
                    {data: function(data){
                        if(data.fecha == ''){
                            return 'no asignada';
                        }else{
                            return data.fecha+" "+data.hora;
                        }
                    }},
                    {data: 'observacion'},
                ]
            });
            $('#crear').on('click',function(){
                $('#modal_acualizar').show();
            });
            $('#close_modal').on('click',function(){
                $('#modal_acualizar').hide();
            });
            var create_agregar = function () {
                return {
                        init: function () {
                            var route = '{{route('editar_prospecto')}}' ;
                            var typeAjax = 'POST';
                            var async = async || false;
                            var formDatas = new FormData();
                            formDatas.append('id_prospecto',id_prospecto);
                            formDatas.append('estado',$('#estado').val());
                            formDatas.append('hora',$('#hora option:selected').text());
                            formDatas.append('fecha',$('#fecha').val());
                            formDatas.append('observacion',$('#observacion').val());

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
                                    var res =  (response.msg);
                                    console.log(res);
                                    tblPlanillas.ajax.reload();
                                    $('#estado').val(0);
                                    $('#observacion').val('');
                                    $('#fecha').val('');
                                    $('#hora').val(0);
                                    $('#modal_acualizar').hide();
                                    estado();
                                    swal({
                                        title: "Cambio de estado",
                                        text: "se ha enviado un correo al auspiciador,notificando la acción!",
                                        type: "success"
                                    });

                                },
                                error: function (response, xhr, request) {
                                }
                            });
                         }
                }
              }
            var form_report =$('#form') ;
            var rules_form_report = {
               estado: {
                   required: true
               },
               fecha: {
                   required: true
               },
               hora: {
                   required: true
               },
               observacion: {
                   required: true
               }
           };
            var messages_report = {
               estado: {
                   required: "Campo Requerido"
               },
               fecha: {
                   required: "Campo Requerido"
               },
               hora: {
                   required: "Campo Requerido"
               },
               observacion: {
                   required: "Campo Requerido"
               }
             };
            FormValidationMd.init(form_report, rules_form_report, messages_report, create_agregar());

        });
    </script>
@endsection
