<?php
    if (isset($_POST)) {
        include ('../con_db.php');

        $comentarios = $_POST['comentarios'];
        $folio = $_POST['folio'];

        if(isset($_POST['guardar'])) {
          $mensaje = 'Puede continuar donde se quedó en cualquier momento.';
          $guardar_resultado = "UPDATE respuestas_entrevista SET respuesta = '$comentarios' WHERE entrevista_folio = '".$folio."' AND pregunta_id = 0";
        }

        if(isset($_POST['finalizar'])) {
          $mensaje = 'Enviado!, gracias por responder esta entrevista.';
          $guardar_resultado = "UPDATE resultados SET estatus = 'cerrado' WHERE folio = $folio";
        }

        $sqlGuardar = $con->query($guardar_resultado);
        if ($sqlGuardar) {
            session_start();
            $_SESSION['mensaje'] = $mensaje;
            header("location: ../entrevista_enviada.php");
        } else {
            echo "Error al guardar: " . $guardar_resultado . "<br>" . mysqli_error($con);
        }
        mysqli_close($con);
    }
?>