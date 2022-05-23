<?php
    session_start();
    $usuario = $_SESSION['admin_usuario'];
    if(isset($usuario)) {
        header("location:403.php");
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
    <?php
    include("con_db.php");
    ?>
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php
            include ("include/navbar.php");
        ?>
        <!-- Page Content-->
        <section class="py-4" style="background-color:#d0d0d0">
            <div class="container h-100">

                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4">Centro estatal de solución de controversias</h1>
                                <h1 class="fs-4 card-title fw-bold mb-4">Entrevista de calidad de servicio</h1>

                                <form method="POST" class="needs-validation" novalidate="" autocomplete="off">

                                    <div class="form-control-sm3">
                                        <label class="text-right" for="text">Número de entrevista</label>
                                        <input id="text" type="text" class="form-control form-control-sm" name="ticket" value="" placeholder="Ingrese su número de folio" required autofocus>

                                    </div>

                                    <div class="form-control-sm3">
                                        <label for="cat_oficinas" class="text-right">Oficina</label>
                                        <select class="form-control form-control-sm">
                                            <option value="">Seleccione la oficina</option>
                                            <?php
                                            while ($dataSelect = mysqli_fetch_array($datacat_oficinasSelect)) { ?>
                                                <option value="<?php echo $dataSelect["oficina_id"]; ?>">
                                                    <?php echo ($dataSelect["oficina_nombre"]); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-control-sm3">
                                        <label for="cat_facilitadores" class="text-right">Facilitador</label>
                                        <select class="form-control form-control-sm">
                                            <option value="">Seleccione al facilitador</option>

                                            <?php
                                            while ($dataSelect = mysqli_fetch_array($datacat_facilitadoresSelect)) { ?>

                                                <option value="<?php echo $dataSelect["facilitador_id"]; ?>">
                                                    <?php echo ($dataSelect["facilitador_nombre"]); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-control-sm3">
                                        <label for="cat_status_anio" class="text-right">Periodo</label>
                                        <select class="form-control form-control-sm">
                                            <option value="">Seleccione el periodo</option>

                                            <?php
                                            while ($dataSelect = mysqli_fetch_array($datacat_status_aniosSelect)) { ?>

                                                <option value="<?php echo $dataSelect["anio_id"]; ?>">
                                                    <?php echo ($dataSelect["anio_nombre"]); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-control-sm3">
                                        <label for="cat_etapa" class="text-right">Etapa</label>
                                        <select class="form-control form-control-sm">
                                            <option value="">Seleccione la etapa
                                            </option>

                                            <?php
                                            while ($dataSelect = mysqli_fetch_array($datacat_etapaSelect)) { ?>

                                                <option value="<?php echo $dataSelect["etapa_id"]; ?>">
                                                    <?php echo ($dataSelect["etapa_nombre"]); ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                    </div>


                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                            <label for="remember" class="form-check-label" style="color: black;">Aceptar terminos y condiciones</label>

                                        </div>
                                        <button type="submit" class="btn btn-primary ms-auto" style="background-color:#557982; border-color: #557982;">
                                            Empezar encuesta
                                        </button>
                                    </div>
                                </form>
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