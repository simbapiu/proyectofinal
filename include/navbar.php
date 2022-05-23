<?php
    session_start();
    $usuario = $_SESSION['admin_usuario'];
?>
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #144653;">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">Poder Judicial</a> 
        <a href="index.php"> 
            <img src="imagenes/logo.png" alt="logo" width="170">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                <li class="nav-item"><a class="nav-link" href="preguntas.php">Preguntas</a></li>
                <?php
                    if (isset($usuario)) {
                        echo '<li class="nav-item"><a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>