$(document).ready(function(){
    $('#tablacompras').load('compras/listacompras.php');
});

function agregarcompra(){
    $.ajax({
        type: "POST",
        data: $('#frmagrecompra').serialize(),
        url: "../controllers/compras/agregar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#tablacompras').load('compras/listacompras.php');
                $('#frmagrecompra')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Compra Agregada Exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al crear!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
    return false;
}

function detallecompras(idventa){
    $.ajax({
        type: "POST",
        data: "idventa=" + idventa,
        url: "../controllers/compras/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta)
            $('#idventa').val(respuesta['idventa']);
            $('#idsedeu').val(respuesta['idsede']);
            $('#idareau').val(respuesta['idarea']);
            $('#areau').val(respuesta['area']);
            $('#cantidu').val(respuesta['cantid']);
            $('#nomprou').val(respuesta['nompro']);
            $('#marcau').val(respuesta['marca']);
            $('#modelou').val(respuesta['modelo']);
            $('#serialu').val(respuesta['serial']);
            $('#numfacu').val(respuesta['numfac']);
            $('#prooveu').val(respuesta['proove']);
            $('#valoru').val(respuesta['valor']);
			$('#valundu').val(respuesta['valund']);
            $('#detallu').val(respuesta['detall']);
            $('#feccomu').val(respuesta['feccom']);
            $('#fecopeu').val(respuesta['fecope']);
        }
    });
}

function detallefactura(numfac){
    $('#conte-modal-facturas').load('compras/detallefactura.php?numfac='+numfac, function(){
        $('#repfactura').modal("show");
        $('.modal-backdrop').remove()
    });
}

function filtrar() {
    // Declare variables
    var input, filter, table, tr, td, i, j, visible;
    input = document.getElementById("filtro");
    filter = input.value.toUpperCase();
    table = document.getElementById("compras");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        visible = false;
        /* Obtenemos todas las celdas de la fila, no sólo la primera */
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                visible = true;
            }
        }
        if (visible === true) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}