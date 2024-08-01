$(document).ready(function(){
    $('#tablalistapermisos').load('usuarios/permisosmetroapp.php');
    tblusuarios();
});

function tblusuarios(){
    $.ajax({
        url : "../controllers/metroapp/usuarios.php",
        type : 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            let tbl = '';
            data.forEach((item) => {
                if (item.bodega == '0001') {
                    bodega = 'METROPOLIS'
                }else if(item.bodega == '0016'){
                    bodega = 'FERRECASAS'
                }else{
                    bodega = 'MAYORISTA'
                }
                tbl += `
                <tr class="bg-white border-b">
                    <td ondblclick="permisos('${item.id}')" style="width: 10%" class="text-center">${item.user_}</td>
                    <td class="text-center" style="width: 10%" >${bodega}</td>
                </tr>
                `
            });
            document.getElementById(`usuarios`).innerHTML = tbl
        }
    });
    //console.log(fecha)
}

function permisos(id){
    $.ajax({
        url : "../controllers/metroapp/permisos.php",
        data: "id="+ id,
        type : 'GET',
        dataType: 'json',
        success: function (data) {
            let tbl = '';
            let estado = 'INACTIVO';
            data.forEach((item) => {
            if(item.precio == '1'){
                modulo = 'LISTA DE PRECIO';
                estado = 'ACTIVO';
            }
            tbl += `<thead>
                    <tr>
                        <th scope="col" >MODULO</th>
                        <th scope="col" >ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="text-center">${modulo}</td>
                        <td class="text-center">${estado}</td>
                    </tr>
                </tbody>
            `
            });
            document.getElementById(`permisos`).innerHTML = tbl
        }
    });
    //console.log(fecha)
}
