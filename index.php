<?php 
    session_start();
    $usuario = $_SESSION['admin_usuario'];
    if(!isset($usuario)) {
        session_unset();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Poder judicial</title>
    
    <?php
        include ("include/admin_head.php");
        include ("include/head.php");
        include ("con_db.php");
    ?>
</head>

<body id="page-top">
    <!-- Navigation-->
    <?php
        include ("include/navbar.php");
    ?>
    <div id="content" style="background-color: #495057;">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0"  style="background-color: #212529;">
                        <!-- Nested Row within Card Body -->
                        <div class="col">
                            <div class="my-5 text-center text-xl-center">
                                <br>
                                <h1 class="display-5 fw-bolder text-white mb-2">
                                    Bienvenido al portal del Centro De Solucion De Controversias
                                </h1>
                                <br>
                                <center><h4 class="lead fw-normal text-white-50">Se parte de la entrevista de satisfacción</h4></center>
                            </div>
                        </div>
                        <br>
                        <div class="row"  style="background-color: #fff;">
                            <div class="col-lg-5 d-none d-lg-block bg-register-image" style="margin: auto 0;"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Entrevista de calidad de servicio</h1>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalTerms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalTerms').modal('hide');">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ... Estos son los tyc...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modalTerms').modal('hide');">Cerrar</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="user" action="scripts/validar_ciudadano.php" method="post">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label class="mb-2 text-muted" for="text">Número de entrevista</label>
                                                <input id="numero_folio" type="text" class="form-control form-select-user" name="numero_folio" value="" placeholder="Ingrese su número de folio" required autofocus>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="cat_facilitadores" class="mb-2 text-muted">Facilitador</label>
                                                <select class="form-control form-select-user" name="facilitador" id="facilitador">
                                                    <option value="">Seleccione al facilitador</option>

                                                    <?php
                                                    while ($dataSelect = mysqli_fetch_array($datacat_facilitadoresSelect)) { ?>

                                                        <option value="<?php echo $dataSelect["facilitador_nombre"]; ?>">
                                                            <?php echo ($dataSelect["facilitador_nombre"]); ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="cat_status_anio" class="mb-2 text-muted">Periodo</label>
                                                <select class="form-control form-select-user" name="periodo" id="periodo">
                                                    <option value="">Seleccione el periodo</option>

                                                    <?php
                                                    while ($dataSelect = mysqli_fetch_array($data_PeriodoEncuestas)) { ?>

                                                        <option value="<?php echo $dataSelect["anio"]; ?>">
                                                            <?php echo ($dataSelect["anio"]); ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="cat_etapa" class="mb-2 text-muted">Etapa</label>
                                                <select class="form-control form-select-user" name="etapa" id="etapa">
                                                    <option value="">Seleccione la etapa
                                                    </option>

                                                    <?php
                                                    while ($dataSelect = mysqli_fetch_array($datacat_etapaSelect)) { ?>

                                                        <option value="<?php echo $dataSelect["etapa_nombre"]; ?>">
                                                            <?php echo ($dataSelect["etapa_nombre"]); ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0" id="contenido-captcha">
                                                <label class="mb-2 text-muted" for="text">Captcha</label>
                                                <br>
                                                <img src="scripts/captcha.php" alt="" id="captcha" style="margin-bottom: 10px;">
                                                <br>
                                            </div>
                                            <div class="col-sm-4">
                                                <br style="margin-top: 30px;">
                                                <input id="ciudadano_captcha" type="text" class="form-control"
                                                    placeholder="Ingresar captcha" name="ciudadano_captcha" value="">
                                            </div>
                                            <div class="col-sm-4">
                                                <br style="margin-top: 20px;">
                                                <a href="javascript:void(0)" 
                                                    onclick="document.getElementById('captcha').src = 'scripts/captcha.php?' + Math.random(); return false" 
                                                    class="btn btn-primary ms-auto" style="margin-top: 9px;">Recargar
                                                </a><br/>
                                                <div class="invalid-feedback">
                                                    Captcha invalida
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-control-sm form-check-input" type="checkbox" value="" id="checkTerms">
                                                <label class="form-check-label" for="checkTerms">
                                                    Aceptar <a href="javascript:void(0)" onclick="$('#modalTerms').modal('show');">términos y condiciones</a>
                                                </label>
                                            </div>
                                        </div>
                                        <input disabled type="submit" id="btnComenzar" name="btnComenzar"
                                            value="Comenzar" class="btn btn-primary ms-auto"
                                            style="background-color:#557982; border-color: #557982;">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-dark">
        <div class="container my-auto">
            <div class="copyright text-center my-auto text-white">
                <span>Copyright &copy; Poder Judicial 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    
    <!-- Features section-->

    <script type="text/javascript">
        $('#checkTerms').click(function(){
            //If the checkbox is checked.
            if($(this).is(':checked')){
                //Enable the submit button.
                $('#btnComenzar').attr("disabled", false);
            } else{
                //If it is not checked, disable the button.
                $('#btnComenzar').attr("disabled", true);
            }
        });
    </script>
</body>

</html>