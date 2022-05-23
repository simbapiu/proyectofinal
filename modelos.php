<?php

	require_once('conexion.php');
	/**
	* Facilitador
	*/
	class Facilitador {
		
		private $id;
		private $con;

		public function __construct(){
			$this->id = 0;
			$this->con = new Conexion();
		}

		public function obtPropiedad($atributo){
			return $this->$atributo;
		}
		
		public function estPropiedad($atributo, $valor){
			return $this->$atributo = $valor;
		}

		public function lista(){
			$consulta = "SELECT * FROM cat_facilitadores WHERE id < 82;";
			$data = $this->con->consultaRetorno($consulta);
			return $data;
		}

		public function ver(){
			$consulta = "SELECT * FROM cat_facilitadores WHERE id = '{$this->id}';";
			$data = $this->con->consultaRetorno($consulta);
			return $data;
		}
	}

	/**
	* Preguntas
	*/
	class Pregunta {
		
		private $id;
		private $con;

		public function __construct(){
			$this->id = 0;
			$this->con = new Conexion();
		}

		public function obtPropiedad($atributo){
			return $this->$atributo;
		}
		
		public function estPropiedad($atributo, $valor){
			return $this->$atributo = $valor;
		}

		public function lista(){
			$consulta = "SELECT * FROM pregunta;";
			$data = $this->con->consultaRetorno($consulta);
			return $data;
		}

		public function ver(){
			$consulta = "SELECT * FROM pregunta WHERE id = '{$this->id}';";
			$data = $this->con->consultaRetorno($consulta);
			return $data;
		}
	}

	/**
	* encuesta
	*/
	class Encuesta {
		
		private $id;
		private $iDfacilitador;
		private $fechaActual;
		private $iDrespuesta;
		private $iDpregunta;
		private $con;

		public function __construct(){
			$this->id = 0;
			$this->con = new Conexion();
		}

		public function obtPropiedad($atributo){
			return $this->$atributo;
		}
		
		public function estPropiedad($atributo, $valor){
			return $this->$atributo = $valor;
		}

		public function agregarEncuesta(){
			$consulta = "INSERT INTO encuesta (fecha, id_facilitador) VALUES('{$this->fechaActual}', '{$this->iDsucursal}');";
			$data = $this->con->consultaSimple2($consulta);
			return $data;
		}

		public function agregarRespondeEncuesta(){
			$consulta = "INSERT INTO responde_encuesta (id_encuesta,id_pregunta,id_respuesta) VALUES({$this->id},{$this->iDpregunta},{$this->iDrespuesta});";
			$data = $this->con->consultaSimple($consulta);
			return $data;
		}

		public function lista(){
			$consulta = "SELECT * FROM encuesta;";
			$data = $this->con->consultaRetorno($consulta);
			return $data;
		}

		public function ver(){
			$consulta = "SELECT * FROM encuesta WHERE id = '{$this->id}';";
			$data = $this->con->consultaRetorno($consulta);
			return $data;
		}
	}



	/**
	* tipo de Quejas
	*/
	// class Queja {
		
	// 	private $id;
	// 	private $con;

	// 	public function __construct(){
	// 		$this->id = 0;
	// 		$this->con = new Conexion();
	// 	}

	// 	public function obtPropiedad($atributo){
	// 		return $this->$atributo;
	// 	}
		
	// 	public function estPropiedad($atributo, $valor){
	// 		return $this->$atributo = $valor;
	// 	}

	// 	public function lista(){
	// 		$consulta = "SELECT * FROM tipo_queja;";
	// 		$data = $this->con->consultaRetorno($consulta);
	// 		return $data;
	// 	}

	// 	public function ver(){
	// 		$consulta = "SELECT * FROM tipo_queja WHERE id = '{$this->id}';";
	// 		$data = $this->con->consultaRetorno($consulta);
	// 		return $data;
	// 	}
	// }

	// /**
	// * QuejasMain
	// */
	// class QuejaMain {
		
	// 	private $id;
	// 	private $id_tipo_queja;
	// 	private $numeroTelefonico;
	// 	private $descripcion;
	// 	private $id_sucursal;
	// 	private $fecha;
	// 	private $empleado;
	// 	private $mail;
	// 	private $con;

	// 	public function __construct(){
	// 		$this->id = 0;
	// 		$this->id_tipo_queja = 0;
	// 		$this->numeroTelefonico = '';
	// 		$this->descripcion = '';
	// 		$this->id_sucursal = 0;
	// 		$this->fecha = '';
	// 		$this->empleado = '';
	// 		$this->mail = '';
	// 		$this->con = new Conexion();
	// 	}

	// 	public function obtPropiedad($atributo){
	// 		return $this->$atributo;
	// 	}
		
	// 	public function estPropiedad($atributo, $valor){
	// 		return $this->$atributo = $valor;
	// 	}

	// 	public function agregar() {
	// 		$consulta = "INSERT INTO queja (id_tipo_queja, numeroTelefonico, descripcion, id_sucursal,fecha,empleado, mail) VALUES('{$this->id_tipo_queja}','{$this->numeroTelefonico}','{$this->descripcion}','{$this->id_sucursal}','{$this->fecha}','{$this->empleado}','{$this->mail}');";
	// 		$r = $this->con->consultaSimple2($consulta);
	// 		$band = false;
	// 		$band = $this->enviaCorreoAtiende($r, $this->fecha, $this->descripcion, $this->empleado, $this->numeroTelefonico, $this->mail);
	// 		return $r;
	// 	}

	// 	public function enviaCorreoAtiende($ids, $fa, $obs, $emp, $numeroTelefono, $mail) {
	// 		//funcion correo
	// 		$destinatario = "sistemas@prendamexpuebla.com.mx, sistemas@prendamexpuebla.com.mx";
	// 		$asunto = "Solicitud de Area - Nueva queja";
	// 		$cuerpo = "
	// 		<html>
	// 		<head>
	// 		   <title>Solicitud de atención / petición de resolución de conflicto</title>
	// 		</head>
	// 		<body>
	// 		<h1>Se solicita apoyo para resolver una nueva queja.</h1>
	// 		<p><b>La información se detalla a continuación:</b></p>
	// 		</body>
	// 		</html>";

	// 		//para el envío en formato HTML
	// 		$headers = "MIME-Version: 1.0\r\n";
	// 		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	// 		$cuerpo .="<br>Número de queja: <h1><strong>". $ids ."</strong></h1><br>";
	// 		$cuerpo .="<br>Fecha de atencion: ".$fa."<br>";
	// 		$cuerpo .="<br>Número telefónico: ".$numeroTelefono."<br>";
	// 		$cuerpo .="<br>Mail: ".$mail."<br>";
	// 		$cuerpo .="<br>Sucursal: ".$this->devSucursalTck($ids)."<br>";
	// 		if(isset($emp)) $cuerpo .="<br>Empleado que estuvo involucrado: " . $emp . "<br>";
	// 		$cuerpo .="<br>Observaciones :<br>";
	// 		$cuerpo .="<br><p>".$obs."</p><br>";
	// 		$cuerpo .= "<h3>Se te recuerda que para conocer el status de tu queja solicitada, debes ingresar a la página <a href='http://www.prendamexpuebla.com.mx/tusQuejas.html'>http://www.prendamexpuebla.com.mx/misQuejas.html</a></h3><br>";
	// 		//dirección del remitente
	// 		$headers .= "From: Sistema de Quejas \r\n";
			
	// 		if(mail($destinatario,utf8_decode($asunto),utf8_decode($cuerpo),$headers) == true)
	// 		{
	// 			return true;
	// 		}
	// 		else
	// 		{
	// 			return false;
	// 		}
	// 	}


	// 	public function devSucursalTck($id) {
	// 		$sql_tck = $this->con->consultaRetorno("SELECT * FROM sucursal WHERE id = '". $id ."';");
	// 		while ($dts_tck = $sql_tck->fetch_array()) 
	// 		{	
	// 			return $dts_tck[1];	
	// 		}
	// 	}


	// 	public function lista(){
	// 		$consulta = "SELECT * FROM tipo_queja;";
	// 		$data = $this->con->consultaRetorno($consulta);
	// 		return $data;
	// 	}

	// 	public function ver(){
	// 		$consulta = "SELECT * FROM tipo_queja WHERE id = '{$this->id}';";
	// 		$data = $this->con->consultaRetorno($consulta);
	// 		return $data;
	// 	}

	// 	public function verUltimaQueja(){
	// 		$consulta = "SELECT MAX(id) as last_id FROM queja";
	// 		$data = $this->con->consultaRetorno($consulta);
	// 		if($r = $data->fetch_assoc()) return $r['last_id'];
	// 	}

		public function listarfacilitadoresEncuestados() {
			$consulta = "select t.id_facilitador, t.facilitador from (select facilitador.id as id_facilitador, facilitador.sucursal, respuesta.respuesta, count(id_respuesta) as tota "
							."from facilitador "
							."inner join encuesta "
							."on facilitador.id = encuesta.id_facilitador "
							."inner join responde_encuesta "
							."on encuesta.id = responde_encuesta.id_encuesta "
							."inner join respuesta "
							."on responde_encuesta.id_respuesta = respuesta.id "
							."group by facilitador,id_respuesta) as t group by t.facilitador;";
			$data = $this->con->consultaRetorno($consulta);
			return $data;
		}

		public function listarResultadoDeEncuestasPorFacilitador($id_facilitador = 0) {
			$consulta = "select t.id_facilitador, t.respuesta, t.total from (select facilitador.id as id_facilitador, facilitador.facilitador, respuesta.respuesta, count(id_respuesta) as total "
							."from facilitador "
							."inner join encuesta "
							."on facilitador.id = encuesta.id_facilitador "
							."inner join responde_encuesta "
							."on encuesta.id = responde_encuesta.id_encuesta "
							."inner join respuesta "
							."on responde_encuesta.id_respuesta = respuesta.id "
							."group by facilitador,id_respuesta) as t where t.id_facilitador = '{$id_facilitador}';";
			$data = $this->con->consultaRetorno($consulta);
			return $data;
		}
	}


?>

