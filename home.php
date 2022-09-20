<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

</head>

<body>


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

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>


        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <h1>Hello, world!</h1>

    <div class="row">
      <div class="col-4">
        <form action="home.php" method="POST">
          <div class="mb-3">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="inputUsername" placeholder="Nicolas" name="username" value="<?php echo $username ?>">

          </div>
          <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Apellido" name="email" value="<?php echo $email ?>">

          </div>
          <div class="mb-3">
            <label for="inputNombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="inputNombre" placeholder="@nick" name="nombre" value="<?php echo $nombre ?>">

          </div>
          <input type="submit" class="btn btn-primary btn-sm" value="guardar">
          <div class="toast-container position-fixed bottom-0 end-0 p-3">

            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                <div class="spinner-border text-primary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>

      <div class="col">
        <table class="table caption-top">
          <caption>List of users</caption>
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">username</th>
              <th scope="col">nombre</th>
              <th scope="col">email</th>
              <th>acciones</th>
            </tr>
          </thead>
          <tbody id="tabla">
            <?php
            if (count($resultado) > 0) {

              foreach ($resultado as $usu) { ?>
                <TR>
                  <TD><?= $usu->id ?></TD>
                  <TD><?= $usu->username ?></TD>
                  <TD><?= $usu->nombre ?></TD>
                  <TD><?= $usu->cantidad_partidos ?></TD>
                  <TD>
                    <a href="baja.php?id=<?= $usu->id ?>"><i class="fa-solid fa-trash text-danger"></i></a>
                    <a href="modificacion.php?id=<?= $usu->id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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
          </tbody>
        </table>

      </div>

    </div>

  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>

<script>
  const toastTrigger = document.getElementById('liveToastBtn');
  const toastLiveExample = document.getElementById('liveToast');
  if (toastTrigger) {
    toastTrigger.addEventListener('click', () => {
      const toast = new bootstrap.Toast(toastLiveExample);

      toast.show();
    })
  }

  var usuarios = [];

  function agregarUsuario() {
    listarUsuarios();
  }

  function listarUsuarios() {
    let tabla = $('#tabla');

    tabla.getC.forEach(r => document.removeChild(r))
    usuarios.forEach(element => {

    });
  }

  $(document).ready(function() {



  });
</script>