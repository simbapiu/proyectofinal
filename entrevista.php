<?php
    session_start();
    include("con_db.php");
    $is_valid = $_SESSION['is_valid'] ? $_SESSION['is_valid'] : false;
    if(!$is_valid) {
        header("location: index.php");
    } else {
        $folio = $_GET['folio'];
        $sql = "SELECT * FROM resultados WHERE folio = $folio";
        $resultado = $con->query($sql);
        $datos = $resultado->fetch_array();
        $periodo = $datos['periodo'];

        $encuesta = "SELECT titulo FROM encuestas WHERE anio = $periodo";
        $resultado2 = $con->query($encuesta);
        $datos2 = $resultado2->fetch_array();
        $encuesta_titulo = $datos2[0];

        $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link href="css/css/bootstrap.min.css" rel="stylesheet" />
    <?php
        include("include/admin_head.php");
    ?>
    <style>
        
    </style>
    <title>Encuesta</title>
</head>

<body id="page-top">
    <?php
        include("con_db.php");
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="imagenes/logo.png" width="160" height="50">
                </div>
            </div>

            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3"><i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>  Ciudadano</span></div>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Entrevistas
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="entrevista.php?folio='<?php echo $folio; ?>'">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Responder entrevista</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Volver al inicio</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="container">

                        <div class="card o-hidden border-0 shadow-lg my-2">
                            <div class="card-body p-5">
                                <div class="col">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <?php echo $encuesta_titulo; ?>
                                            <h1 class="h4 text-gray-900 mb-4">Entrevista:</h1>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <h5 class="card-title"><b>Facilitador: </b><?php echo $datos['facilitador']; ?></h5>
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <h5 class="card-title"><b>Periodo: </b><?php echo $datos['periodo']; ?></h5>
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <h5 class="card-title"><b>Etapa: </b><?php echo $datos['etapa']; ?></h5>
                                                    </div>
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <h5 class="card-title"><b>Oficina: </b><?php echo $datos['oficina']; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <form class="user" action="scripts/entrevista_guardar.php" method="POST">
                                            <?php 
                                                $sqlPreguntas = ("SELECT * FROM preguntas WHERE encuesta_titulo = '$encuesta_titulo' ORDER BY titulo DESC");
                                                $dataPreguntas  = mysqli_query($con, $sqlPreguntas);
                                                while ($datosPreg = mysqli_fetch_array($dataPreguntas)) { ?>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <?php echo $datosPreg['titulo']; ?>
                                                        </div>
                                                        <div class="card-body">
                                                            <center>
                                                                <form>
                                                                    <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                                                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                        <input type="radio" value="0" class="btn-check" name="btnradio-<?php echo $folio."-".$datosPreg['id']; ?>" id="resp1-<?php echo $folio."-".$datosPreg['id']; ?>" autocomplete="off">
                                                                        <label class="btn btn-outline-pj" for="resp1-<?php echo $folio."-".$datosPreg['id']; ?>"><img src="imagenes/0.png" width="90px" height="90px"></label>

                                                                        <input type="radio" value="1" class="btn-check" name="btnradio-<?php echo $folio."-".$datosPreg['id']; ?>" id="resp2-<?php echo $folio."-".$datosPreg['id']; ?>" autocomplete="off">
                                                                        <label class="btn btn-outline-pj" for="resp2-<?php echo $folio."-".$datosPreg['id']; ?>"><img src="imagenes/1.png" width="90px" height="90px"></label>

                                                                        <input type="radio" value="2" class="btn-check" name="btnradio-<?php echo $folio."-".$datosPreg['id']; ?>" id="resp3-<?php echo $folio."-".$datosPreg['id']; ?>" autocomplete="off">
                                                                        <label class="btn btn-outline-pj" for="resp3-<?php echo $folio."-".$datosPreg['id']; ?>"><img src="imagenes/2.png" width="90px" height="90px"></label>

                                                                        <input type="radio" value="3" class="btn-check" name="btnradio-<?php echo $folio."-".$datosPreg['id']; ?>" id="resp4-<?php echo $folio."-".$datosPreg['id']; ?>" autocomplete="off">
                                                                        <label class="btn btn-outline-pj" for="resp4-<?php echo $folio."-".$datosPreg['id']; ?>"><img src="imagenes/3.png" width="90px" height="90px"></label>

                                                                        <input type="radio" value="4" class="btn-check" name="btnradio-<?php echo $folio."-".$datosPreg['id']; ?>" id="resp5-<?php echo $folio."-".$datosPreg['id']; ?>" autocomplete="off">
                                                                        <label class="btn btn-outline-pj" for="resp5-<?php echo $folio."-".$datosPreg['id']; ?>"><img src="imagenes/4.png" width="90px" height="90px"></label>
                                                                    </div>
                                                                    <div style="display:inline-block;">
                                                                        <div class="opciones-label">
                                                                            <span>Nada <?php echo $datosPreg['variable']; ?></span>
                                                                        </div>
                                                                        <div class="opciones-label">
                                                                            <span>Poco <?php echo $datosPreg['variable']; ?></span>
                                                                        </div>
                                                                        <div class="opciones-label">
                                                                            <span>Algo <?php echo $datosPreg['variable']; ?></span>
                                                                        </div>
                                                                        <div class="opciones-label">
                                                                            <span><?php echo ucfirst($datosPreg['variable']); ?></span>
                                                                        </div>
                                                                        <div class="opciones-label">
                                                                            <span>Muy <?php echo $datosPreg['variable']; ?></span>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </center>
                                                        </div>
                                                    </div>
                                                    <br>
                                                <?php } ?>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="submit" name="cancelar" class="btn btn-primary btn-user btn-block" value="Guardar y Salir">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="submit" name="<?php echo "finalizar"; ?>" class="btn btn-primary btn-user btn-block" value="Finalizar">
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-dark">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-white">
                        <span>Copyright &copy; Poder Judicial 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <?php
        include("include/admin_scripts.php")
    ?>
    <!--<script>
        window.onbeforeunload = popup;

        function popup() {
            return '¿Estás seguro de salir?, tendrás que ingresar los datos de inicio de nuevo.';
            window.location = 'http://localhost/proyectofinal/index.php';
        }
    </script>-->
    <script>
        $(document).ready(function(){
            $('input[type="radio"]').click(function() {
                let opcion = 0;
                let id_seleccionado = this.id;
                let valor_seleccionado = $("#"+id_seleccionado+":checked").val();
                let pregunta_id = id_seleccionado.split('-').pop();
                let folio = id_seleccionado.split('-')[1];
                switch (valor_seleccionado) {
                    case '0':
                        opcion = "Nada satisfecho";
                        break;
                    case '1':
                        opcion = "Poco satisfecho";
                        break;
                    case '2':
                        opcion = "Algo atisfecho";
                        break;
                    case '3':
                        opcion = "Satisfecho";
                        break;
                    case '4':
                        opcion = "Muy satisfecho";
                        break;
                    default:
                        break;
                }
                let _token = $('#token').val();
                $.ajax({
                    url: 'scripts/opciones_guardar.php',
                    type: 'post',
                    data: {
                        pregunta_id: pregunta_id,
                        folio: folio,
                        opcion: opcion,
                        valor_seleccionado: valor_seleccionado,
                        _token: _token
                    },
                    success: function (response) {
                        console.log("Resp: "+response);
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.message);
                    }
                });
            });
        });

        function getValue() {
            for (let i = 1; i <= 5; i++) {
                let valueOption = $("#resp"+i+"-"+questionId).val();
            }
        }
    </script>
    <style>
        .opciones-label {
            width:116px;
            padding: .355rem .55rem;
            display: inline-block;
        }
    </style>
</body>

</html>