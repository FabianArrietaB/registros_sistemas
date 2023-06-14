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
                console.log(respuesta);
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