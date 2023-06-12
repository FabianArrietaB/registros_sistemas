$(document).ready(function(){
    $('#tablalistausuarios').load('usuarios/listausuarios.php');
    $('#agregarusuario').load('usuarios/crearusuario.php');
});

//Buscar Persona
$(document).ready(function() {
    $( '#idpersona' ).select2({
        width: '100%',
        dropdownParent: $('#create'),
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

function activarusuario(idusuario, estado){
    $.ajax({
        type:"POST",
        data:"idusuario=" + idusuario +"&estado=" + estado,
        url:"../controllers/usuarios/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta)
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
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

function agregarusuario(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarusuario').serialize(),
        url: "../controllers/usuarios/agregar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta);
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
                $('#frmagregarusuario')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Creado Exitosamente',
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

function detalleusuario(idusuario){
    $.ajax({
        type: "POST",
        data: "idusuario=" + idusuario,
        url: "../controllers/usuarios/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta)
            $('#idusuario').val(respuesta['idusuario']);
            $('#idpersona').val(respuesta['idpersona']);
            $('#idareau').val(respuesta['idarea']);
            $('#idrolu').val(respuesta['idrol']);
            $('#usuariou').val(respuesta['usuario']);
            $('#nombreu').val(respuesta['nombre']);
        }
    });
}

function editarusuario(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarusuario').serialize(),
        url: "../controllers/usuarios/editar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta)
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Actualizado Exitosamente',
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
        console.log(respuesta);
        }
    });
    return false;
}

function eliminarusuario(idusuario){
    $.ajax({
        type: "POST",
        data:"idusuario=" + idusuario,
        url:"../controllers/usuarios/eliminar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                //console.log(respuesta)
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
                    swal.fire({
                        icon: 'success',
                        title: 'Usuario Eliminado Exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
            }else{
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al Eliminar!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
}

function cambiocontraseña(){
    $.ajax({
        type:"POST",
        data:$('#frmActualizarContraseña').serialize(),
        url:"../Controlador/usuarios/crud/actualizarContraseña.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#modalCambiarContraseña').modal('hide');
                Swal.fire(":D","Actualizado con exito!","success");

            }else{
                Swal.fire(":(","Error al Actualizar!" + respuesta,"Error");
            }
        }
    });
return false;
}