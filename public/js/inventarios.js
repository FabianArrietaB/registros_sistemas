$(document).ready(function(){
    $('#tblproductos').load('inventarios/tblproductos.php');
    tblproductos();
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

function tblproductos(){
    $.ajax({
        url : "../controllers/inventarios/stock.php",
        type : 'GET',
        dataType: 'json',
        success: function (data) {
            //console.log(data);
            let tbl = '';
            data.forEach((item, index) => {
                tbl += `
                    <tr class="bg-white border-b">
                        <td style="width: 10%" class="text-center">${++index}</td>
                        <td style="width: 10%" class="text-center">${item.INV_REFER}</td>
                        <td class="text-center" style="width: 10%" >${item.INV_NOMBRE}</td>
                        <td class="text-center" style="width: 10%" >${item.INV_CODIGO}</td>
                    </tr>
                `
            });
            document.getElementById('fplprodcutos').innerHTML = tbl
        }
    });
}

function importar() {
    var excel = $("#files").val();
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
        url : "../controllers/inventarios/importar.php",
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