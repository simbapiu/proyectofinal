<?php
    if (isset($_POST) && isset($_POST['btnComenzar'])) {
        $captcha_cookie = $_COOKIE['captcha'];
        $captcha_user = $_POST['ciudadano_captcha'];
        $etapa = $_POST['etapa'];
        $facilitador = $_POST['facilitador'];
        $numero_folio = $_POST['numero_folio'];
        $periodo = $_POST['periodo'];
        $folio = $numero_folio . "" . $periodo;

        if ($captcha_cookie == sha1($captcha_user)) {
            include ('../con_db.php');
            $sql = "SELECT * FROM resultados WHERE folio = '$folio'";
            $resultado = $con->query($sql);
            $filaResultado = $resultado->fetch_array();
            session_start();
            $_SESSION['is_valid'] = true;
            if (($filaResultado[1] == $folio) && ($filaResultado[2] == $facilitador) && ($filaResultado[4] == $etapa) && ($filaResultado[5] == $periodo)) {
                $estatus = $filaResultado[6];
                if($estatus == 'publicado') {
                    header("location: ../entrevista.php?folio=$folio");
                } else {
                    header("location: ../index.php");
                }
            }
            elseif ($filaResultado == null) {
                $sql2 = "SELECT oficina FROM encuestas WHERE anio = '$periodo'";
                $resultado2 = $con->query($sql2);
                $filaEncuesta = $resultado2->fetch_array();
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
            else {
                header("location: ../index.php");
            }
        } else{
            header("location: ../index.php");
        }
    }
?>