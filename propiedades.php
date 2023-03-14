<?php
include("admin/bd.php");

$sentencia = $conexion->prepare("SELECT id_propiedad, galeria, titulo, metros_construidos, precio, direccion, estacionamientos, sanitarios FROM tbl_propiedades ORDER BY id_propiedad DESC");
$sentencia->execute();
$lista_propiedades = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($lista_propiedades);
?>

<!doctype html>
<html lang="es">

<head>
  <title>Propiedades - Integral Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Integral Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin/index.php">Contacto</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="admin/index.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Iniciar Sesion
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Acción</a></li>
            <li><a class="dropdown-item" href="#">Otra acción</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Algo más aquí</a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

  </header>
  <main>

  </main>


  <?php foreach ($lista_propiedades as $registros) { ?>
    <div class="container mt-5 border border-primary rounded">
      <div class="row">
        <div class="col-md-4">
          <img  width="280" src="admin/imagenes/<?php echo $registros['galeria'];?>" alt="100">
          
        </div>
        <div class="col-md-8">
          <h4 class="card-title mt-2"> <?php echo $registros['titulo'] ?></h4>
          <h5 class="mt-1">Venta:<?php echo " $". number_format( $registros['precio'],2)." MXN";?></h5>
          <h6><?php echo $registros['direccion']?></h6>
          <p>Estacionamiento:<?php echo " ".$registros['estacionamientos'];?></p>
          <p>Metraje:<?php echo " ".$registros['metros_construidos']." m² ";?></p>
          <p>Baños: <?php echo $registros['sanitarios'];?></p>
         
          <button class="btn btn-danger">Contactar</button>

        </div>
      </div>
    </div>

  <?php } ?>



  <footer>
    <!-- place footer here -->
  </br>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>