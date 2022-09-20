<html>
<head>
   <title>Ejemplo de PHP</title>
</head>
<body>
<H1>Ejemplo de uso de bases de datos con PHP y MySQL</H1>
<?php
   include("sql.php");
   
   $conexion=conectarse();
		
	$consulta = "select * from personas";
	
	$result = mysqli_query($conexion,$consulta);
?>
   
   <!-- Escribimos título de las tablas -->
   <TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1>
    <TR>
		<TD><b>ID</b></TD>
		<TD><b>NOMBRE</b></TD>
		<TD><b>acción</b></TD>
    </TR>

<?php
   //$fila["ID"] NO ES LO MISMO QUE $fila["id"] o que $fila["Id"]

   while($fila = mysqli_fetch_array($result)) {
	 ?>
	  <TR>
		<TD><?php echo $fila["ID"] ?></TD>
		<TD><?php echo $fila["NOMBRE"] ?></TD>
		<TD>
			<a href="baja.php?id=<?php echo $fila["ID"]; ?>">Borrar</a>
			<a href="modificacion.php?id=<?php echo $fila["ID"]; ?>">M</a>
		
		</TD>
	 </TR>
	 <?php
   }
   
   //liberamos memoria que ocupa la consulta...
   mysqli_free_result($result);
   
   //cerramos la conexión con el motor de BD
   mysqli_close($link);
?>

</table>

	<br>
	<br>
	
	<a href="abm.php?accion=alta">Agregar</a> <br>
	<a href="abm.php?accion=modificacion">Modificar</a> <br>
	<a href="abm.php?accion=baja">Borrar</a> <br>
	
</body>
</html>