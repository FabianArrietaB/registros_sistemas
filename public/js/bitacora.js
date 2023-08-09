$(document).ready(function(){
    $('#tablaprocesos').load('bitacora/listaprocesos.php');
});

function filtrar() {
    // Declare variables
    var input, filter, table, tr, td, i, j, visible;
    input = document.getElementById("filtro");
    filter = input.value.toUpperCase();
    table = document.getElementById("eventos");
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

function obteneraño(){
    var año = $('#year').val();
    //console.log(año)
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        $('#tablaprocesos').load('bitacora/listaprocesos.php?year='+año);
    })
}

function obtnermodulo(){
    var modulo = $('#modulo').val();
    //console.log(modulo)
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        $('#tablaprocesos').load('bitacora/listaprocesos.php?modulo='+modulo);
    })
}

function onteneroperador(){
    var operador = $('#operador').val();
    //console.log(operador)
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        $('#tablaprocesos').load('bitacora/listaprocesos.php?operador='+operador);
    })
}
