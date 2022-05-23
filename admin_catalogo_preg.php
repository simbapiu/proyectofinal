<?php
    include("con_db.php");
    session_start();
    $usuario = $_SESSION['admin_usuario'];
    if(!isset($usuario)) {
        header("location:admin.php");
    }

    $id = $_GET['id'];
    if($id) {
        $pregunta = "SELECT * FROM preguntas WHERE id = '$id'";
        $modificar = $con->query($pregunta);
        $datos = $modificar->fetch_array();
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
        include("include/admin_head.php");
    ?>
    <title>Encuesta</title>
</head>

<body id="page-top">
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
                    <span>  Admin</span></div>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Configuración de encuestas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="admin_catalogo_encuesta.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Encuestas</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="admin_catalogo_preg.php">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Preguntas</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="admin_tipo_preguntas.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tipo Pregunta</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="on_admin.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Salir del panel</span></a>
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
                                            <h1 class="h4 text-gray-900 mb-4">Agregar preguntas</h1>
                                        </div>
                                        <form class="user" action="scripts/pregunta_guardar.php" method="POST">
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                                <label for="encuesta_titulo" class="form-label">Encuesta</label>
                                                <select class="form-control form-select-user" name="encuesta_titulo" id="encuesta_titulo">
                                                    <?php if($id) { ?>
                                                        <option selected><?php echo ($datos["encuesta_titulo"]); ?></option>
                                                    <?php } else { ?>
                                                        <option selected>Seleccione la encuesta.</option>
                                                    <?php } ?>
                                                    <?php
                                                    while ($encuestas = mysqli_fetch_array($datacat_encuestaSelect)) { ?>
                                                        <option value="<?php echo $encuestas["titulo"]; ?>">
                                                            <?php echo ($encuestas["titulo"]); ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="titulo" class="form-label">Pregunta/Afirmación</label>
                                                <input type="text" class="form-control form-select-user" name="titulo" 
                                                id="titulo" placeholder="Ingrese la pregunta o afimación que desea realizar." 
                                                value="<?php echo $datos['titulo']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="variable" class="form-label">Ingresa una breve descripción</label>
                                                <textarea type="email" class="form-control" name="variable" 
                                                id="variable"><?php echo $datos['variable']; ?></textarea>
                                            </div>
                                            <br>
                                            <input type="submit" name="<?php if($id) { echo "modificar"; } else { echo "guardar"; } ?>" class="btn btn-primary btn-user btn-block" value="Guardar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card o-hidden border-0 shadow-lg my-2">
                            <div class="card-body p-5">
                                <div class="col">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <h1 class="h3 mb-2 text-gray-800">Listado de preguntas</h1>
                                        <p class="mb-4">En la siguiente tabla se lista las preguntas 
                                            creadas con el previo formulario.</p>

                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Encuestas</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Título</th>
                                                                <th>Encuesta</th>
                                                                <th>Variable</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Título</th>
                                                                <th>Encuesta</th>
                                                                <th>Variable</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                            while ($dataSelect = mysqli_fetch_array($datapreguntasSelect)) { ?>
                                                            <?php $pregunta_id = $dataSelect["id"]; ?>
                                                                <tr>
                                                                    <td><?php echo $dataSelect["titulo"]; ?></td>
                                                                    <td><?php echo $dataSelect["encuesta_titulo"]; ?></td>
                                                                    <td><?php echo $dataSelect["variable"]; ?></td>
                                                                    <td class="btn-actions-container">
                                                                        <div class="btn-actions">
                                                                            <a href="?id=<?php echo $pregunta_id; ?>"><i class="fas fa-pen fa-sm btn-warning2"></i></a>
                                                                            <a href="scripts/eliminar_pregunta.php?id=<?php echo $pregunta_id; ?>"><i class="fas fa-trash fa-sm btn-danger2"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
        include("include/admin_scripts.php");
        include("include/datatable_es.php")
    ?>
</body>

</html>