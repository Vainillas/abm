<a href="index.php">home</a>
<?php

require "oo/db.php";

$id =  $_GET['id'];


$db = new Db();

$db->conectar();

$link = mysqli_connect('localhost','root','root','proyecto');

$consulta = "DELETE FROM usuarios WHERE id=$id";

$resultado = mysqli_query($link, $consulta);
echo $resultado;
echo "CHAUUUUUU $id";
?>

