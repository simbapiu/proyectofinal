<?php
include('conexion.php');

$login_usuario = $_POST['admin_usuario'];
$login_password = $_POST['admin_password'];

$consulta = "SELECT * FROM administrador WHERE admin_usuario='".$login_usuario."' AND admin_password='".$login_password."'";
$resultado = mysqli_query(conectar(),$consulta);
echo $consulta;

if ($filas = mysqli_fetch_row($resultado)) {
    session_start();
    //$_SESSION['admin_name']=$fila[1];

    header("location:on_admin.php");
} else {
    //header("location:admin.php");
    //echo $consulta;
    //include("admin.php");
    header("location: index.php");
?>
    <div class="alert alert-danger">ERROR</div>
<?php
}
mysqli_free_result($resultado);
desconectar();
?>