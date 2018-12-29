var objectOtherLocal = [];
function init_modal_inputs(){

    $('#other_event input').val('');
    $('#checkSiOther')[0].checked = true;
    $('#checkNoOther')[0].checked = false;
    $('#dateEndOther').hide();
    $('#clockInicioOther').hide();
    $('#option_edit_event_cerrar_other').show();
    $('#end_other_local_event').hide();
    $('#other_event').show();
    $("#other_event .pruebaSelect2").select2({
        placeholder: "Seleccione una opción",
        allowClear: true
    });
    $("#selectEventsModalOther").select2("val", 1);
    $("#departmentSelectOther").select2("val", []);
    $('#municipalitySelectOther').select2("val", "");
}
function null_date_event2(){
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
function incorrect_dates2() {
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
function init_modal_edit_event() {
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
    $('#other_event_edit').show();
    //content_input_date
    /*
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
    }*/
}
$('#tbl_employee_all_other').hide();
//inputs event -> "otro"(selected) content
$('#description_event_other_content').hide();
$('#txt_other_event_other').val('');
$('#selectEventsModalOther').on('change', function (){
    if(($(this).val())==8){
        $('#description_event_other_content').show();
    }else{
        $('#description_event_other_content').hide();
        $('#txt_other_event_other').val('');
    }
});
//end content other event select
//inputs data other employee
$('#content_data_other_employee').hide();
$('#other_employee').on('click',function (e) {
    $('#other_employee').hide();
    $('#content_all_employee_other').hide();
    $('#content_data_other_employee').show();
    $('#tbl_employee_all_other').show();
    $('#txtNameOther,#txtEmailOther,#txtCellOther').val('');
});
$('#tbl_employee_all_other').on('click',function (e) {
    $('#other_employee').show();
    $('#content_all_employee_other').show();
    $('#content_data_other_employee').hide();
    $('#tbl_employee_all_other').hide();
});
//init inputs dataTime
$('#checkSiOther')[0].checked = true;
$('#checkNoOther')[0].checked = false;
$('#dateEndOther').hide();
$('#clockInicioOther').hide();
$('#txtEventoDateEndOther,#textClockFinOther,#txtClockIncioOther').val('');
//change dataTime inputs
$('#checkSiOther').change(function() {
    if(this.checked) {
        $('#dateEndOther').hide();
        $('#clockInicioOther').hide();
        $(this)[0].checked = true;
        $('#checkNoOther')[0].checked = false;
        $('#txtEventoDateEndOther,#textClockFinOther,#txtClockIncioOther').val('');
    }
});
$('#checkNoOther').change(function() {
    if(this.checked) {
        $('#dateEndOther').show();
        $('#clockInicioOther').show();
        $(this)[0].checked = true;
        $('#checkSiOther')[0].checked = false;
    }
});

$('#asignarOther').on('click',function(){
    $('#asignarOther').hide();
    $('#removerOther').show();
    $('#tblEmpleadosAddDivOther').show();
    $('#tblEmpleadosEditDivOther').hide();
    $('#contentEditOtherEmployee').hide();

});
$('#removerOther').on('click',function(){
    $('#asignarOther').show();
    $('#removerOther').hide();
    $('#tblEmpleadosAddDivOther').hide();
    $('#tblEmpleadosEditDivOther').show();
    $('#contentEditOtherEmployee').hide();
});
$('#other_employee_edit2').on('click',function () {
    $('#contentEditOtherEmployee').show();
    $('#tblEmpleadosAddDivOther').hide();
    $('#tblEmpleadosEditDivOther').hide();
    $('#txtNameOtherEdit,#txtEmailOtherEdit,#txtCellOtherEdit').val('');
});
$('#option_edit_event_cerrar_other').on('click',function(){
    $('#other_event').hide();
});

$('#tbl_employee_all_other_edit').hide();
//inputs event -> "otro"(selected) content
$('#description_event_other_content_edit').hide();
$('#txt_other_event_other_edit').val('');
$('#selectEventsModalEditOther').on('change', function (){
    if(($(this).val())==8){
        $('#description_event_other_content_edit').show();
    }else{
        $('#description_event_other_content_edit').hide();
        $('#txt_other_event_other_edit').val('');
    }
});
$('#checkSiEditOther')[0].checked = true;
$('#checkNoEditOther')[0].checked = false;
$('#dateEndOtherEdit').hide();
$('#clockInicioOtherEdit').hide();
$('#txtEventoDateEndOtherEdit,#textClockFinOtherEdit,#txtClockIncioOtherEdit').val('');
//change dataTime inputs
$('#checkSiEditOther').change(function() {
    if(this.checked) {
        $('#dateEndOtherEdit').hide();
        $('#clockInicioOtherEdit').hide();
        $(this)[0].checked = true;
        $('#checkNoEditOther')[0].checked = false;
        $('#txtEventoDateEndEditOther,#textClockFinEditOther,#txtClockIncioEditOther').val('');
    }
});
$('#checkNoEditOther').change(function() {
    if(this.checked) {
        $('#dateEndOtherEdit').show();
        $('#clockInicioOtherEdit').show();
        $(this)[0].checked = true;
        $('#checkSiEditOther')[0].checked = false;
    }
});

