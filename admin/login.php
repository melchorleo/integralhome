<?php
session_start();
$url_base ="http://localhost/integralhomemx/admin/";

if ($_POST) {
  if ($_POST['usuario'] == "Admin" && ($_POST['contrasenia'] == "123456")) {

    //Aqui guardamos la variable de sesion
    $_SESSION['usuario'] = "Admin";

    //Reedireccionamos al usuario con header
    header("location:index.php");

    echo "Logueado, OK";
  } else {
    echo "<script> alert('Usuario o contraseña incorrecta, contacte al administrador del sistema.');</script>";
  }
}
?>


<!doctype html>
<html lang="es">

<head>
  <title>Acceso</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<br />


<body class="container">
<div >
  <div class="row">
    <div class="col-md-4">
    </div>

    <div class="col-md-4">

      <div class="card">
        <div class="card-header">
          Iniciar Sesion
        </div>
        <div class="card-body">

          <form action="login.php" method="post">
            Usuario:<input type="text" class="form-control" name="usuario" id=""><br />
            Contraseña:<input type="password" class="form-control" name="contrasenia" id=""><br />
            <button class="btn btn-success" type="submit">Entrar al administrador</button>
          </form>

        </div>
        <div class="card-footer text-muted">

        </div>
      </div>



    </div>



    <div class="col-md-4">
    </div>

  </div>

</div>
</body>

</html>