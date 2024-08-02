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
            //console.log(data);
            let tbl = '';
            data.forEach((item) => {
                if(item.estado == 1){
                    button = `<button type="button" class="btn btn-outline-success btn-sm" onclick="estadousuarios('${item.id}', ${item.estado})">ACTIVO</button>`
                }else{
                    button = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="estadousuarios('${item.id}', ${item.estado})">INACTIVO</button>`
                }
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
                    <td class="text-center" style="width: 10%" >${button}</td>
                </tr>
                `
            });
            document.getElementById('tablausuarios').innerHTML = tbl
        }
    });
    //console.log(fecha)
}

function estadousuarios(id, estado){
    $.ajax({
        url : "../controllers/metroapp/estados.php",
        type : 'POST',
        data : {id : id, estado : estado},
        success:function(sql){
            //console.log(sql)
            sql = sql.trim();
            if(sql == 1){
                tblusuarios();
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

function permisos(id){
    $.ajax({
        url : "../controllers/metroapp/permisos.php",
        data: "id="+ id,
        type : 'GET',
        dataType: 'json',
        success: function (data) {
            let tbl = '';
            data.forEach((item) => {
            if(item.precio == '1'){
                modulo = 'LISTA DE PRECIO';
            }
            if(item.costo == '1'){
                modulo = 'INVENTARIOS';
            }
            tbl += `<thead>
                    <tr>
                        <th scope="col" >MODULO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td>
                            <div class="col-md-4">
                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined">${modulo}</label><br>
                            </div>
                        </td>
                    </tr>
                </tbody>
            `
            });
            document.getElementById(`permisos`).innerHTML = tbl
        }
    });
    //console.log(fecha)
}
