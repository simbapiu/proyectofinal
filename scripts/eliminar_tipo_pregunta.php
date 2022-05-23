<?php
    include ("../con_db.php");

    $id = $_GET['id'];
    $eliminar_tipo_pregunta = "DELETE FROM tipo_preguntas WHERE id = '$id'";

    if (mysqli_query($con, $eliminar_tipo_pregunta)) {
        header("location: ../admin_tipo_preguntas.php");
    }else {
        echo "Error: " . $eliminar_tipo_pregunta . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
?>