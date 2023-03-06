<?php 
include("templates/header.php");
include("bd.php");

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion ->prepare("SELECT * FROM `tbl_propiedades` WHERE id_propiedad=:id_propiedad");
    $sentencia ->bindParam(":id_propiedad",$txtID);
    $sentencia ->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    //print_r($registro);
    $id_propiedad = $registro['id_propiedad'];
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
    $habitaciones = $registro['habitaciones'];
    $estacionamientos = $registro['estacionamientos'];
    $sanitarios = $registro['sanitarios'];
    $precio = $registro['precio'];
    $precio_mantenimiento = $registro['precio_mantenimiento'];
    $metros_construidos = $registro['metros_construidos'];
    $metros_terreno = $registro['metros_terreno'];
    $direcion = $registro['direccion'];
    $url_video = $registro['url_video'];
    $galeria = $registro['galeria'];
    $anio_construccion = $registro['anio_construccion'];

}

if($_POST){
    $id_propiedad = (isset($_POST['id_propiedad']))?$_POST['id_propiedad']:"";
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion =(isset($_POST['descripcion']))?$_POST['descripcion']:"";
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
    $anio_construccion = (isset($_POST['anio_construccion']))?$_POST['anio_construccion']:"";

    $sentencia = $conexion ->prepare("UPDATE `tbl_propiedades`  SET  titulo=:titulo, descripcion=:descripcion, habitaciones=:habitaciones, estacionamientos=:estacionamientos, sanitarios=:sanitarios, precio=:precio, precio_mantenimiento=:mantenimiento, metros_construidos=:construidos, metros_terreno=:terreno, direccion=:direccion, url_video=:urlvideo, galeria=:galeria, anio_construccion=:anio_construccion WHERE id_propiedad=:id_propiedad");

    $sentencia->bindParam(":titulo",$titulo);
    $sentencia -> bindParam(":descripcion",$descripcion);
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
    $sentencia -> bindParam(":anio_construccion",$anio_construccion);
    $sentencia->bindParam(":id_propiedad",$id_propiedad);

   $sentencia->execute();

    header("Location:index.php");
}

?>

<br/>
<div class="card">
    <div class="card-header">
        Editar Propiedad
    </div>
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data" >
    <div class="mb-3">

      <label for="id_propiedad" class="form-label">ID</label>
      <input type="text" readonly
        class="form-control" name="id_propiedad" id="id_propiedad" value="<?php echo $id_propiedad; ?>" aria-describedby="helpId" placeholder="">
    </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Titulo Propiedad</label>
          <input type="text"
            class="form-control" name="titulo" id="titulo" value="<?php echo $titulo;?>" aria-describedby="helpId" placeholder="Departamento en la Colonia del Valle" required>
        </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion</label>
          <textarea class="form-control" name="descripcion" id="descripcion"  rows="3" placeholder="Hermoso departamento en la colonia del valle.."> <?php echo $descripcion;?></textarea>
        </div>

        <div class="mb-3">
            <label for="tipo_inmueble" class="form-label">Tipo de inmueble</label>
            <select class="form-select form-select-lg"  name="tipo_inmueble" id="tipo_inmueble">
                <option selected>Elije tipo</option>
                <option value="">Departamento</option>
                <option value="">Casa</option>
                <option value="">Terreno</option>
            </select>
        </div>

   <div class="mb-3">
     <label for="habitaciones" class="form-label">Recámaras</label>
     <input type="text"
       class="form-control" name="habitaciones" id="habitaciones" value="<?php echo$habitaciones?>" aria-describedby="helpId" placeholder="0">
   </div>

   <div class="mb-3">
     <label for="estacionamientos" class="form-label">Estacionamientos</label>
     <input type="text"
       class="form-control" name="estacionamientos" id="estacionamientos" value="<?php echo $estacionamientos;?>" aria-describedby="helpId" placeholder="0">
     
   </div>

   <div class="mb-3">
     <label for="sanitarios" class="form-label">Baños</label>
     <input type="text"
       class="form-control" name="sanitarios" id="sanitarios" value="<?php echo $sanitarios;?>" aria-describedby="helpId" placeholder="0">
   </div>

   <div class="mb-3">
     <label for="precio" class="form-label">Precio venta / renta</label>
     <input type="text"
       class="form-control" name="precio" id="precio" value="<?php echo $precio;?>" aria-describedby="helpId" placeholder="1000000">
   </div>

<div class="mb-3">
  <label for="mantenimiento" class="form-label">Mantenimiento</label>
  <input type="text"
    class="form-control" name="mantenimiento" id="mantenimiento" value="<?php echo $precio_mantenimiento;?>" aria-describedby="helpId" placeholder="0">

</div>

<div class="mb-3">
  <label for="construidos" class="form-label">m2 construidos</label>
  <input type="text"
    class="form-control" name="construidos" id="construidos" value="<?php echo $metros_construidos;?>" aria-describedby="helpId" placeholder="100">
</div>

<div class="mb-3">
  <label for="terreno" class="form-label">m2 Terreno</label>
  <input type="text"
    class="form-control" name="terreno" id="terreno" value="<?php echo $metros_terreno;?>" aria-describedby="helpId" placeholder="0">
  
</div>

<div class="mb-3">
  <label for="direccion" class="form-label">Calle y Numero</label>
  <input type="text"
    class="form-control" name="direccion" id="direccion" value="<?php echo $direcion;?>" aria-describedby="helpId" placeholder="Benito Jaurez #250">
</div>

<div class="mb-3">
  <label for="urlvideo" class="form-label">URL Video</label>
  <input type="text"
    class="form-control" name="urlvideo" id="urlvideo" value="<?php echo $url_video;?>" aria-describedby="helpId" placeholder="https://youtube.com/video">
 
</div>

<div class="mb-3">
  <label for="galeria" class="form-label">Galeria</label>
  <input type="txt"
    class="form-control" name="galeria" id="galeria" value="<?php echo $galeria; ?>" aria-describedby="helpId" placeholder="Seleccione imagenes">
 
</div>

<div class="mb-3">
  <label for="anio_construccion" class="form-label">Año Construccion</label>
  <input type="text"
    class="form-control" name="anio_construccion" id="anio_construccion" aria-describedby="helpId" value="<?php echo $anio_construccion;?>" placeholder="2023">
  
</div>

<button type="submit" class="btn btn-success">Guardar Cambios</button>
<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
      </form>
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>




<br/>















<?php 
include ("templates/footer.php");

?>