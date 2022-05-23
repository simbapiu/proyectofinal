<?php
    if (isset($_POST) && isset($_POST['btnComenzar'])) {
        $captcha_cookie = $_COOKIE['captcha'];
        $captcha_user = $_POST['ciudadano_captcha'];
        $etapa = $_POST['etapa'];
        $facilitador = $_POST['facilitador'];
        $numero_folio = $_POST['numero_folio'];
        $periodo = $_POST['periodo'];
        $folio = $numero_folio . "" . $periodo;
        echo $folio;

        if ($captcha_cookie == sha1($captcha_user)) {
            include ('../con_db.php');
            $sql = "SELECT * FROM resultados WHERE folio = '$folio'";
            $resultado = $con->query($sql);
            $filaResultado = $resultado->fetch_array();
            session_start();
            $_SESSION['is_valid'] = true;
            if ($filaResultado[1] == $folio) {
                $estatus = $filaResultado[6];
                $_SESSION['estatus'] = $estatus;
                header("location: ../entrevista.php?folio=$folio");
            }
            else {
                $sql2 = "SELECT oficina FROM encuestas WHERE anio = '$periodo'";
                $resultado2 = $con->query($sql2);
                $filaEncuesta = $resultado2->fetch_array();
                echo "pasó2";
                $guardar_resultado = "INSERT INTO `resultados`
                (`folio`, `facilitador`, `oficina`, `etapa`, `periodo`, `estatus`) VALUES (
                    '$folio',
                    '$facilitador',
                    '$filaEncuesta[0]',
                    '$etapa',
                    '$periodo',
                    'publicado')";
                $sqlGuardar = mysqli_query($con, $guardar_resultado);
                echo $sqlGuardar ? 'Ok' : 'Error: '.mysqli_error($conn);
                if ($sqlGuardar) {
                    echo "paso4";
                    $_SESSION['estatus'] = 'publicado';
                    $_SESSION['etapa'] = $etapa;
                    $_SESSION['periodo'] = $periodo;
                    $_SESSION['facilitador'] = $facilitador;
                    header("location: ../entrevista.php?folio=$folio");
                } else {
                    echo "Error: " . $guardar_resultado . "<br>" . mysqli_error($con);
                }
                mysqli_close($con);
            }
        } else{
            header("location: ../index.php");
        }
    }
?>