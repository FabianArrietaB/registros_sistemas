$(document).ready(function(){
    $('#tablalistatareas').load('tareas/listatareas.php');
});

$(document).ready(function(){
    $('#pendientesbtn').click(function(){
        ocultar();
        $('#tareaspendientes').load('tareas/tareaspendientes.php');
        $('#tareaspendientes').show();
    });

    $('#finalizadasbtn').click(function(){
        ocultar();
        $('#tareasfinalizadas').load('tareas/tareasfinalizadas.php');
        $('#tareasfinalizadas').show();
    });

});

function ocultar(){
    $('#tareaspendientes').hide();
    $('#tareasfinalizadas').hide();
    return false;
}

function creartarea(){
    $.ajax({
        type: "POST",
        data: $('#frmcreartarea').serialize(),
        url: "../controllers/tareas/creartarea.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta);
                $('#tablalistatareas').load('tareas/listatareas.php');
                $('#frmcreartarea')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Tarea Agregada Exitosamente',
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