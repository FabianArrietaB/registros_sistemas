<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SISTEMAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-md-flex d-block flex-row mx-md-auto mx-0">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if ($_SESSION['usuario']['rol'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="inicio.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"" href="equipos.php">EQUIPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="compras.php">COMPRAS</a>
                    </li>
                    <?php } else if ($_SESSION['usuario']['rol'] == 3) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="inicio.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="mantenimientos.php">MANTENIMIENTOS</a>
                    </li>
                    <?php } else if ($_SESSION['usuario']['rol'] == 4) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="inicio.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="equipos.php">EQUIPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="mantenimientos.php">MANTENIMIENTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tareas.php">TAREAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="compras.php">COMPRAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="historial.php">HISTORIAL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="usuarios.php">USUARIOS</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <span class="navbar-brand" href="#">Usuario:</span>
        <a class="mr-sm-2 btn btn-primary" type="button" onclick="cambiarcontraseña()"><?php echo $_SESSION['usuario']['nombre'] ?></a>
        <a href="../controllers/usuarios/salir.php" class="btn btn-danger" type="submit">
            <i class="fa-solid fa-power-off fa-2x"></i>
        </a>
    </div>
</nav>