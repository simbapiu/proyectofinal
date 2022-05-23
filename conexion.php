<?php

	// $conexion = mysqli_connect('localhost','root','');

	// class Conexion {

	// 	/*ATRIBUTOS*/
	// 	private $datos = array(
	// 		"host"=>"localhost",
	// 		"user"=>"root",
	// 		"pass"=>"",
	// 		"db"=>"registros"		
	// 	);
	// 	private $con;
	// 	/*CONSTRUCTOR*/
	// 	public function __construct(){
	// 		$this->con = new \mysqli(
	// 			$this->datos['host'],
	// 			$this->datos['user'],
	// 			$this->datos['pass'],
	// 			$this->datos['db']
	// 		);				
	// 	}

	// 	/*
	// 	* CON GET Y SET PROPIEDAD OBTIENES O ESTABLECES LOS ATRIBUTOS DE LA CLASE
	// 	*/

	// 	public function getPropiedad($atributo) { return $this->$atributo; }
	// 	public function setPropiedad($atributo, $valor) { $this->$atributo = $valor; }
		
	// 	/*
	// 	* CONSULTASIMPLE Y CONSULTASIMPLE2 SE UTILIZAN CUANDO HAY MODIFICACIONES
	// 	* EN LA BASE DE DATOS.
	// 	* CONSULTASIMPLE REGRESA EL NUMERO DE FILAS QUE FUERON AFECTADAS.
	// 	* CONSULTASIMPLE2 REGRESA EL ULTIMO ID INSERTADO CON AUTO_INCREMENT.
	// 	*/

	// 	public function consultaSimple($query){
	// 		$this->con->query("SET NAMES 'utf8'");
	// 		$this->con->query($query);
	// 		return $this->con->affected_rows;
	// 	}
	// 	public function consultaSimple2($query){
	// 		$this->con->query($query);
	// 		return $this->con->insert_id;
	// 	}

	// 	/*
	// 	* CONSULTASIMPLETRAN RECIBE UN ARREGLO DE STRING COMO CONSULTAS EN FORMATO SQL.
	// 	*/
		
	// 	public function consultaSimpleTran($query){
	// 	$this->con->query("SET NAMES 'utf8'") ;
	// 		$affected_rows_count = 0;
	// 		foreach ($query as $valQuery) {
	// 			$this->con->query($valQuery);	
	// 			$affected_rows_count = $affected_rows_count + 1;
	// 		}
	// 		return $affected_rows_count;
	// 	}
		
	// 	/*
	// 	* CONSULTA RETORNO TE DEVUELVE UN ARREGLO DEL SELECT QUE ENVIES
	// 	*/

	// 	public function consultaRetorno($query){
	// 		$this->con->query("SET NAMES 'utf8'");
	// 		$datos = $this->con->query($query);
	// 		return $datos;
	// 	}

	// 	//ejecuta procedimiento almacenado
	// 	//$query si es una inserción debes de incluir el select al parametro de salida
	// 	//utiliza fetch_row para obtener parametro de salida
	// 	// call procedimiento(values,@outputs); select @outputs as alias; index 0;
	// 	public function consultaRetorno2($query){
	// 		$this->con->query("SET NAMES 'utf8'");
	// 		$this->con->multi_query($query);
	// 		$datos = $this->con->store_result();
	// 		return $datos;
	// 	}
	// 	public function close(){
	// 		$this->con->close();
	// 	}
	// 	public function next_result(){
	// 		$this->con->next_result();
	// 	}
	// }

function conectar()
{
    $conexion=mysqli_connect("localhost","root","");
    mysqli_select_db($conexion,"bd_pj") or die ("Ninguna DB seleccionada");
    $conexion->set_charset("utf8");
    return $conexion;
}

function desconectar()
{
    mysqli_close(conectar());
}