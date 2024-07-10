$(document).ready(function(){
    $('#tablamantenimientos').load('mantenimientos/tablamantenimientos.php');
    $('#tablaequipos').load('mantenimientos/tablaequipos.php');
});

//Buscar Persona
$(document).ready(function() {
    $( '#idpersona' ).select2({
        width: '100%',
        dropdownParent: $('#addmantenimiento'),
        ajax: {
            url: "../controllers/usuarios/buscarpersona.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    persona: params.term // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 2
    }).on('change', function (e){
        var id = $('#idpersona').select2('data')[0].id;
        var docume = $('#idpersona').select2('data')[0].docume;
        $('#id').html(id);
        $('#docume').html(docume);
    })
});

//Buscar Equipo
$(document).ready(function() {
    $( '#idequipo' ).select2({
        width: '100%',
        dropdownParent: $('#addmantenimiento'),
        ajax: {
            url: "../controllers/mantenimientos/buscarequipos.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    equipo: params.term // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 2
    }).on('change', function (e){
        var id = $('#idequipo').select2('data')[0].id;
        var docume = $('#idequipo').select2('data')[0].text;
        var marca = $('#idequipo').select2('data')[0].marca;
        var modelo = $('#idequipo').select2('data')[0].modelo;
        var serial = $('#idequipo').select2('data')[0].serial;
        $('#id').html(id);
        $('#docume').html(docume);
        document.getElementById("nombre").value = docume;
        document.getElementById("marca").value = marca;
        document.getElementById("modelo").value = modelo;
        document.getElementById("serial").value = serial;
    })
});

function detalleequipo(idequipo){
    $.ajax({
        type: "POST",
        data: "idequipo=" + idequipo,
        url: "../controllers/mantenimientos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta)
            $('#idequipou').val(respuesta['idequipo']);
            $('#idsedeu').val(respuesta['idsede']);
            $('#idareau').val(respuesta['idarea']);
            $('#areau').val(respuesta['area']);
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
            $('#estado').val(respuesta['estado']);
        }
    });
}

function detalleactivo(idequipo){
    $.ajax({
        type: "POST",
        data: "idequipo=" + idequipo,
        url: "../controllers/mantenimientos/detact.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#actidequipo').val(respuesta['actidequipo']);
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

function crearcelular(){
    $.ajax({
        type: "POST",
        data: $('#frmcrearcelular').serialize(),
        url: "../controllers/mantenimientos/agregarcel.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#tablaequipos').load('mantenimientos/tablaequipos.php');
                $('#frmcrearcelular')[0].reset();
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

function agregarmantenimiento(){
    $.ajax({
        type: "POST",
        data: $('#frmmantenimiento').serialize(),
        url: "../controllers/mantenimientos/agregarmat.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#tablamantenimientos').load('mantenimientos/tablamantenimientos.php');
                $('#frmmantenimiento')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Mantenimiento Agregado Exitosamente',
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

function filtrar() {
    // Declare variables
    var input, filter, table, tr, td, i, j, visible;
    input = document.getElementById("filtro");
    filter = input.value.toUpperCase();
    table = document.getElementById("equipos");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        visible = false;
        /* Obtenemos todas las celdas de la fila, no sólo la primera */
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                visible = true;
            }
        }
        if (visible === true) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}