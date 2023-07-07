$(document).ready(function(){
    $('#tablapresupuesto').load('presupuesto/tablapresupuestos.php');
});

function detallecompras(date){
    $('#conte-modal-compras').load('presupuesto/reportecompras.php?date='+date, function(){
        $('#repcompras').modal("show");
        $('.modal-backdrop').remove()
    });
}

function agregarpresupuesto(){
    $.ajax({
        type: "POST",
        data: $('#frmpresupuesto').serialize(),
        url: "../controllers/historial/addpresupuesto.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#tablapresupuesto').load('presupuesto/tablapresupuestos.php');
                $('#frmpresupuesto')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Presupuesto Agregado Exitosamente',
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

