<?php

require "persistance/equipos_repository.php";

$id =  $_GET['id'];

$repo = new equipos_repository();
$repo->eliminar($id);
$message = "El equipo con id $id ha sido eliminado.";
echo "<SCRIPT>
alert('$message')
window.location.replace('alta_formulario.php');
</SCRIPT>";
