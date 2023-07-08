<!-- Vista Admin y Supervisro -->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 4){
    include "../models/conexion.php";
    $idusuario = $_SESSION['usuario']['id'];
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<div class="container-fluid">
    <div class="page-content">
        <div class="card border-primary">
            <div class="row">
                <div class="col-12">
                    <div class="card-header text-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="title">
                                    <h2>EVENTOS DEL SISTEMA</h2>
                                </div>
                            </div>
                        </div>
                        <form method="get">
                            <div class="row">
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Año</span>
                                        <select name="year" id="year" onchange="obteneraño()" class="form-control input-sm">
                                            <option value="<?php echo date('Y') ?>">Año Actual</option>
                                            <?php
                                            $sql="SELECT DISTINCT YEAR(b.bit_fecope) as año FROM bitacora as b ORDER BY año DESC";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($año = mysqli_fetch_array($respuesta)) {
                                            ?>
                                                <option value="<?php echo $año['año']?>"><?php echo $año['año'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                        <select name="operador" id="operador" onchange="onteneroperador()" class="form-control input-sm">
                                            <option value="">Usuario</option>
                                            <?php
                                            $sql="SELECT DISTINCT b.bit_operador AS idoperador, u.user_nombre AS nombre FROM bitacora as b INNER JOIN usuarios AS u ON u.id_usuario = b.bit_operador ORDER BY idoperador ASC";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($usuario = mysqli_fetch_array($respuesta)) {
                                            ?>
                                                <option value="<?php echo $usuario['idoperador']?>"><?php echo $usuario['nombre'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Modulo</span>
                                        <select name="modulo" id="modulo" onchange="obtnermodulo()" class="form-control input-sm">
                                            <option value="">Modulo</option>
                                            <?php
                                            $sql="SELECT DISTINCT b.bit_modulo AS modulo FROM bitacora as b ORDER BY modulo ASC";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($modulo = mysqli_fetch_array($respuesta)) {
                                            ?>
                                                <option value="<?php echo $modulo['modulo']?>"><?php echo $modulo['modulo'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div id="tablaprocesos"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
    include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/bitacora.js"></script>
<?php
}
?>