
function create_new_local(tableLocs){
  console.log('slect '+$("#departmentSelectNewLocal option:selected").text());
    tableLocs.row.add( [
        '<input id ="-1"  type="checkbox" name="chkLocal[' + $('#tblLocals tbody tr').length * -1 + ']">',
        $('#txtNewLocalName').val()+'<input type="hidden" name="txtLocalName[' + $('#tblLocals tbody tr').length * -1 + ']" value="' + $('#txtNewLocalName').val() + '">',
        $("#municipalitySelectNewLocal option:selected").text()+'<input type="hidden" name="txtLocalCity[' + $('#tblLocals tbody tr').length * -1 + ']" value="' + $("#municipalitySelectNewLocal option:selected").text() + '" id ="'+$("#municipalitySelectNewLocal option:selected").val()+'" >',
        $("#departmentSelectNewLocal option:selected").text()+'<input type="hidden" name="txtLocalDepartment[' + $('#tblLocals tbody tr').length * -1 + ']" value="' + $("#departmentSelectNewLocal option:selected").text() + '" id = "'+$("#departmentSelectNewLocal option:selected").val()+'">',
        $('#txtNewLocalPhone').val()+'<input type="hidden" name="txtLocalPhone[' + $('#tblLocals tbody tr').length * -1 + ']" value="' + $('#txtNewLocalPhone').val() + '">',
        $('#txtNewLocalEmail').val()+'<input type="hidden" name="txtLocalEmail[' + $('#tblLocals tbody tr').length * -1 + ']" value="' + $('#txtNewLocalEmail').val() + '">',
        $('#txtNewLocalContact').val()+'<input type="hidden" name="txtLocalContact[' + $('#tblLocals tbody tr').length * -1 + ']" value="' + $('#txtNewLocalContact').val() + '">'
    ] ).draw();

    $('#txtNewLocalName, #txtNewLocalCity, #txtNewLocalDepartment, #txtNewLocalPhone, #txtNewLocalEmail, #txtNewLocalContact').val('');

}
