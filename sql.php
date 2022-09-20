<?php
	function conectarse()
	{//inttroducimos los datos de  host que son "Server", "usuario" y "contraseña" 
		$link = mysqli_connect('localhost','root','root','proyecto');
	
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Error al Conectar con MySQL: " . mysqli_connect_error();
			return 0;
		}else{
			return $link;
		
		}
	}
	//--------------------------
	function alta ($name)
	{
		$conexion = conectarse();

		if (!$conexion)
		{
			echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
			exit();
		}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "INSERT INTO personas (nombre) VALUES ('$name')";

		echo $consulta;

		$resultado=mysqli_query($conexion,$consulta);

		//cerramos la conexión con el motor de BD
		mysqli_close($conexion);
	}

	//--------------------------

	function baja ($id)
	{
		$conexion = conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de baja. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "DELETE FROM personas WHERE id = $id";

		echo $consulta . "<BR>";

		$resultado=mysqli_query($conexion,$consulta);

		//echo "Resultado de la operaci&oacute;n: " . $resultado;

		//cerramos la conexión con el motor de BD
		mysqli_close($conexion);

	}

	//--------------------------

	function modificacion ($id, $name)
	{
		$conexion = conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.

		$consulta = "UPDATE personas SET nombre = '$name' ";
        $consulta .= "WHERE id = $id";

		echo $consulta;

		$resultado=mysqli_query($conexion,$consulta);

			//cerramos la conexión con el motor de BD
		mysqli_close($conexion);
	}

?>