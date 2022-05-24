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
    ?>
    <title>Reportes</title>
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
                    <span>Admin</span></div>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reportes
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="reportes_graficas.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Gráficas</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="reportes_tablas.php">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Tablas</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="reportes_variables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Variables</span></a>
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
                                        <!-- Page Heading -->
                                        <h1 class="h3 mb-2 text-gray-800">Listado de respuestas de las entrevistas</h1>
                                        <p class="mb-4">En la siguiente tabla se lista las respuestas de las entrevistas.</p>

                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Respuestas entrevistas</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Entrevista</th>
                                                                <th>Pregunta</th>
                                                                <th>Respuesta</th>
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
</body>

</html>