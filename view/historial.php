<!-- Vista Admin y Supervisro -->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 2||
    $_SESSION['usuario']['rol'] == 3||
    $_SESSION['usuario']['rol'] == 4){
    include "../models/conexion.php";
    $idusuario = $_SESSION['usuario']['id'];
    $con = new Conexion(); // Conectar a la BD
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<div class="container-fluid">
    <div class="page-content">
        <div class="card border-primary">
            <div class="card-header bg-success text-center text-white">
                <div class="row">
                    <div class="col-10">
                        <h4>Gastos Totales</h4>
                    </div>
					<div class="col-2">
						<form method="get">
						<div class="input-group mb-3">
							<span class="input-group-text" id="inputGroup-sizing-default">Año</span>
							<select name="year" id="year" onchange="obteneraño()" class="form-control input-sm">
								<?php
									$sql="SELECT DISTINCT YEAR(v.ven_feccom) as año FROM ventas as v ORDER BY año DESC";
									$respuesta = mysqli_query($conexion, $sql);
									while($año = mysqli_fetch_array($respuesta)) {
								?>
									<option value="<?php echo $año['año']?>"><?php echo $año['año'];?></option>
								<?php }?>
							</select>
						</div>
						</form>
					</div>
                </div>
            </div>
            <div id="tablapresupuesto"></div>
        </div>
    </div>
</div>
<div id="conte-modal-compras"></div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "presupuesto/addpresupuesto.php";
require('footer.php');
?>
<!-- carga ficheros javascript -->
<script src="../public/js/historial.js"></script>
<?php
    }else{
        header("location:../index.php");
    }
?>