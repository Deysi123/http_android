<?php
/**
* 
*/
class conexion{

	$conexion;
	
	function __construct(){
		$this-->conectar();
	}

	function __destruct(){
		$this-->desconectar();
	}

	function conectar(){
		require_once(__DIR__.'configuracion_BD.php');//Establecer directotio y mandar llamar config_bd.php
		$this-->conexion=mysql_connect(host, user, password, db) or die(mysql_error());
		return this-->conexion;
	}

	function desconectar(){
		mysql_close($this-->conexion);
	}

}
?>