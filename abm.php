<html>
	<head>
		<!-- de acuerdo al contenido de la variable "accion", escribimos el título -->
		<?php
		if ($_GET["accion"] == "alta"){
		?>
			<title> Alta de registro</title>
		<?php
		}
		if ($_GET["accion"] == "baja"){
		?>
		<title>Baja en la agenda</title>
		<?php
		}
		if ($_GET["accion"] == "modificacion"){
		?>
			<title>Modificaci&oacute;n en agenda</title>
		<?php }?>
	</head>

	<body>

		<?php
			// Acá mostramos la pantalla de carga de ALTAS.
			if ($_GET["accion"] == "alta")
			{ 
		?>
				
				
				<h1>Agregar un registro</h1>
				<br>				
				<FORM ACTION="abm.php" METHOD="GET">
					<label>Nombre
					<INPUT TYPE="TEXT" NAME="txtname">
					</label>
					<BR>
					<BR>
					<INPUT TYPE="submit" NAME="OK">
					<INPUT TYPE="hidden" NAME="accion" VALUE="realizar_alta">
				</FORM>

				<br><a href="/">Volver a la agenda</a>
			
			
			<?php
				exit();
			}
			?>

		<?php
			// Acá, en base a los datos recibidos los datos y hacemos el alta.
			if ($_GET["accion"] == "realizar_alta")
			{
				include("sql.php");

				$name = $_GET["txtname"];
				alta ($name);
		?>
				
				
			<br><a href="/abm">Volver a la agenda</a>
				
		<?php
			}
		?>

		<?php
			//Acá solicitamos el ID para poder modificar el registro.
			if ($_GET["accion"] == "modificacion")
			{
				include("sql.php");
				$id = $_GET['id'];

				$conexion=conectarse();
		
				$consulta = "select * from personas WHERE id = $id";
				
				$result= mysqli_query($conexion,$consulta);
				
				$persona = mysqli_fetch_array($result);
				
				
				print_r($persona);
				die();
				
				
		?>
				<h1>Modificar un registro</h1>
				<br>
				<FORM ACTION="abm.php" METHOD="GET">
					ID: 
				<INPUT TYPE="TEXT" NAME="txt_id" value="<?php echo $persona['id'];?>"><BR>
					Nombre: <INPUT TYPE="TEXT" NAME="txt_nombre" value="<?php echo $persona['nombre'];?>"><BR>	
					<INPUT TYPE="hidden" NAME="accion" VALUE="datos_modificacion">
				</FORM>

				<br>
				<a href="/">Volver a la agenda</a>
				
		<?php
				exit();
			}
		?>


		<?php
			// Acá, en base al ID recibido, pedimos los datos para MODIFICAR.
			if ($_GET["accion"] == "datos_modificacion")
			{
				include("sql.php");
			
				$id = $_GET["txt_id"];
				$nombre = $_GET["txt_nombre"];
				modificacion($id,$nombre);
				
			?>
				
				<h1>Registro Modificado</h1>
				<br>
				<a href="/abm">Volver a la agenda</a>
			
		<?php
			exit();
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la modificación.
			if ($_GET["accion"] == "realizar_modificacion")
			{
				include("sql.php");

                $id = $_GET["id"];
				$name = $_GET["txtname"];

				modificacion($id, $name);
		?>
		
		<br><a href="/">Volver a la agenda</a>
		<?php
		}
		?>

		<?php
			// Acá mostramos la pantalla de carga de BAJAS.
			if ($_GET["accion"] == "baja")
			{
		?>
				<h1>Dar de baja un registro</h1>
				<br>
				<FORM ACTION="abm.php" METHOD="GET">
					ID: <INPUT TYPE="TEXT" NAME="txtId">
					<BR>
					<INPUT TYPE="hidden" NAME="accion" VALUE="realizar_baja">
				</FORM>
				
				<br>
				<a href="/">Volver a la agenda</a>
		
		<?php	
				exit();
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la baja.
			if ($_GET["accion"] == "realizar_baja")
			{
				include("sql.php");
				
				$id = $_GET["txtId"];
				
				baja($id);
				?>
				<br>
				<a href="/">Volver a la agenda</a>
		<?php
			}
		?>

	</body>
</html>