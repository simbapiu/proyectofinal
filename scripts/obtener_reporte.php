<?php
    include("../con_db.php");
    $respuestas = array();
    $respuestas_count = array();
    $sql = "SELECT respuesta,COUNT(*) FROM `respuestas_entrevista` WHERE valor <> 'comentarios' GROUP BY respuesta";
    $ejecutar = $con->query($sql);
    //echo json_encode($ejecutar->fetch_all());
    while ($datos = mysqli_fetch_array($ejecutar)) {
        $respuestas[] = $datos;
    }
    echo json_encode($respuestas);
?>
