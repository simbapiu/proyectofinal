<?php
    include ("../con_db.php");

    $titulo = $_POST['titulo'];
    $anio = $_POST['anio'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = date('Y-m-d H:i:s');

    if(isset($_POST['guardar'])) {
        $guardar_encuesta = "INSERT INTO `encuestas`
        (`titulo`, `anio`, `descripcion`, `estatus`, `fecha_inicio`, `oficina`) VALUES (
            '$titulo',
            '$anio',
            '$descripcion',
            'activo',
            '$fecha_inicio',
            'Adolecentes')";
    }

    if(isset($_POST['modificar'])) {
        $id = $_POST['id'];

        $guardar_encuesta = "UPDATE encuestas SET titulo = '$titulo', anio = '$anio', 
        descripcion = '$descripcion' WHERE id = $id";
    }
    
    $result  = mysqli_query($con, $guardar_encuesta);
    echo $result ? 'Ok' : 'Error: '.mysqli_error($conn);
    if ($result) {
        header("location: ../admin_catalogo_encuesta.php");
    }else {
        echo "Error: " . $insertar_encuesta . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
?>