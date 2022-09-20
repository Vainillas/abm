
<?php
   require "oo/UsuarioRepository.php";

   $repo = new UsuarioRepository();


   $username = "";
   $email = "";
   $nombre = "";
   $apellido = "";

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];

        $consulta = "INSERT INTO usuarios (username, email,nombre,apellido) 
        VALUES ('$username','$email','$nombre','$apellido')";
        
        mysqli_query($link, $consulta);
    }
   

    $resultado = $repo->listar();

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
    if (count($resultado) > 0) {
              
        foreach ($resultado as $usu) { ?>
        <TR>
		<TD><?= $usu->id ?></TD>
		<TD><?= $usu->username ?></TD>
        <TD><?= $usu->nombre?></TD>
        <TD><?= $usu->cantidad_partidos ?></TD>
		<TD>
			<a href="baja.php?id=<?= $usu->id ?>">Borrar</a>
			<a href="modificacion.php?id=<?= $usu->id ?>">M</a>
		</TD>
	 </TR>

<?php

        }
      } else {
        ?>
        <p> NO HAY REGISTROS </p>
        <?php
      }
?>

</table>