<?php
include("../con_db.php");

$encuesta_titulo = $_POST['encuesta_titulo'];
$pregunta_titulo = $_POST['pregunta_titulo'];
$tipo = $_POST['tipo'];

if(isset($_POST['guardar'])) {
    $guardar_tipo = "INSERT INTO `tipo_preguntas`
        (`encuesta_titulo`, `pregunta_titulo`, `tipo`) VALUES (
            '$encuesta_titulo',
            '$pregunta_titulo',
            '$tipo')";
}

if(isset($_POST['modificar'])) {
    $id = $_POST['id'];

    $guardar_tipo = "UPDATE tipo_preguntas SET encuesta_titulo = '$encuesta_titulo', 
    pregunta_titulo = '$pregunta_titulo', tipo = '$tipo' WHERE id = $id";
}

if (mysqli_query($con, $guardar_tipo)) {
    header("Location: ../admin_tipo_preguntas.php");
} else {
    echo "Error: " . $guardar_tipo . "<br>" . mysqli_error($con);
}
mysqli_close($con);
