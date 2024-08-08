$(document).ready(function(){
    $('#tblprecios').load('inventarios/tblprecios.php');
});

$('input[type="file"]').on('change', function(){
    var ext = $( this ).val().split('.').pop();
    if ($( this ).val() != '') {
    if(ext == "xls" || ext == "xlsx" || ext == "csv"){
    }
    else
    {
        $( this ).val('');
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tipo de Archivo no permitivo, Extension '+ ext + " no es permitida",
            showConfirmButton: false,
            timer: 2500
        });
    }
    }
});

$('#referencia').keypress(function(e) {
    if(e.which == 13) {
        var referencia = $('#referencia').val();
        if(referencia === ""){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes ingresar una referencia',
                showConfirmButton: false,
                timer: 1500
            });
        }
        console.log(referencia)
        $.ajax({
            data : "referencia=" + referencia,
            type : 'GET',
            url : "../controllers/inventarios/precios.php",
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                let tbl = '';
                data.forEach((item, index) => {
                    tbl += `
                        <tr class="bg-white border-b">
                            <td style="width: 10%" class="text-center">${++index}</td>
                            <td style="width: 10%" class="text-center">${item.PRODUCTO}</td>
                            <td class="text-center" style="width: 10%" >${item.LISTA_NOMBRE}</td>
                            <td class="text-center" style="width: 10%" >${item.LISTA_PRECIO}</td>
                        </tr>
                    `
                });
                document.getElementById('fplprecios').innerHTML = tbl
            }
        });
    }
});

function importar() {
    var excel = $("#precios").val();
    if(excel === ""){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se ha seleccionado un archivo',
            showConfirmButton: false,
            timer: 2500
        });
    }
    $.ajax({
        url : "../controllers/inventarios/cargarprecios.php",
        method:     "POST",
        data: new FormData($('#form_file')[0]),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            Swal.fire({
                icon: 'info',
                title: 'Cargando Datos',
                showConfirmButton: false,
                timer: 5000
            });
        },
        success: function (resp){
            Swal.fire({
                icon: 'success',
                title: 'Datos Cargados',
                text: 'Se cargaron ' + resp.productos + " Productos",
                showConfirmButton: false,
                timer: 2000
            });
        }
    });
    return false;
}
