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