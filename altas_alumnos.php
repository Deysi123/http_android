
<?php
	if(!($conexion=mysqli_connect('127.0.0.1', 'root','','escuela_prog_web')))die("Fallo en conexion!!!, error:".mysql_connect_error());

	//echo json_encode($conexion);//ver si hay conexion
	
	$respuesta=array();

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$cadena_json = file_get_contents('php://input'); //Recibe información por http guia POST, en este caso una cadena JSON

		$datos= json_decode($cadena_json, true); //Regresa vector

		$nc=$datos['num_control']; //variable recibida desde android, con ese nombre
		$n=$datos['nombre'];
		$pa=$datos['primer_ap'];
		$sa=$datos['segundo_ap'];
		$e=$datos['edad'];
		$s=$datos['semestre'];
		$c=$datos['carrera'];

		//agragar datos en base de datos
		$sql= "INSERT INTO alumnos VALUES('$nc','$n','$pa','$sa',$e,$s,'$c')";

		echo json_encode($sql);
		
		$resultado=mysqli_query($conexion,$sql);

		if ($resultado) {
			$respuesta['exito']=1;
			$respuesta['msj']="Inserccion correcta";
			echo json_encode($respuesta);
		} else {
			$respuesta['exito']=0;
			$respuesta['msj']="Error en la insercion";
			json_encode($respuesta);
		}
		
	}
?>
