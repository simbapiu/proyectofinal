<?php
    include ("../con_db.php");

    $id = $_GET['id'];
    $eliminar_pregunta = "DELETE FROM preguntas WHERE id = '$id'";

    if (mysqli_query($con, $eliminar_pregunta)) {
        header("location: ../admin_catalogo_preg.php");
    }else {
        echo "Error: " . $eliminar_pregunta . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
?>