$(document).ready(function(){
    $('#tablamantenimientos').load('mantenimientos/tablamantenimientos.php');
    $('#tablaequipos').load('mantenimientos/tablaequipos.php');
});

function detalleequipo(idequipo){
    $.ajax({
        type: "POST",
        data: "idequipo=" + idequipo,
        url: "../controllers/mantenimientos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idequipo').val(respuesta['idequipo']);
            $('#idsedeu').val(respuesta['idsede']);
            $('#idareau').val(respuesta['idarea']);
            $('#idtipequu').val(respuesta['idtipequ']);
            $('#marcau').val(respuesta['marca']);
            $('#modelou').val(respuesta['modelo']);
            $('#tipramu').val(respuesta['tipram']);
            $('#ramu').val(respuesta['ram']);
            $('#procesau').val(respuesta['procesa']);
            $('#tipdisu').val(respuesta['tipdis']);
            $('#capdisu').val(respuesta['capdis']);
            $('#graficu').val(respuesta['grafic']);
            $('#serialu').val(respuesta['serial']);
            $('#nomequu').val(respuesta['nomequ']);
            $('#macu').val(respuesta['mac']);
            $('#fechau').val(respuesta['fecha']);
        }
    });
}

function detalleactivo(idequipo){
    $.ajax({
        type: "POST",
        data: "idequipo=" + idequipo,
        url: "../controllers/mantenimientos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idequipo').val(respuesta['idequipo']);
            $('#codactu').val(respuesta['codact']);
        }
    });
}

function crearequipo(){
    $.ajax({
        type: "POST",
        data: $('#frmcrearequipo').serialize(),
        url: "../controllers/mantenimientos/agregar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#tablaequipos').load('mantenimientos/tablaequipos.php');
                $('#frmcrearequipo')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Equipo Agregado Exitosamente',
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

function agregaractivo(){
    $.ajax({
        type: "POST",
        data: $('#frmcodactivo').serialize(),
        url: "../controllers/mantenimientos/activo.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#tablaequipos').load('mantenimientos/tablaequipos.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Codigo Agregado Exitosamente',
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

function editarequipo(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarequipo').serialize(),
        url: "../controllers/mantenimientos/editar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta)
                $('#tablaequipos').load('mantenimientos/tablaequipos.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Equipo Actualizado',
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