<?php
include('conexion.php');


if (
    strlen($_POST['nombre_encuesta']) > 1 && strlen($_POST['periodo_encuesta']) > 1
    && strlen($_POST['descripcion_encuesta']) > 1
) {
    $nombre_encuesta = trim($_POST['nombre_encuesta']);
    $periodo_encuesta = trim($_POST['periodo_encuesta']);
    $descripcion_encuesta = trim($_POST['descripcion_encuesta']);

    $consulta = "INSERT INTO encuesta(nombre_encuesta, periodo_encuesta, descripcion_encuesta) VALUES
     ('$nombre_encuesta','$periodo_encuesta','$descripcion_encuesta')";
    $resultado = mysqli_query($conexion, $consulta);
    if ($resultado) {
        header("location:on_admin.html");
    } else {
    ?>
        <h1>Error</h1>
<?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>