<?php
$url_base ="http://localhost/integralhomemx/admin/";
include("bd.php");
include("templates/header.php");

$sentencia = $conexion -> prepare("SELECT * FROM `tbl_tipo_inmueble`");
$sentencia -> execute();
$lista_tipo_inmueble = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
//print_r($lista_tipo_inmueble);


if($_POST){
    
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion =(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $tipo_inmueble= (isset($_POST['tipo_id']))?$_POST['tipo_id']:"";
    $recamaras =(isset($_POST['habitaciones']))?$_POST['habitaciones']:"";
    $num_estacionamiento =(isset($_POST['estacionamientos']))?$_POST['estacionamientos']:"";
    $sanitarios =(isset($_POST['sanitarios']))?$_POST['sanitarios']:"";
    $precio =(isset($_POST['precio']))?$_POST['precio']:"";
    $precio_mantenimiento =(isset($_POST['mantenimiento']))?$_POST['mantenimiento']:"";
    $m2Contruidos =(isset($_POST['construidos']))?$_POST['construidos']:"";
    $terreno =(isset($_POST['terreno']))?$_POST['terreno']:"";
    $direccion =(isset($_POST['direccion']))?$_POST['direccion']:"";
    $urlvideo =(isset($_POST['urlvideo']))?$_POST['urlvideo']:"";

    $galeria = (isset($_POST['galeria']))?$_POST['galeria']:"";
    $tipo_operacion=(isset($_POST['id_tipo_operacion']))?$_POST['id_tipo_operacion']:"";
    ///$fecha = new DataTime();
   // $galeria = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];
    //move_uploaded_file($imagen_temporal,"imagenes/".$imagen);

    $anio_construccion = (isset($_POST['anio_construccion']))?$_POST['anio_construccion']:"";

    $estado = (isset($_POST['estado_id']))?$_POST['estado_id']:"";

    $sentencia = $conexion ->prepare("INSERT INTO `tbl_propiedades` (`id_propiedad`, `titulo`, `descripcion`, `id_tipo_inmueble`, `habitaciones`, `estacionamientos`, `sanitarios`, `precio`, `precio_mantenimiento`, `metros_construidos`, `metros_terreno`, `direccion`, `url_video`, `galeria`, `id_tipo_operacion`, `anio_construccion`, `estado_id`, `municipio_id`, `colonia_id`, `usuario_id`, `fecha_alta`) VALUES (NULL, :titulo, :descripcion, :tipo_id, :habitaciones, :estacionamientos, :sanitarios, :precio, :mantenimiento, :construidos, :terreno, :direccion, :urlvideo, :galeria, :id_tipo_operacion, :anio_construccion,:estado_id, NULL,NULL,NULL,NULL )");

    $sentencia->bindParam(":titulo",$titulo);
    $sentencia -> bindParam(":descripcion",$descripcion);
   // $sentencia -> bindParam(":id_tipo_inmueble", $lista_tipo_inmueble);
    $sentencia -> bindParam(":tipo_id",$tipo_inmueble);
    $sentencia -> bindParam(":habitaciones",$recamaras);
    $sentencia -> bindParam(":estacionamientos",$num_estacionamiento);
    $sentencia -> bindParam(":sanitarios",$sanitarios);
    $sentencia -> bindParam(":precio",$precio);
    $sentencia -> bindParam(":mantenimiento",$precio_mantenimiento);
    $sentencia -> bindParam(":construidos",$m2Contruidos);
    $sentencia -> bindParam(":terreno",$terreno);
    $sentencia -> bindParam(":direccion",$direccion);
    $sentencia -> bindParam(":urlvideo",$urlvideo);
    $sentencia -> bindParam(":galeria",$galeria);
    $sentencia -> bindParam(":id_tipo_operacion",$tipo_operacion);

    $sentencia -> bindParam(":anio_construccion",$anio_construccion);
    $sentencia -> bindParam(":estado_id", $estado);
    $sentencia->execute();

    /*$tipo_inmueble = (isset($_POST['tipo_inmueble']))?$_POST['tipo_inmueble']:"";
    $sql = $conexion ->prepare("INSERT INTO `tbl_tipo_operacion` (`id`, `nombre_operacion`) VALUES (NULL, :tipo_inmueble)");
    $tipo_inmueble ->execute();*/

    header("Location:index.php");
}

?>

<br/>
<div class="card">
    <div class="card-header">
        Crear Propiedad
    </div>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data"  class="row">
  

      

        <div class="col-12">
          <label for="titulo" class="form-label">Titulo Propiedad</label>
          <input type="text"
            class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Departamento en la Colonia del Valle" required>
        </div>

        <div class="col-12 mt-3">
          <label for="descripcion" class="form-label">Descripcion</label>
          <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Hermoso departamento en la colonia del valle.."></textarea>
        </div>

        <!--
        <div class="mb-3">
          
            <label for="tipo_inmueble" class="form-label">Tipo de inmueble</label>

            
            <select class="form-select form-select-lg" name="tipo_inmueble" id="tipo_inmueble">
            <option selected>Elija uno</option>
            <?php foreach($lista_tipo_inmueble as $registros){ ?>
                <option value="<?php echo $registros['nombre'];?>"> <?php echo $registros['nombre'];?> </option>
          <?php } ?>
          </select>
        </div>
            -->
            <div class="col-3 mt-3">
     <label for="precio" class="form-label">Precio venta / renta</label>
     <input type="text"
       class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="1000000">
   </div>

   <div class="col-3 mt-3">
     <label for="habitaciones" class="form-label">Recámaras</label>
     <input type="text"
       class="form-control" name="habitaciones" id="habitaciones" aria-describedby="helpId" placeholder="0">
   </div>

   <div class="col-3 mt-3">
     <label for="estacionamientos" class="form-label">Estacionamientos</label>
     <input type="text"
       class="form-control" name="estacionamientos" id="estacionamientos" aria-describedby="helpId" placeholder="0">
     
   </div>

   <div class="col-3 mt-3">
     <label for="sanitarios" class="form-label">Baños</label>
     <input type="text"
       class="form-control" name="sanitarios" id="sanitarios" aria-describedby="helpId" placeholder="0">
   </div>

   

<div class="col-3 mt-3">
  <label for="mantenimiento" class="form-label">Mantenimiento</label>
  <input type="text"
    class="form-control" name="mantenimiento" id="mantenimiento" aria-describedby="helpId" placeholder="0">

</div>

<div class="col-3 mt-3">
  <label for="construidos" class="form-label">m2 construidos</label>
  <input type="text"
    class="form-control" name="construidos" id="construidos" aria-describedby="helpId" placeholder="100">
</div>

<div class="col-3 mt-3">
  <label for="terreno" class="form-label">m2 Terreno</label>
  <input type="text"
    class="form-control" name="terreno" id="terreno" aria-describedby="helpId" placeholder="0">
  
</div>

<div class="col-3 mt-3">
  <label for="anio_construccion" class="form-label">Año Construccion</label>
  <input type="text"
    class="form-control" name="anio_construccion" id="anio_construccion" aria-describedby="helpId" placeholder="2023">
  
</div>

<div class="col-12 mt-3">
  <label for="direccion" class="form-label">Calle y Numero</label>
  <input type="text"
    class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="Benito Jaurez #250">
</div>


<div class="col-2 mt-3">
        <label for="id_tipo_operacion" class="form-label">Tipo de Operacion</label>
        <select class="form-select form-select-lg" name="id_tipo_operacion" id="id_tipo_operacion">
          <option selected>Elija uno</option>
          <option value="1">Venta</option>
          <option value="2">Renta</option>
          <option value="3">Preventa</option>
        </select>
      </div>


<div class="col-3 mt-3">
  <label for="tipo_id" class="form-label">Tipo Inmueble</label>
  <select class="form-select form-select-lg" name="tipo_id" id="tipo_id">
    <option selected>Elija uno</option>
    <option value="1">Departamento</option>
    <option value="2">Casa</option>
    <option value="3">Terreno</option>
  </select>
</div>

<div class="col-3 mt-3">
  <label for="estado_id" class="form-label">Estado</label>
  <select class="form-select form-select-lg" name="estado_id" id="estado_id">
    <option selected>Elija Uno</option>
    <option value="1">Jalisco</option>
    <option value="2">Ciudad de Mexico</option>
    <option value="3">Morelos</option>
  </select>
</div>

<div class="col-12 mt-3">
  <label for="urlvideo" class="form-label">URL Video</label>
  <input type="text"
    class="form-control" name="urlvideo" id="urlvideo" aria-describedby="helpId" placeholder="https://youtube.com/video">
 
</div>



<div class="col-12 mt-3">
  <label for="galeria" class="form-label">Galeria</label>
  <input type="file"
    class="form-control" name="galeria" id="galeria" aria-describedby="helpId" placeholder="Seleccione imagenes">
 
</div>

      <div class="col-12 mt-4">
      <button type="submit" class="btn btn-success">Publicar</button>
      <a name="" id="" class="btn btn-primary" href="../admin/index.php" role="button">Cancelar</a>
      </div>
      </form>

    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>




<br/>
<?php 
include("templates/footer.php");
?>