<?php
    if (isset($_POST)) {
        include ('../con_db.php');

        $folio = $_POST['folio'];
        $pregunta_id = $_POST['pregunta_id'];
        $opcion = $_POST['opcion'];
        $valor = $_POST['valor_seleccionado'];

        $sql = "SELECT * FROM respuestas_entrevista WHERE entrevista_folio='".$folio."' AND pregunta_id='".$pregunta_id."'";
        $resultado = $con->query($sql);
        $filaResultado = $resultado->fetch_array();
        if ($filaResultado[1] == $folio && $filaResultado[2] == $pregunta_id) {
            $id = $filaResultado[0];
            $guardar_resultado = "UPDATE respuestas_entrevista SET respuesta = '$opcion', valor = '$valor' WHERE id = $id";
        }
        else {
            $guardar_resultado = "INSERT INTO `respuestas_entrevista` (`entrevista_folio`, `pregunta_id`, `respuesta`, `valor`) VALUES ('$folio', '$pregunta_id', '$opcion', '$valor')";
        }
        $sqlGuardar = $con->query($guardar_resultado);
        if ($sqlGuardar) {
            echo "Respuesta guardada con éxito";
        } else {
            echo "Error al guardar: " . $sqlGuardar . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
    }
?>