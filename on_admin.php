<?php
    session_start();
    $usuario = $_SESSION['admin_usuario'];
    if(!isset($usuario)) {
        header("location:admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Poder Judicial</title>
    <?php
        include ("include/head.php");
    ?>
</head>

<body class="d-flex flex-column ">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php
            include ("include/navbar.php");
        ?>
        <!-- Page Content-->
        <section class="py-5" style="background-color:#d0d0d0">
            <div class="container">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="title" style="margin-top:15px">
                            <h1>Administrador</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-2 g-2">
                            <div class="col">
                                <div class="card">
                                    <center><img src="imagenes/gear.png" class="card-img-top" style="width: 200px; height: 200px;"></center>
                                    <div class="card-body">
                                        
                                        <p class="card-text"><center>Módulo de encuestas de satisfaccion de los clientes.</center></p>
                                        <a href="admin_catalogo_encuesta.php" class="btn btn-primary">Configuración</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <center><img src="imagenes/analisis-de-mercado.png" class="card-img-top" style="width: 200px; height: 200px;"></center>
                                    <div class="card-body">
                                        <p class="card-text"><center>Módulo de generacion y visualizacion de reportes de las encuestas.</center></p>
                                        <a href="reportes_graficas.php" class="btn btn-primary">Reportes y Análisis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- Footer-->
    <?php
        include ("include/footer.php")
    ?>
</body>

</html>