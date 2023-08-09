$(document).ready(function(){
    $('#tablalistatareas').load('tareas/listatareas.php');
});

$(document).ready(function(){
    $('#tablacierreequipos').load('tareas/tablaequipos.php');
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

function detalletarea(idtarea){
    $.ajax({
        type: "POST",
        data: "idtarea=" + idtarea,
        url: "../controllers/tareas/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idtarea').val(respuesta['idtarea']);
            $('#idasignadou').val(respuesta['idasignado']);
            $('#idnivelu').val(respuesta['idnivel']);
            $('#detalleu').val(respuesta['detalle']);
            $('#fecopeu').val(respuesta['fecope']);
            $('#estadou').val(respuesta['estado']);
        }
    });
}

function soluciontarea(){
    $.ajax({
        type: "POST",
        data: $('#frmeditartarea').serialize(),
        url: "../controllers/tareas/editartarea.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta)
                $('#tareaspendientes').load('tareas/tareaspendientes.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Tarea Actualizada',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al Editar!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
    return false;
}

function finalizada(idtarea, estado){
    $.ajax({
        type:"POST",
        data:"idtarea=" + idtarea +"&estado=" + estado,
        url:"../controllers/tareas/finalizada.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta)
                $('#tareaspendientes').load('tareas/tareaspendientes.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Operacion Exitosa',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo realizar la operacion!',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        }
    });
}