<?php
include("../con_db.php");

$encuesta_titulo = $_POST['encuesta_titulo'];
$pregunta_texto = $_POST['pregunta_texto'];
$tipo_result = $_POST['tipo_result'];
$pregunta_fecha_final = $_POST['pregunta_fecha_final'];
$encuesta_fecha_inicio = date('Y-m-d H:i:s');

$insertar_pregunta = "INSERT INTO `resultados`
    (`encuesta_titulo`, `pregunta_titulo`, `tipo_result`, `pregunta_fecha_inicio`, `pregunta_fecha_final`) VALUES (
        '$encuesta_titulo',
        '$pregunta_texto',
        '$tipo_result',
        '$encuesta_fecha_inicio',
        '$pregunta_fecha_final')";

if (mysqli_query($con, $insertar_pregunta)) {
    header("Location: ../admin_respuestas.php");
} else {
    echo "Error: " . $insertar_pregunta . "<br>" . mysqli_error($con);
}
mysqli_close($con);
