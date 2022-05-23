<?php
    include ("../con_db.php");

    $id = $_GET['id'];
    $eliminar_encuesta = "DELETE FROM encuestas WHERE id = '$id'";

    if (mysqli_query($con, $eliminar_encuesta)) {
        header("location: ../admin_catalogo_encuesta.php");
    }else {
        echo "Error: " . $eliminar_encuesta . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
?>