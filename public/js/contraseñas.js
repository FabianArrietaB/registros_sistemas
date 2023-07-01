$(document).ready(function(){
    $('#correosbtn').click(function(){
        ocultar();
        $('#listacorreos').load('contraseñas/correos.php');
        $('#listacorreos').show();
    });

    $('#carpetasbtn').click(function(){
        ocultar();
        $('#listafolders').load('contraseñas/carpetas.php');
        $('#listafolders').show();
    });

    $('#clavesbtn').click(function(){
        ocultar();
        $('#listaclaves').load('contraseñas/claves.php');
        $('#listaclaves').show();
    });

});

function ocultar(){
    $('#listacorreos').hide();
    $('#listafolders').hide();
    $('#listaclaves').hide();
    return false;
}

function activarcorreo(idcorreo, estado){
    $.ajax({
        type:"POST",
        data:"idcorreo=" + idcorreo +"&estado=" + estado,
        url:"../controllers/contraseñas/activarcor.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta)
                $('#listacorreos').load('contraseñas/correos.php');
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

function cambiopassword(){
    $.ajax({
        type: "POST",
        data: $('#formcambiocontra').serialize(),
        url: "../controllers/contraseñas/password.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#listacorreos').load('contraseñas/correos.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Contraseña Actualizada Exitosamente',
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

function detallecorreo(idcorreo){
    $.ajax({
        type: "POST",
        data: "idcorreo=" + idcorreo,
        url: "../controllers/contraseñas/detallecontra.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idcorreo').val(respuesta['idcorreo']);
            $('#passwordu').val(respuesta['password']);
        }
    });
}

function detalleclave(idclave){
    $.ajax({
        type: "POST",
        data: "idclave=" + idclave,
        url: "../controllers/contraseñas/detalleclave.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idclave').val(respuesta['idclave']);
            $('#idtipou').val(respuesta['password']);
            $('#equipou').val(respuesta['equipo']);
            $('#usuariou').val(respuesta['usuario']);
            $('#passwordu').val(respuesta['password']);
            $('#nonwifu').val(respuesta['nonwif']);
            $('#calwifu').val(respuesta['calwif']);
            $('#ipu').val(respuesta['ip']);
            $('#modelou').val(respuesta['marca']);
            $('#modelou').val(respuesta['modelo']);
            $('#patronu').val(respuesta['patron']);
            $('#serialu').val(respuesta['serial']);
        }
    });
}