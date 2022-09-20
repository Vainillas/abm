<html>

<head></head>

<body>
    <?php
    #require "oo/UsuarioRepository.php";

    #$repo = new UsuarioRepository();

    $link = new mysqli("localhost", "root", "", "practicaproyecto");
    $nombre = "";
    $pais = "";
    $fecha = "";
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $fecha = $_POST['fecha'];
        $consulta = "INSERT INTO equipos (nombre, pais, fecha_creacion) 
        VALUES ('$nombre','$pais','$fecha')";
        mysqli_query($link, $consulta);
        #$repo->conectar();
        #mysqli_query($repo->conn, $consulta);
    } else {
    }
    ?>
    <form action="alta_formulario.php" method="POST">
        <div style="
          padding: 5px;
          margin: 30%;
          background-color: whitesmoke;
          border-radius: 10px;
        ">
            <fieldset>
                <legend>Datos del equipo</legend>
                <label for="nombre"> Nombre del equipo </label>
                <br />
                <input name="nombre" type="text" value="<?php echo $nombre ?>" />
                <br />
                <label for="pais"> País de origen </label>
                <br />
                <input name="pais" type="text" />
                <br />
                <label for="fecha"> Fecha de creación</label>
                <br />
                <input name="fecha" type="date" />
                <br />
                <input type="submit" />
            </fieldset>
        </div>
    </form>
</body>
<?php
mysqli_close($link);
?>

</html>