<?php
include("../con_db.php");

$encuesta_titulo = $_POST['encuesta_titulo'];
$titulo = $_POST['titulo'];
$variable = $_POST['variable'];

if(isset($_POST['guardar'])) {
    $guardar_pregunta = "INSERT INTO `preguntas`
        (`encuesta_titulo`, `titulo`, `variable`) VALUES (
            '$encuesta_titulo',
            '$titulo',
            'prueba')";
}

if(isset($_POST['modificar'])) {
    $id = $_POST['id'];

    $guardar_pregunta = "UPDATE preguntas SET encuesta_titulo = '$encuesta_titulo', 
    titulo = '$titulo', variable = '$variable' WHERE id = $id";
}

if (mysqli_query($con, $guardar_pregunta)) {
    header("Location: ../admin_catalogo_preg.php");
} else {
    echo "Error: " . $guardar_pregunta . "<br>" . mysqli_error($con);
}
mysqli_close($con);
