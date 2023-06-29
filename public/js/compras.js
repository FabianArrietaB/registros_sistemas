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
            $('#serialu').val(respuesta['serial']);
            $('#numfacu').val(respuesta['numfac']);
            $('#prooveu').val(respuesta['proove']);
            $('#valoru').val(respuesta['valor']);
            $('#detallu').val(respuesta['detall']);
            $('#feccomu').val(respuesta['feccom']);
            $('#fecopeu').val(respuesta['fecope']);
        }
    });
}