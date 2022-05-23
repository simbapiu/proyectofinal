<?php
	ob_start();
	require_once('modelos.php');
	session_start();
	function setSession($valor) { $_SESSION['logFacilitador'] = $valor;}
	function getSession() { return $_SESSION['logFacilitador']; }
	function setSessionX($valor, $nombre) { $_SESSION[$nombre] = $valor; }
	function getSessionX($nombre) { return $_SESSION[$nombre]; }
	date_default_timezone_set("America/Mexico_City");
	if(isset($_GET['accion'])){
		$accion = $_GET['accion'];
		if ($accion == 'buscarFacilitador') {
			$objFacilitador = new Sucursal();
			$datos = $objFacilitador->lista();
			$resp = array();
			$listaFacilitador = array();
			while ($r = $datos->fetch_assoc()) {
				$listaFacilitador[] = array('id'=>$r['id'],'facilitador'=>$r['facilitadorl']);
			}
			$resp['resp'] = 1;
			$resp['facilitador'] = $listaFacilitador;
			echo json_encode($resp);
		}
		if ($accion == 'iniciarEncuesta') {
			$idFacilitador = $_GET['idFacilitador'];
			$objFacilitador = new Facilitador();
			$objFacilitador->estPropiedad('id',$idFacilitador);
			$datos = $objFacilitador->ver();
			$resp = array();
			if($datos->num_rows>0) {
				$resp['resp'] = 1;
				setSession($idFacilitador);
				$_SESSION['logFacilitador'] = $idFacilitador;
				header('location:encuesta.html');
				exit();
			}
			else{
				$resp['resp'] = -1;
				echo json_encode($resp);
			}
		}
		if($accion == 'validarSession'){
			if (isset($_SESSION['logFacilitador'])) {
				$resp['resp'] = 1;
				echo json_encode($resp);
			}
			else{
				$resp['resp'] = -1;
				echo json_encode($resp);	
			}
		}
		if ($accion == 'buscarPreguntas') {
			$objPregunta = new Pregunta();
			$datos = $objPregunta->lista();
			$resp = array();
			while ($r = $datos->fetch_assoc()) {
				$resp[] = $r['pregunta'];
			}
			echo json_encode($resp);
		}
		if ($accion == 'agregarEncuesta') {
			$respuestas = json_decode($_GET['jsonRespuestas']);
			$facilitador = $_SESSION['logFacilitador'];
			$fechaActual = date("Y-m-d");
			$resp = array();
			$objEncuesta = new Encuesta();
			$objEncuesta->estPropiedad('iDfacilitador',$facilitador);
			$objEncuesta->estPropiedad('fechaActual',$fechaActual);
			$idNuevaEncuesta = $objEncuesta->agregarEncuesta();
			for ($i=0; $i < count($respuestas); $i++) { 
				$objEncuesta = new Encuesta();
				$objEncuesta->estPropiedad('id',$idNuevaEncuesta);
				$objEncuesta->estPropiedad('iDpregunta',$respuestas[$i]->pregunta);
				$objEncuesta->estPropiedad('iDrespuesta',$respuestas[$i]->respuesta);
			 	$resp[] = $objEncuesta->agregarRespondeEncuesta();

			}
			$band = true;
			for ($i=0; $i < count($resp); $i++) { 
				if($resp[$i] != 1) $band = false;
			}
			echo json_encode($resp);
		}
		// if ($accion == 'buscarQuejas') {
		// 	$objQueja = new Queja();
		// 	$listaQuejas = array();
		// 	$resp = array();
		// 	$datos = $objQueja->lista();
		// 	while ($r = $datos->fetch_assoc()) {
		// 		$listaQuejas[] = array('id'=>$r['id'],'queja'=>$r['queja']);
		// 	}
		// 	$resp['resp'] = 1;
		// 	$resp['quejas'] = $listaQuejas;
		// 	echo json_encode($resp);
		// }
		// if($accion == 'nuevaQueja') {
		// 	$tipoQueja = 0;
		// 	$numeroTelefonico = 0;
		// 	$descripcion = '';
		// 	$sucursal = 0;
		// 	$empleado = '';
		// 	$mail = '';
		// 	$resp = array();
		// 	if(isset($_SESSION['logSucursal'])) { $sucursal = $_SESSION['logSucursal']; }
		// 	else { $sucursal = 0; }
		// 	if($sucursal > 0) {
		// 		if (isset($_GET['txtCategoria']) && isset($_GET['txtCategoria']) && isset($_GET['txtCategoria']) && isset($_GET['txtEmail']) && isset($_GET['txtNombreEmpleado'])) {
		// 			$tipoQueja = $_GET['txtCategoria'];
		// 			$numeroTelefonico = $_GET['txtTelefono'];
		// 			$descripcion = $_GET['txtDescripcion'];
		// 			$empleado = $_GET['txtNombreEmpleado'];
		// 			$mail = $_GET['txtEmail'];
		// 			$objQueja = new QuejaMain();
		// 			$objQueja->estPropiedad('id_tipo_queja',$tipoQueja);
		// 			$objQueja->estPropiedad('numeroTelefonico',$numeroTelefonico);
		// 			$objQueja->estPropiedad('descripcion',$descripcion);
		// 			$objQueja->estPropiedad('id_sucursal',$sucursal);
		// 			$objQueja->estPropiedad('fecha',date("Y-m-d"));
		// 			$objQueja->estPropiedad('empleado',$empleado);
		// 			$objQueja->estPropiedad('mail',$mail);
		// 			$r = $objQueja->agregar();
		// 			if($r > 1) {
		// 				header('location:respuesta.html');
		// 				exit();
		// 			}
		// 			else {
		// 				$resp['resp'] = -2; //no se dio de alta la nueva sucursal o algo adicional ocurrio
		// 				echo -2;
		// 			}
		// 		}
		// 	}
		// 	else {
		// 		$resp['resp'] = -1; // no se encontro sucursal
		// 		echo -1;
		// 	}
		// }
		if($accion == 'bucarFacilitadoresEncuestados') {
			$objQuejaMain = new QuejaMain();
			$resultado = $objQuejaMain->listarSucursalesEncuestadas();
			$sucursalesEncuestadas = array();
			while($r = $resultado->fetch_assoc()) {
				$resultado2 = $objQuejaMain->listarResultadoDeEncuestasPorSucursal($r['id_sucursal']);
				$respuestas = array();
				while ($r2 = $resultado2->fetch_assoc()) {
					$respuestas[] = $r2;
				}
				$sucursalesEncuestadas[] = array('id_sucursal'=>$r['id_sucursal'],'sucursal'=>$r['sucursal'],'respuestas'=>$respuestas);
			}
			echo json_encode($sucursalesEncuestadas);
		}
		if($accion == 'admin'){
			if(isset($_GET['clave'])){
				$clave = $_GET['clave'];
				if (((string)$clave) == 'sys') {
					$resp = array();
					$resp['resp'] = 1;
					echo json_encode($resp);
				}
				else {
					$resp = array();
					$resp['resp'] = -2;
					echo json_encode($resp);
				}
			}
			else{
				$resp = array();
				$resp['resp'] = -1;
				echo json_encode($resp);
			}
		}
		// if($accion=='buscarUltimaQueja') {
		// 	$objQuejaMain = new QuejaMain();
		// 	$ultimoId = 0;
		// 	$ultimoId = $objQuejaMain->verUltimaQueja();
		// 	$resp = array();
		// 	$resp['resp'] = $ultimoId;
		// 	echo json_encode($resp);
		// }

	}
	ob_end_flush();
?>