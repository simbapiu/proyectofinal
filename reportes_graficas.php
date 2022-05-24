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
            <li class="nav-item active">
                <a class="nav-link" href="reportes_graficas.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Gráficas</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
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
                                        <div class="text-center">
                                            <!-- Page Heading -->
                                            <h1 class="h3 mb-2 text-gray-800">Reportes</h1>
                                            <p class="mb-4">En las siguientes gráficas se muestra el conteo de las respuestas en todas las entrevistas.</p>

                                            <!-- Content Row -->
                                            <center>
                                                <!-- Area Chart -->
                                                <div class="col-xl-auto col-lg-auto">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header py-3">
                                                            <h5 class="m-0 font-weight-bold text-primary">Respuestas</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="chart-bar">
                                                                <canvas id="myChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                        <!-- End txt center -->
                                    </div>
                                    <!-- End p5 -->
                                </div>
                                <!-- End col -->
                            </div>
                            <!-- End card-body -->
                        </div>
                        <!-- End card -->
                    </div>
                    <!-- End container -->
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
    <script>
        window.onload = function (){
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';
            Chart.defaults.global.defaultFontSize = 16;

            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    datasets: [{
                        label: '# De respuestas enviadas',
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            let url = 'http://localhost/proyectofinal/scripts/obtener_reporte.php';
            fetch(url)
                .then( response => response.json() )
                .then( datos => mostrar(datos) )
                .catch( error => console.log(error) )

            const mostrar = (respuestas_entrevista) =>{
                respuestas_entrevista.forEach(element => {
                    myChart.data['labels'].push(element[0]);
                    myChart.data['datasets'][0].data.push(element[1]);
                });
                myChart.update();
                myChart.render();
            }            
        }
    </script>
</body>

</html>