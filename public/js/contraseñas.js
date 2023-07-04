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

//FUNCIONES CORREO
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

function agregarcorreo(){
    $.ajax({
        type: "POST",
        data: $('#formcrearcorreo').serialize(),
        url: "../controllers/contraseñas/newcorreo.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#listacorreos').load('contraseñas/correos.php');
                $('#formcrearcorreo')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Correo Agregado Exitosamente',
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
        url: "../controllers/contraseñas/detallecorreo.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idcorreo').val(respuesta['idcorreo']);
            $('#idareau').val(respuesta['idarea']);
            $('#idsedeu').val(respuesta['idsede']);
            $('#correou').val(respuesta['correo']);
            $('#passwordu').val(respuesta['password']);
        }
    });
}

function editarcorreo(){
    $.ajax({
        type: "POST",
        data: $('#formeditarcorreo').serialize(),
        url: "../controllers/contraseñas/editarcorreo.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta);
                $('#listacorreos').load('contraseñas/correos.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Datos Actualizados Exitosamente',
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

//FUNCIONES FOLDER
function agregarfolder(){
    $.ajax({
        type: "POST",
        data: $('#formcrearfolder').serialize(),
        url: "../controllers/contraseñas/newfolder.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta);
                $('#listafolders').load('contraseñas/carpetas.php');
                $('#formcrearfolder')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Carpeta Registrada Exitosamente',
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

function detallefolder(idfolder){
    $.ajax({
        type: "POST",
        data: "idfolder=" + idfolder,
        url: "../controllers/contraseñas/detallefolder.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idfolder').val(respuesta['idfolder']);
            $('#nombreu').val(respuesta['nombre']);
            $('#passwordu').val(respuesta['password']);
        }
    });
}

function editarfolder(){
    $.ajax({
        type: "POST",
        data: $('#formeditarfolder').serialize(),
        url: "../controllers/contraseñas/editarfolder.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta);
                $('#listafolders').load('contraseñas/carpetas.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Datos Actualizados Exitosamente',
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

//FUNCIONES CLAVE
function agregarclave(){
    $.ajax({
        type: "POST",
        data: $('#formcrearclave').serialize(),
        url: "../controllers/contraseñas/newclave.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#listaclaves').load('contraseñas/claves.php');
                $('#formcrearclave')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Clave Registrada Exitosamente',
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

function detalleclave(idclave){
    $.ajax({
        type: "POST",
        data: "idclave=" + idclave,
        url: "../controllers/contraseñas/detalleclave.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta)
            $('#idclave').val(respuesta['idclave']);
            $('#idtipou').val(respuesta['idtipo']);
            $('#equipou').val(respuesta['equipo']);
            $('#usuariou').val(respuesta['usuario']);
            $('#passwordu').val(respuesta['password']);
            $('#nonwifu').val(respuesta['nonwif']);
            $('#calwifu').val(respuesta['calwif']);
            $('#ipu').val(respuesta['ip']);
            $('#marcau').val(respuesta['marca']);
            $('#modelou').val(respuesta['modelo']);
            $('#patronu').val(respuesta['patron']);
            $('#serialu').val(respuesta['serial']);
        }
    });
}

function editarclave(){
    $.ajax({
        type: "POST",
        data: $('#formeditarclave').serialize(),
        url: "../controllers/contraseñas/editarclave.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#listaclaves').load('contraseñas/claves.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Datos Actualizados Exitosamente',
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