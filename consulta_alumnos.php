<?php
	if(!($conexion=mysqli_connect('127.0.0.1', 'root','','escuela_prog_web')))die("Fallo en conexion!!!, error:".mysql_connect_error());

	//echo json_encode($conexion);//ver si hay conexion

	$respuesta=array();

	if ($_SERVER['REQUEST_METHOD']=='POST') {

		$cadena_json = file_get_contents('php://input'); //Recibe información por http guia POST, en este caso una cadena JSON

		$datos= json_decode($cadena_json, true); //Regresa dato

		$nc=$datos['num_control'];

		$sql="SELECT * FROM alumnos WHERE Num_Control='$nc'";

		echo json_encode($sql);
		
		$resultado=mysqli_query($conexion,$sql);

		if ($resultado) {
			$respuesta['exito']=1;
			$respuesta['msj']="Busqueda correcta";
			echo json_encode($respuesta);
		} else {
			$respuesta['exito']=0;
			$respuesta['msj']="Busqueda incorrecta";
			json_encode($respuesta);
		}
	}

?>