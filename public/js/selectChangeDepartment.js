var listarMunicipioSelect;
$('#departmentSelect').on('change', function () {
    var idDepartamento = $(this).val();
    var routeMunicipio = listarMunicipioSelect + '/' + idDepartamento;
    $.ajax({
        url: routeMunicipio,
        type: 'GET',
        beforeSend: function () {
        },
        success: function (res, xhr, request) {
            if (request.status === 200 && xhr === 'success') {
                res =  JSON.parse(res);
                $('#municipalitySelect').empty();
                $(res).each(function (key, value) {
                    var newOption = new Option(value.nombre, value.id, true, true);
                    $('#municipalitySelect').append(newOption).trigger('change');
                });
            }
        },
        error: function (response, xhr, request) {
            if (request.status === 422 && xhr === 'error') {
            }
        }
    });
});
