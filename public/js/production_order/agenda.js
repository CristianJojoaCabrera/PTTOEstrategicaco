var listEmployees,guardaEventos,list_assigned_employees,list_without_assigned_employees ,data_agenda_id;
var routeNumAgenda;
var table ,tableEdit,tableAdd,tableEditEmployee;
var tableEditOther , tableAddOther ,tableEditEmployeeOther;
var return_num_agenda;
var numAgendaGestionEvento;
var numArrayOBjectAllData = 0 ,indexNumAgenda = 0;
var indexOtherLocal = 0;
var objectEmpleados = [],objecDataEventsLocal = [];
var actionEdit = false;

function init_tbl_all_employees() {
    table = $('#tblEmpleados').DataTable({
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
        'ajax': listEmployees,
        'columns' : [
            {data: 'name'},
            {data: 'email'},
            {data: 'cell_phone'},
            {
                defaultContent:
                    '<div class="align-content-center"><a title="" href="javascript:;" class="btn btn-warning asignar"><i class="glyphicon glyphicon-pencil"></i>Asignar</a>',
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
}
function init_tbl_all_employees_edit() {
    tableEditEmployee = $('#tblEmpleadosEditEmployee').DataTable({
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
        'ajax': listEmployees,
        'columns' : [
            {data: 'name'},
            {data: 'email'},
            {data: 'cell_phone'},
            {
                defaultContent:
                    '<div class="align-content-center"><a title="" href="javascript:;" class="btn btn-warning asing_edit_employee_enabled"><i class="glyphicon glyphicon-pencil"></i>Asignar</a>',
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

}
function init_tbls_add_remove_employees_edit(){
    tableAdd =
        $('#tblEmpleadosAdd').DataTable({
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
    tableEdit = $('#tblEmpleadosEdit').DataTable({
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
                "first": "Primerosss",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
}
function init_tbls_add_remove_employees_edit_other(){
    tableAddOther =
        $('#tblEmpleadosAddOther').DataTable({
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
    tableEditOther =
        $('#tblEmpleadosEditOther').DataTable({
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
                "first": "Primerosss",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
    tableEditEmployeeOther = $('#tblOtherEmployeeEditOther').DataTable({
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
        'ajax': listEmployees,
        'columns' : [
            {data: 'name'},
            {data: 'email'},
            {data: 'cell_phone'},
            {
                defaultContent:
                    '<div class="align-content-center"><a title="" href="javascript:;" class="btn btn-warning asing_edit_employee_enabled"><i class="glyphicon glyphicon-pencil"></i>Asignar</a>',
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
}
function list_data_locals_checked(tableLocsChecked,objectEvents,objecDataEventsLocal){
    var buttonAction =
        '<div class="external-event create_event_local_other" data-local_id = 0 style= "text-align:center ; background-color:rgb(247, 165, 74) ; color:white" >' +
        'Asignar <span class="fa fa-calendar-o"></span>' +
        '</div>';
    tableLocsChecked.row.add( [
        'Otro',
        buttonAction
    ] ).draw();

    $.each($('#tblLocals tbody tr'), function() {
        if ($(this).children('td').children('input:checkbox').prop("checked")) {
           var nameLocal = $(this).children('td:eq(1)').children('input').prop("value");
           var cityLocal = $(this).children('td:eq(2)').children('input').prop("value");
           var departmentLocal = $(this).children('td:eq(3)').children('input').prop("value");
           var cellLocal = $(this).children('td:eq(4)').children('input').prop("value");
           var emailLocal = $(this).children('td:eq(5)').children('input').prop("value");
           var contactLocal = $(this).children('td:eq(6)').children('input').prop("value");
           var idLocal = $(this).children('td').children('input:checkbox').prop("id");
           buttonAction =
                '<div class="external-event create_event_local" data-local_id = "'+idLocal+'" style= "text-align:center ; background-color:rgb(247, 165, 74) ; color:white" >' +
                'Asignar <span class="fa fa-calendar-o"></span>' +
                '</div>';
            tableLocsChecked.row.add( [
                nameLocal,
                buttonAction
            ] ).draw();
            objecDataEventsLocal.push({
                idLocal : idLocal,
                events : objectEvents,
                nameLocal : nameLocal,
                cityLocal : cityLocal,
                departmentLocal : departmentLocal,
                cellLocal : cellLocal,
                emailLocal : emailLocal,
                contactLocal : contactLocal
            });

        }
    });

}
function null_date_event() {
    swal(
        {
            title: "Campos Incompletos",
            text: "Debe Completar los campos de la fecha para asignar el empleado!",
            type: "warning",
            confirmButtonColor: '#1ab394',
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
}
function incorrect_dates(){
    swal(
        {
            title: "Fechas Incorrectas",
            text: "Debería ser la fecha inicial menor a la fecha final!",
            type: "warning",
            confirmButtonColor: '#1ab394',
            confirmButtonText: "Ok",
            closeOnConfirm: true
        });
}
function agenda_number_calendar_ajax(){

    var typeAjax = 'POST';
    var async = async || false;
    var formDatas = new FormData();
    $.ajax({
        url: routeNumAgenda,
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
            return_num_agenda = response;
            table.ajax.reload();
        },
        error: function (response, xhr, request) {
        }
    });

}
function eventMousOver2(event, jsEvent, view) {

    var start = (event.start.format("hh:mm A"));
    var back=event.color;
    if(event.end){
        var end = event.end.format("hh:mm A");
    }else{var end="No definido";
    }
    if(event.allDay){
        var allDay = "Si";
    }else{var allDay="No";
    }
    var tooltip =
        '<div class="tooltipevent" style="width:200px;height:100px;color:white;background:'+back+';position:absolute;z-index:1;">'
        +'<br>'+
        '- Cliente: '+event.client+'<br>'+
        '- Finca: '+event.farm+'<br>'+
        '- Observación: '+ event.observation +'' +
        '</div>';
    $("body").append(tooltip);
    $(this).mouseover(function(e) {
        $(this).css('z-index', 10000);
        $('.tooltipevent').fadeIn('500');
        $('.tooltipevent').fadeTo('10', 1.9);
    }).mousemove(function(e) {
        $('.tooltipevent').css('top', e.pageY + 10);
        $('.tooltipevent').css('left', e.pageX + 20);
    });

}
function eventClick2(event, jsEvent, view, objectAllDataPreOrden,objectOtherLocal){

    $("#content_head_data_calendar input,select").prop('disabled',true);
    var editOtherLocal = false;
    indexOtherLocal = 0;
    var disabledClass = 'di';
    objectEmpleados = [];
    $.each(objectOtherLocal, function( key, value ){
        if(editOtherLocal == false){
            if(value.numAgenda == event.numAgenda){
                numAgendaGestionEvento = value.numAgenda ;
                objectEmpleados = value.employees;
                editOtherLocal = true;
            }else{
                indexOtherLocal++;
            }
        }
    });

    if(editOtherLocal){

        $('#end_other_local_event_edit').hide();
        $('#option_edit_event_cerrar_other_edit').show();
        $('.content_option_view_employee').show();
        $('#tblEmpleadosEditDivOther').show();
        $('#tblEmpleadosAddDivOther').hide();
        $('#contentEditOtherEmployee').hide();
        $('#other_employee_edit2').show();
        $('#content_all_employee_other_edit').hide();
        $('#content_data_other_employee_edit').show();
        $('#asignarOther').show();
        $('#removerOther').hide();
        $("#content_head_data_calendar input,select").prop('disabled',false);
        $("#txtEventoDateStartEditOther").prop('disabled',false);
        $(".content_input_date input").prop('disabled',true);
        $(".content_check_date input").prop('disabled',true);
        //content_input_date
        if ( $.fn.dataTable.isDataTable( '#tblEmpleadosEditOther' ) ) {
            tableEditOther.destroy();
            tableEditOther =
                $('#tblEmpleadosEditOther').DataTable({
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
                            "first": "Primerosss",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    'proccesing':true,
                    'serverSide':true,
                    'ajax': list_assigned_employees+'/'+event.numAgenda+'/'+disabledClass,
                    'columns' : [
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'cell'},
                        {data: 'action'}

                    ]
                });
        }
        else{
            tableEditOther =
                $('#tblEmpleadosEditOther').DataTable({
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
                            "first": "Primerosss",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    'proccesing':true,
                    'serverSide':true,
                    'ajax': list_assigned_employees+'/'+event.numAgenda+'/'+disabledClass,
                    'columns' : [
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'cell'},
                        {data: 'action'}
                    ]
                });
        }
        if ( $.fn.dataTable.isDataTable( '#tblEmpleadosAddOther' ) ) {
            tableAddOther.destroy();
            tableAddOther =
                $('#tblEmpleadosAddOther').DataTable({
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
                            "first": "Primerosss",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    'proccesing':true,
                    'serverSide':true,
                    'ajax': list_without_assigned_employees+'/'+event.numAgenda,
                    'columns' : [
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'cell_phone'},
                        {
                            defaultContent:
                                '<div class="align-content-center"><a title="" href="javascript:;" class="btn btn-primary asignarEmpleado"><i class="glyphicon glyphicon-plus"></i></a>',
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
        }
        else{
            tableAddOther =
                $('#tblEmpleadosAddOther').DataTable({
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
                            "first": "Primerosss",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    'proccesing':true,
                    'serverSide':true,
                    'ajax': list_without_assigned_employees+'/'+event.numAgenda,
                    'columns' : [
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'cell_phone'},
                        {
                            defaultContent:
                                '<div class="align-content-center"><a title="" href="javascript:;" class="btn btn-primary asignarEmpleado"><i class="glyphicon glyphicon-plus"></i></a>',
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
        }

        var routeDataAgenda = data_agenda_id ;
        var typeAjax = 'POST';
        var async = async || false;
        var formDatas = new FormData();
        formDatas.append('id_calendar',event.id);
        $.ajax({
            url: routeDataAgenda,
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
                var res =  JSON.parse(response);
                if(res[0].all_day == 0){
                    $('#clockInicioEditOther').show();
                    $('#checkNoEditOther')[0].checked = true;
                    $('#checkSiEditOther')[0].checked = false;
                    var formateDateEnd = moment(res[0].end_date, 'YYYY.MM.DD').format('YYYY/MM/DD');
                    var timeEnd = moment(res[0].end_date, "'YYYY.MM.DD hmm").format("hh:mm A");
                    var datesEnd = new Date(formateDateEnd);
                    var diaEnd = datesEnd.getDate(),
                        mesEnd = datesEnd.getMonth()+1,
                        yearEnd = datesEnd.getFullYear();
                    if (mesEnd < 10) mesEnd = '0' +  mesEnd;
                    if (diaEnd < 10) diaEnd = '0' + diaEnd;
                    formateDateEnd = mesEnd+'/'+diaEnd+'/'+yearEnd;
                    $('#txtEventoDateEndEditOther').val(formateDateEnd);
                    $('#textClockFinEditOther').val(timeEnd);
                    var time = moment(res[0].start_date, "'YYYY.MM.DD hmm").format("hh:mm A");
                    $('#clockInicioOtherEdit').show();
                    $('#dateEndOtherEdit').show();

                }else{
                    $('#dateEndOtherEdit').hide();
                    $('#clockInicioOtherEdit').hide();
                    $('#checkSiEditOther')[0].checked = true;
                    $('#checkNoEditOther')[0].checked = false;
                    $('#clockInicioEditOther').hide();
                    $('#dateEndEditOther').hide();
                    var time = '';

                }
                var formateDate = moment(res[0].start_date, 'YYYY.MM.DD').format('YYYY/MM/DD');
                var dateStart = new Date(formateDate);
                var diaStart = dateStart.getDate(),
                    mesStart = dateStart.getMonth()+1,
                    yearStart = dateStart.getFullYear();
                if (mesStart < 10) mesStart = '0' +  mesStart;
                if (diaStart < 10) diaStart = '0' + diaStart;
                formateDate = mesStart+'/'+diaStart+'/'+yearStart;
                if( res[0].event_id == 8){
                    $('#selectEventsModalEditOther').val(8);
                    $('#description_event_other_content_edit').show();
                    $('#txt_other_event_other_edit').show();
                    $('#lbl_other_event_other_edit').show();
                    $('#txt_other_event_other_edit').prop('disabled',false);
                    $('#txt_other_event_other_edit').val('');
                    $('#txt_other_event_other_edit').val(res[0].description_other_event);
                }
                $('#txtLocalEditOther').val(res[0].name_local);
                $('#txtEventoDateStartEditOther').val(formateDate);
                $('#txtClockIncioEditOther').val(time);
                $("#departmentSelectEditOther").val(res[0].department_id);
                $("#municipalitySelectEditOther").val(res[0].municipality_id);
                $('#txtDireccionEditOther').val(res[0].address);
                $('#txtObservacionEditOther').val(res[0].observation);

                $('#other_event_edit').toggle();
            },
            error: function (response, xhr, request) {
            }
        });
        //end other local
    }
    else{

        numArrayOBjectAllData = 0;
        indexNumAgenda = 0;
        numAgendaGestionEvento = event.numAgenda;
        var editEnabled = false;
        $('#txtLocalEdit').val(event.farm);
        $('#selectEventsModalEdit').empty();
        $.each(objectAllDataPreOrden, function( key, value ) {
            indexNumAgenda = 0;
            $.each(value.numAgenda, function( key2, value2 ) {
                if( value2.numAgenda == numAgendaGestionEvento){
                    objectEmpleados = [];
                    objectEmpleados = value.summary[indexNumAgenda][0].employees ;
                    editEnabled = true;
                    $(objectAllDataPreOrden[numArrayOBjectAllData].events).each(function (key3, value3) {
                        var newOption = new Option(value3.name, value3.id, true, true);
                        $('#selectEventsModalEdit').append(newOption).trigger('change');
                    });
                    var id_event_object = value.summary[indexNumAgenda][0].typeEvent;
                    if( id_event_object == 8 ){
                        $('#txt_other_event_edit').show();
                        $('#lbl_other_event_edit').show();
                        $('#txt_other_event_edit').prop('disabled',false);
                        $('#txt_other_event_edit').val('');
                        $("#selectEventsModalEdit").val(id_event_object);
                    }else{
                        var newOption = new Option(value.summary[indexNumAgenda][0].nameEvent, id_event_object, true, true);
                        $('#selectEventsModalEdit').append(newOption).trigger('change');
                        $("#selectEventsModalEdit").val(id_event_object);
                        objectAllDataPreOrden[numArrayOBjectAllData].events.push({
                            id : parseInt(value.summary[indexNumAgenda][0].typeEvent),
                            name: value.summary[indexNumAgenda][0].nameEvent
                        });
                        $('#lbl_other_event_edit').hide();
                        $('#txt_other_event_edit').hide();
                        $('#txt_other_event_edit').val('');
                    }

                }else{
                    if(editEnabled == false){
                        indexNumAgenda++;
                    }
                }
            });
            if(editEnabled == false){
                numArrayOBjectAllData++;
            }
        });
        $('#remover').hide();
        $('#enable_edit_date').show();
        $('#content_all_employee').hide();
        $('.editarEventoButton').hide();
        $('.content_option_edit_event_cerrar').show();
        $('#lbl_other_event_edit').hide();
        $('#txt_other_event_edit').hide();
        $('#txt_other_event_edit').val('');

        if(editEnabled){

            $("#selectEventsModalEdit").prop('disabled',false);
            $("#enable_edit_date").attr('disabled',false);
            $(".content_option_view_employee").show();
            $('#content_tbl_gestion').show();
            $(".content_option_edit_event").show();
            $(".content_option_edit_salir_event").hide();
            $(".editarEventoButton").hide();
            $("#tblEmpleadosAddDiv").hide();
            $('#departmentSelectEdit,#municipalitySelectEdit,#txtDireccionEdit,#txtObservacionEdit').prop('disabled',false);

        }
        else{
            var nameEventEdit;
            switch (event.event_id){
                case 1:
                    nameEventEdit = 'Evaluación de Receptoras';
                    break;
                case 2:
                    nameEventEdit = 'Aspiración Folicular';
                    break;
                case 4:
                    nameEventEdit = 'Transferencia de Embreión';
                    break;
                case 8:
                    nameEventEdit = 'Otro';
                    break;

            }
            var newOption = new Option(nameEventEdit,event.event_id, true, true);
            $('#selectEventsModalEdit').append(newOption).trigger('change');
            $("#selectEventsModalEdit").val(event.event_id);
            $("#enable_edit_date").attr('disabled',true);
            $('#txt_other_event_edit').prop('disabled',true);
            $("#content_head_data_calendar input,select").prop('disabled',true);
            $(".content_option_view_employee").hide();
            $("#tblEmpleadosAddDiv").hide();
            $(".remover").attr('disabled',true);
            $(".content_option_edit_event").hide();
            $(".content_option_edit_event_cerrar").hide();
            $(".content_option_edit_salir_event").show();
            disabledClass = 'disabled';

        }
        if ( $.fn.dataTable.isDataTable( '#tblEmpleadosEdit' ) ) {
            tableEdit.destroy();
            tableEdit =
                $('#tblEmpleadosEdit').DataTable({
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
                            "first": "Primerosss",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    'proccesing':true,
                    'serverSide':true,
                    'ajax': list_assigned_employees+'/'+event.numAgenda+'/'+disabledClass,
                    'columns' : [
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'cell'},
                        {data: 'action'}

                    ]
                });
        }
        else{
            tableEdit =
                $('#tblEmpleadosEdit').DataTable({
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
                            "first": "Primerosss",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    'proccesing':true,
                    'serverSide':true,
                    'ajax': list_assigned_employees+'/'+event.numAgenda+'/'+disabledClass,
                    'columns' : [
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'cell'},
                        {data: 'action'}
                    ]
                });
        }
        if ( $.fn.dataTable.isDataTable( '#tblEmpleadosAdd' ) ) {
            tableAdd.destroy();
            tableAdd =
                $('#tblEmpleadosAdd').DataTable({
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
                            "first": "Primerosss",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    'proccesing':true,
                    'serverSide':true,
                    'ajax': list_without_assigned_employees+'/'+event.numAgenda,
                    'columns' : [
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'cell_phone'},
                        {
                            defaultContent:
                                '<div class="align-content-center"><a title="" href="javascript:;" class="btn btn-primary asignarEmpleado"><i class="glyphicon glyphicon-plus"></i></a>',
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
        }
        else{
            tableAdd =
                $('#tblEmpleadosAdd').DataTable({
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
                            "first": "Primerosss",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    'proccesing':true,
                    'serverSide':true,
                    'ajax': list_without_assigned_employees+'/'+event.numAgenda,
                    'columns' : [
                        {data: 'name'},
                        {data: 'email'},
                        {data: 'cell_phone'},
                        {
                            defaultContent:
                                '<div class="align-content-center"><a title="" href="javascript:;" class="btn btn-primary asignarEmpleado"><i class="glyphicon glyphicon-plus"></i></a>',
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
        }


        var routeDataAgenda = data_agenda_id ;
        var typeAjax = 'POST';
        var async = async || false;
        var formDatas = new FormData();
        formDatas.append('id_calendar',event.id);
        $.ajax({
            url: routeDataAgenda,
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
                var res =  JSON.parse(response);
                if(res[0].all_day == 0){
                    $('#clockInicioEdit').show();
                    $('#checkNoEdit')[0].checked = true;
                    var formateDateEnd = moment(res[0].end_date, 'YYYY.MM.DD').format('YYYY/MM/DD');
                    var timeEnd = moment(res[0].end_date, "'YYYY.MM.DD hmm").format("hh:mm A");

                    var datesEnd = new Date(formateDateEnd);
                    var diaEnd = datesEnd.getDate(),
                        mesEnd = datesEnd.getMonth()+1,
                        yearEnd = datesEnd.getFullYear();
                    if (mesEnd < 10) mesEnd = '0' +  mesEnd;
                    if (diaEnd < 10) diaEnd = '0' + diaEnd;
                    formateDateEnd = mesEnd+'/'+diaEnd+'/'+yearEnd;
                    $('#txtEventoDateEndEdit').val(formateDateEnd);
                    $('#textClockFinEdit').val(timeEnd);
                    var time = moment(res[0].start_date, "'YYYY.MM.DD hmm").format("hh:mm A");
                }else{

                    $('#checkSiEdit')[0].checked = true;
                    $('#clockInicioEdit').hide();
                    $('#dateEndEdit').hide();
                    var time = '';

                }
                var formateDate = moment(res[0].start_date, 'YYYY.MM.DD').format('YYYY/MM/DD');
                var dateStart = new Date(formateDate);
                var diaStart = dateStart.getDate(),
                    mesStart = dateStart.getMonth()+1,
                    yearStart = dateStart.getFullYear();
                if (mesStart < 10) mesStart = '0' +  mesStart;
                if (diaStart < 10) diaStart = '0' + diaStart;
                formateDate = mesStart+'/'+diaStart+'/'+yearStart;
                if( res[0].event_id == 8){
                    $('#txt_other_event_edit').show();
                    $('#lbl_other_event_edit').show();
                    $('#txt_other_event_edit').prop('disabled',false);
                    $('#txt_other_event_edit').val('');
                    $('#txt_other_event_edit').val(res[0].description_other_event);

                }
                $('#txtEventoDateStartEdit').val(formateDate);
                $('#txtClockIncioEdit').val(time);
                $("#departmentSelectEdit").val(res[0].department_id);
                $("#municipalitySelectEdit").val(res[0].municipality_id);
                $('#txtDireccionEdit').val(res[0].address);
                $('#txtObservacionEdit').val(res[0].observation);

                $('#editarEvento').show();
            },
            error: function (response, xhr, request) {
            }
        });
        $('#content_option_view_employee').show();
        $('#asignar').show();
        $('#tblEmpleadosEditDiv').show();
        $('#content_tbl_gestion').show();

    }

}

$('#dataGenetica').hide();
$('#dateEnd').hide();
$('#clockInicio').hide();
$('#checkSi')[0].checked = true;
$('#checkSi').change(function() {
    if(this.checked) {
        $('#dateEnd').hide();
        $('#clockInicio').hide();
        $(this)[0].checked = true;
        $('#checkNo')[0].checked = false;
        $('#txtEventoDateEnd,#textClockFin,#txtClockIncio').val('');
    }
});
$('#checkNo').change(function() {
    if(this.checked) {
        $('#dateEnd').show();
        $('#clockInicio').show();
        $(this)[0].checked = true;
        $('#checkSi')[0].checked = false;
    }
});

$('.i-checks').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green',

});

$('#close_modal').on('click',function(){
    $('#asignarEvento').hide();
});
$('#selectEventsModal').on('change', function (){
    if(($(this).val())==8){
        $('#txt_other_event').show();
        $('#lbl_other_event').show();
    }else{

        $('#lbl_other_event').hide();
        $('#txt_other_event').hide();
        $('#txt_other_event').val('');
    }

});



$('#checkSiEdit').change(function() {
    if(this.checked) {
        $('#dateEndEdit').hide();
        $('#clockInicioEdit').hide();
        $(this)[0].checked = true;
        $('#checkNoEdit')[0].checked = false;
    }

});
$('#checkNoEdit').change(function() {
    if(this.checked) {
        $('#dateEndEdit').show();
        $('#clockInicioEdit').show();
        $(this)[0].checked = true;
        $('#checkSiEdit')[0].checked = false;
    }

});
$('#asignar').on('click',function(){
    $('#asignar').hide();
    $('#remover').show();
    $('#tblEmpleadosAddDiv').show();
    $('#tblEmpleadosEditDiv').hide();

});
$('#remover').on('click',function(){
    $('#asignar').show();
    $('#remover').hide();
    $('#tblEmpleadosAddDiv').hide();
    $('#tblEmpleadosEditDiv').show();

});
$('#selectEventsModalEdit').on('change', function (){
    if( ($(this).val()) == 8 ){
        $('#txt_other_event_edit').show();
        $('#lbl_other_event_edit').show();
        $('#txt_other_event_edit').prop('disabled',false);
        $('#txt_other_event_edit').val('');
    }else{
        $('#lbl_other_event_edit').hide();
        $('#txt_other_event_edit').hide();
        $('#txt_other_event_edit').val('');
    }
});
