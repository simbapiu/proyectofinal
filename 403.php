<?php
    session_start();
    $usuario = $_SESSION['admin_usuario'];
    if(!isset($usuario)) {
        header("location:admin.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        include("include/admin_head.php");
        include("include/head.php");
    ?>
    <title>Encuesta</title>
</head>

<body class="d-flex flex-column ">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php
            include ("include/403_navbar.php");
        ?>
        <!-- Page Content-->
        <section class="py-5">
            <div id="content">
                <div class="row justify-content-sm-center">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                      <!-- 404 Error Text -->
                      <div class="text-center">
                          <div class="error mx-auto" data-text="403">403</div>
                          <p class="lead text-gray-800 mb-5 text-center">Acceso Denegado</p>
                          <p class="text-gray-500 mb-0 text-center">Es posible que no tengas permiso para ver esta sección.</p>
                          <a href="index.php">&larr; Volver a inicio</a>
                      </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </section>
    </main>
    <!-- Footer-->
    <?php
        include ("include/admin_footer.php")
    ?>
    <?php
        include("include/admin_scripts.php")
    ?>
</body>

</html>