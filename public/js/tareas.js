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