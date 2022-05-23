<?php
    include "con_db.php";
    session_start();
    $usuario = $_SESSION['admin_usuario'];
    if(!isset($usuario)) {
        header("location:admin.php");
    }
    date_default_timezone_set("America/Lima");
    $date = new DateTime();

    $fecha_inicio = $date->format('Y-m-d H:i:s');
    
    $id = $_GET['id'];
    if($id) {
        $encuesta = "SELECT * FROM encuestas WHERE id = '$id'";
        $modificar = $con->query($encuesta);
        $datos = $modificar->fetch_array();
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Poder Judicial</title>
    <?php
    include("include/admin_head.php");
    ?>
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

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="admin_catalogo_encuesta.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Encuestas</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
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
                                            <h1 class="h4 text-gray-900 mb-4">Crear encuesta</h1>
                                        </div>
                                        <form class="user" action="scripts/encuesta_guardar.php" method="POST">
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                                    <label for="titulo" class="form-label">Título</label>
                                                    <input type="text" class="form-control form-select-user" name="titulo" 
                                                    id="titulo" placeholder="Título de la encuesta" 
                                                    value="<?php echo $datos['titulo']; ?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="anio" class="form-label">Periodo</label>
                                                    <select class="form-control form-select-user" name="anio" id="anio">
                                                        <?php if($encuesta_id) { ?>
                                                            <option selected><?php echo ($datos["anio"]); ?></option>
                                                        <?php } else { ?>
                                                            <option selected><?php echo date('Y'); ?></option>
                                                        <?php } ?>
                                                        <?php
                                                        while ($dataSelect = mysqli_fetch_array($datacat_status_aniosSelect)) { ?>
                                                            <option value="<?php echo $dataSelect["anio_nombre"]; ?>">
                                                                <?php echo ($dataSelect["anio_nombre"]); ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion" class="form-label">Ingresa una breve descripción</label>
                                                <textarea type="email" class="form-control" name="descripcion" 
                                                id="descripcion"><?php echo $datos['descripcion']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha_final" class="form-label">Fecha de Cierre </label>
                                                <?php 
                                                    if($datos['fecha_final']) { 
                                                        $fecha_final = date('Y-m-d', strtotime($datos['fecha_final'])); 
                                                    } else { 
                                                        $fecha_final = ""; } 
                                                ?>
                                                <input type="date" class="form-control form-select-user"
                                                        id="fecha_final" name="fecha_final"
                                                        value="<?php echo $fecha_final; ?>">
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
                                        <h1 class="h3 mb-2 text-gray-800">Listado de encuestas</h1>
                                        <p class="mb-4">En la siguiente tabla se lista las encuestas 
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
                                                                <th>Nombre</th>
                                                                <th>Periodo</th>
                                                                <th>Descripción</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Periodo</th>
                                                                <th>Descripción</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                                while ($dataSelect = mysqli_fetch_array($datacat_encuestaSelect)) { ?>
                                                            <?php $encuesta_id = $dataSelect["id"]; ?>
                                                                <tr>
                                                                    <td><?php echo $dataSelect["titulo"]; ?></td>
                                                                    <td><?php echo $dataSelect["anio"]; ?></td>
                                                                    <td><?php echo $dataSelect["descripcion"]; ?></td>
                                                                    <td class="btn-actions-container">
                                                                        <div class="btn-actions">
                                                                            <a href="?id=<?php echo $encuesta_id; ?>"><i class="fas fa-pen fa-sm btn-warning2"></i></a>
                                                                            <a href="scripts/eliminar_encuesta.php?id=<?php echo $encuesta_id; ?>"><i class="fas fa-trash fa-sm btn-danger2"></i></a>
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
                <!-- /.container-fluid -->
                </div>
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
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
    <!-- End of Page Wrapper -->
    <?php
        include("include/admin_scripts.php");
        include("include/datatable_es.php")
    ?>
</body>

</html>