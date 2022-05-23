<?php
$mysqli = new mysqli('localhost', 'root', '', 'bd_pj');
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
    <?php
  include("con_db.php");
  ?>
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #144653;">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">Poder Judicial</a> <img src="imagenes/logo.png" alt="logo"
                    width="170">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="nosotros.html">Nosotros</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Encuesta de satisfacción</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="calificador.html">Calificador</a></li>
                                <li><a class="dropdown-item" href="admin.html">Administrador</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contacto.html">Contacto</a></li>

                        <li class="nav-item"><a class="nav-link" href="preguntas.html">Preguntas</a></li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <section class="py-5" style="background-color:#d0d0d0">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">

                        <div class="card shadow-lg">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            Encuestas
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <strong>Cátalogo de Encuestas</strong><br>

                                            <form action="registro_encuesta.php" method="post">
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="nombre_encuesta"
                                                                placeholder="Ingresa el nombre del cuestionario">
                                                    </tr>
                                                    <tr>
                                                        <td><label for="cat_status_anios" name="periodo_encuesta"
                                                                class="text-right">Periodo</label>
                                                            <select class="form-control form-control-sm">
                                                                <option value="">Seleccione periodo</option>
                                                                <?php
                                while ($dataSelect = mysqli_fetch_array($datacat_status_aniosSelect)) { ?>
                                                                <option
                                                                    value="<?php echo ($dataSelect["id_anios"]); ?>">
                                                                    <?php echo $dataSelect["anio"]; ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="descripcion_encuesta"
                                                                placeholder="Ingrese una descripción"></td>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <button type="submit" class="btn btn-primary ms-auto"
                                                    style="background-color:#557982; border-color: #557982;">
                                                    Guardar
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Preguntas
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <strong>Cátalogo de Encuestas</strong><br>


                                                <form id="cru" action="registro_encuesta.php" method="POST">
                                                    <table>
                                                        <tr>
                                                            <td><select class="form-control form-control-sm">
                                                                    <option value="">Seleccione Encuesta</option>
                                                                    <?php

                                  while ($dataSelect = mysqli_fetch_array($datacat_status_aniosSelect)) { ?>
                                                                    <option
                                                                        value="<?php echo ($dataSelect["id_anios"]); ?>">
                                                                        <?php echo $dataSelect["anio"]; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="cat_status_anios" name="periodo_encuesta"
                                                                    class="text-right">Pregunta Afirmativa</label>
                                                                <input type="text" name="nombre_encuesta"
                                                                    placeholder="Ingresa tu pregunta en forma afirmativa">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <button type="submit" class="btn btn-primary ms-auto"
                                                        style="background-color:#557982; border-color: #557982;">
                                                        Guardar
                                                    </button>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                aria-expanded="false" aria-controls="flush-collapseThree">
                                                Respuestas
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingThree"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Placeholder content for this accordion, which is
                                                intended to demonstrate the <code>.accordion-flush</code> class. This is
                                                the third item's accordion body. Nothing more exciting happening here in
                                                terms of content, but just filling up the space to make it look, at
                                                least at first glance, a bit more representative of how this would look
                                                in a real-world application.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form> <input type="button" value="¡Regresar!" onclick="history.back ()"> </form>
                        </div>
        </section>

    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2021</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>