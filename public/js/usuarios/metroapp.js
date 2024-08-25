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
            //ROLES
            if(item.administrador == 1){
                administrador = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.administrador}','administrador')">ADMINISTRADOR</button>`
            }else{
                administrador = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.administrador}','administrador')">ADMINISTRADOR</button>`
            }
            if(item.supervisor == 1){
                supervisor = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.supervisor}','supervisor')">SUPERVISOR</button>`
            }else{
                supervisor = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.supervisor}','supervisor')">SUPERVISOR</button>`
            }
            //MODULOS
            if(item.precio == 1){
                precio = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.precio}','precio')">LISTA DE PRECIO</button>`
            }else{
                precio = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.precio}','precio')">LISTA DE PRECIO</button>`
            }

            if(item.costo == 1){
                costo = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.costo}','costo')">CONTEOS</button>`
            }else{
                costo = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.costo}','costo')">CONTEOS</button>`
            }

            if(item.cartera == 1){
                cartera = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.cartera}','cartera')">CARTERA</button>`
            }else{
                cartera = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.cartera}','cartera')">CARTERA</button>`
            }

            if(item.update_precio == 1){
                update = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.update_precio}','update_precio')">UPDATE PRECIOS</button>`
            }else{
                update = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.update_precio}','update_precio')">UPDATE PRECIOS</button>`
            }

            if(item.visita_clientes == 1){
                clientes = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.visita_clientes}','visita_clientes')">VISITA CLIENTES</button>`
            }else{
                clientes = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.visita_clientes}','visita_clientes')">VISITA CLIENTES</button>`
            }

            if(item.pedidos_pendientes == 1){
                pedidos = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.pedidos_pendientes}','pedidos_pendientes')">PEDIDOS PENDIENTES</button>`
            }else{
                pedidos = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.pedidos_pendientes}','pedidos_pendientes')">PEDIDOS PENDIENTES</button>`
            }

            if(item.compras_pendientes == 1){
                compra = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.compras_pendientes}','compras_pendientes')">COMPRAS PENDIENTES</button>`
            }else{
                compra = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.compras_pendientes}','compras_pendientes')">COMPRAS PENDIENTES</button>`
            }

            if(item.ordenes_pendientes == 1){
                ordenes = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.ordenes_pendientes}','ordenes_pendientes')">ORDENES PRENDIENTES</button>`
            }else{
                ordenes = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.ordenes_pendientes}','ordenes_pendientes')">ORDENES PENDIENTES</button>`
            }

            if(item.reimpresiones == 1){
                impresion = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.reimpresiones}','reimpresiones')">REIMPRESIONES</button>`
            }else{
                impresion = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.reimpresiones}','reimpresiones')">REIMPRESIONES</button>`
            }

            if(item.sesiones == 1){
                sessiones = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.sesiones}','sesiones')">SESSIONES</button>`
            }else{
                sessiones = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.sesiones}','sesiones')">SESSIONES</button>`
            }

            if(item.codebar == 1){
                codebar = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.codebar}','traslado')">CODIGO BARRAS</button>`
            }else{
                codebar = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.codebar}','traslado')">CODIGO BARRAS</button>`
            }

            if(item.traslado == 1){
                traslado = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.traslado}','traslado')">TRASLADOS</button>`
            }else{
                traslado = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.traslado}','traslado')">TRASLADOS</button>`
            }

            if(item.iva_ordenes == 1){
                iva = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.iva_ordenes}','iva_ordenes')">IVA ORDENES</button>`
            }else{
                iva = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.iva_ordenes}','iva_ordenes')">IVA ORDENES</button>`
            }

            if(item.minimo == 1){
                minimo = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.minimo}','minimo')">MINIMOS</button>`
            }else{
                minimo = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.minimo}','minimo')">MINIMOS</button>`
            }

            if(item.gastos == 1){
                gastos = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.gastos}','gastos')">GASTOS LOGISTICA</button>`
            }else{
                gastos = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.gastos}','gastos')">GASTOS LOGISTICA</button>`
            }

            if(item.listado_precios_brilla == 1){
                brilla = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.listado_precios_brilla}','listado_precios_brilla')">PRECIO BRILLA</button>`
            }else{
                brilla = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.listado_precios_brilla}','listado_precios_brilla')">PRECIO BRILLA</button>`
            }

            if(item.logistica == 1){
                logistica = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.logistica}','logistica')">GASTOS LOGISTICA</button>`
            }else{
                logistica = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.logistica}','logistica')">GASTOS LOGISTICA</button>`
            }

            if(item.ajuste_contabilidad == 1){
                adjcontabilidad = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.ajuste_contabilidad}','ajuste_contabilidad')">AJUSTE DOC CONTABLE</button>`
            }else{
                adjcontabilidad = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.ajuste_contabilidad}','ajuste_contabilidad')">AJUSTE DOC CONTABLE</button>`
            }

            if(item.comercial == 1){
                comercial = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.comercial}','comercial')">COMERCIAL</button>`
            }else{
                comercial = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.comercial}','comercial')">COMERCIAL</button>`
            }

            if(item.contabilidad == 1){
                contabilidad = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.contabilidad}','contabilidad')">CONTABILIDAD</button>`
            }else{
                contabilidad = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.contabilidad}','contabilidad')">CONTABILIDAD</button>`
            }

            if(item.reportes_comercial == 1){
                recomercial = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.reportes_comercial}','reportes_comercial')">R. COMERCIAL</button>`
            }else{
                recomercial = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.reportes_comercial}','reportes_comercial')">R. COMERCIAL</button>`
            }

            if(item.chequeo_precios == 1){
                cheprecio = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.chequeo_precios}','chequeo_precios')">CHEQUEO PRECIOS</button>`
            }else{
                cheprecio = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.chequeo_precios}','chequeo_precios')">CHEQUEO PRECIOS</button>`
            }

            if(item.vencidos == 1){
                vencidos = `<button type="button" class="btn btn-success btn-sm" onclick="addremove('${item.id}', '${item.vencidos}','vencidos')">VENCIDOS</button>`
            }else{
                vencidos = `<button type="button" class="btn btn-outline-danger btn-sm" onclick="addremove('${item.id}', '${item.vencidos}','vencidos')">VENCIDOS</button>`
            }
            tbl += `
            <div class="container-fluid px-4 pt-3">
                <div class="row">
                    <div class="title">
                        <h3>ROLES</h3>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${administrador}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${supervisor}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="title">
                        <h3>LISTA PERMISOS</h3>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${precio}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${costo}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${cartera}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${update}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${clientes}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${compra}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${ordenes}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${impresion}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${sessiones}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${traslado}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${iva}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${minimo}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${gastos}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${brilla}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${logistica}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${adjcontabilidad}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${comercial}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${contabilidad}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${recomercial}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${cheprecio}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                        ${vencidos}
                        </div>
                    </div>
                </div>
            </div>
            `
            });
            document.getElementById(`permisos`).innerHTML = tbl
        }
    });
    //console.log(fecha)
}

function addremove(id, estado, modulo){
    id = id;
    $.ajax({
        url : "../controllers/metroapp/addremove.php",
        type : 'POST',
        data : {id : id, estado: estado, modulo : modulo},
        success:function(sql){
            //console.log(modulo)
            //console.log(id)
            console.log(sql)
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