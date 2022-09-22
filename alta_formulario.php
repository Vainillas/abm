<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
</head>

<body>
    <?php
    require "persistance/equipos_repository.php";

    $repo = new equipos_repository();

    $id = "";
    $nombre = "";
    $pais = "";
    $fecha = "";
    $modificar = false;
    if (isset($_GET['id'])) {

        $equipo = $repo->recuperarEquipo($_GET['id']);
        $nombre = $equipo['1'];
        $pais = $equipo['2'];
        $fecha = $equipo['3'];
        $id = $_GET['id'];
        $modificar = true;
    } else if (isset($_POST['nombre']) && $_POST['modificar'] == false) {
        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $fecha = $_POST['fecha'];
        $repo->insertar($nombre, $pais, $fecha);
    } elseif (isset($_POST['nombre']) && $_POST['modificar'] == true) {
        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];
        $repo->modificar($id, $nombre, $pais, $fecha);
    }

    $resultado = $repo->listar();

    ?>
    <form action="alta_formulario.php" method="POST" style="padding:20px; width:700px">
        <legend>Datos del equipo</legend>
        <div class="form-group">
            <label for="nombre"> Nombre del equipo </label>
            <br>
            <input name="nombre" type="text" required class="form-control" value=<?= $nombre ?>>
        </div>
        <div class="form-group">
            <label for="pais"> País de origen </label>
            <br />
            <input name="pais" type="text" class="form-control" value=<?= $pais ?>>
        </div>
        <div class="form-group">
            <label for="fecha"> Fecha de creación</label>
            <br />
            <input name="fecha" type="date" class="form-control" value=<?= $fecha ?>>
        </div>
        <div class="form-group">
            <input hidden="true" name="id" value=<?= $id ?>>
        </div>
        <div class="form-group">
            <input hidden="true" name="modificar" value=<?= $modificar ?>>
        </div>
        <div class="form-group" style="width:80px">
            <input type="submit" class="form-control" value="Guardar" />
        </div>
    </form>
    <table class="table" style="">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">País de origen</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Eliminar/Modificar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($resultado) > 0) {

                foreach ($resultado as $equipito) { ?>
                    <tr>
                        <th><?= $equipito->id ?></th>
                        <td><?= $equipito->nombre ?></td>
                        <td><?= $equipito->pais ?></td>
                        <td><?= $equipito->fecha_creacion ?></td>
                        <td>
                            <a href="baja.php?id=<?= $equipito->id ?>"><i class="fa-solid fa-trash text-danger"></i></a>
                            <a href="alta_formulario.php?id=<?= $equipito->id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                <?php

                }
            } else {
                ?>
                <p> NO HAY REGISTROS </p>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    mysqli_close($repo->conn);
    ?>
</body>


</html>