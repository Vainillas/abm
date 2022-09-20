
<?php

    $link = mysqli_connect('localhost','root','root','proyecto');

    $username = '';
    $email = '';
    $nombre = '';
    $apellido = '';

    if (isset($_POST['username'])) {
        print_r($_POST);
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        $consulta = "INSERT INTO usuarios (username, email,nombre,apellido) 
        VALUES ('$username','$email','$nombre','$apellido')";
        
        mysqli_query($link, $consulta);
    }
   

    $consulta = "SELECT * FROM usuarios";

    $resultado = mysqli_query($link, $consulta);

?>


<form action="index.php" method="POST">
    <input type="text" name="username" value="<?php echo $username ?>">
    <input type="text" name="email" value="<?php echo $email ?>">
    <input type="text" name="nombre" value="<?php echo $nombre ?>">
    <input type="text" name="apellido" value="<?php echo $apellido ?>">
    <input type="submit" value="alta" >
</form>

<table>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>nombre</th>
        <th>email</th>
        <th>acciones</th>
    </tr>
<?php
   while($fila = mysqli_fetch_array($resultado)) {
	 ?>
	  <TR>
		<TD><?php echo $fila["id"] ?></TD>
		<TD><?php echo $fila["username"] ?></TD>
        <TD><?php echo $fila["nombre"] ?></TD>
        <TD><?php echo $fila["email"] ?></TD>
		<TD>
			<a href="baja.php?id=<?php echo $fila["id"]; ?>">Borrar</a>
			<a href="modificacion.php?id=<?php echo $fila["id"]; ?>">M</a>
		</TD>
	 </TR>
	 <?php
   }
 //liberamos memoria que ocupa la consulta...
 mysqli_free_result($resultado);
   
 //cerramos la conexión con el motor de BD
 mysqli_close($link);
?>

</table>