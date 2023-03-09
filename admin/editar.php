<?php
include("templates/header.php");
include("bd.php");

if (isset($_GET['txtID'])) {
  $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
  $sentencia = $conexion->prepare("SELECT * FROM `tbl_propiedades` WHERE id_propiedad=:id_propiedad");
  $sentencia->bindParam(":id_propiedad", $txtID);
  $sentencia->execute();
  $registro = $sentencia->fetch(PDO::FETCH_LAZY);
  //print_r($registro);
  $id_propiedad = $registro['id_propiedad'];
  $titulo = $registro['titulo'];
  //$tipo_operacion = $registro['id_tipo_operacion']; // Moverlo
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
  $caracteristica1 = $registro['caracteristica1']; //Aire acondicionado
  $caracteristica2 = $registro['caracteristica2']; //Area de Juegos infantiles
  $caracteristica3 = $registro['caracteristica3']; //Asador
  $caracteristica4 = $registro['caracteristica4']; //Amueblado
  $caracteristica5 = $registro['caracteristica5']; //Alberca
  $caracteristica6 = $registro['caracteristica6']; //Bodega
  $caracteristica7 = $registro['caracteristica7']; //Calefaccion
  $caracteristica8 = $registro['caracteristica8']; //Cuarto de Tv
  $caracteristica9 = $registro['caracteristica9']; //Closet
  $caracteristica10 = $registro['caracteristica10']; //Cancha de Tenis
  $caracteristica11 = $registro['caracteristica11']; //Cocina integral
  $caracteristica12 = $registro['caracteristica12']; //Cancha squash
  $caracteristica13 = $registro['caracteristica13']; //Caseta de guardia
  $caracteristica14 = $registro['caracteristica14']; //Cuartos de servicio
  $caracteristica15 = $registro['caracteristica15']; //Escuelas cercanas
  $caracteristica16 = $registro['caracteristica16']; //Estudio
  $caracteristica17 = $registro['caracteristica17']; //Elevador
  $caracteristica18 = $registro['caracteristica18']; //Gimnasio
  $caracteristica19 = $registro['caracteristica19']; //Internet
  $caracteristica20 = $registro['caracteristica20']; //Linea blanca
  $caracteristica21 = $registro['caracteristica21']; //Seguridad privada
  $caracteristica22 = $registro['caracteristica22']; //Jardin privado
  $caracteristica23 = $registro['caracteristica23']; //mascotas


}

if ($_POST) {
  $id_propiedad = (isset($_POST['id_propiedad'])) ? $_POST['id_propiedad'] : "";
  // $id_tipo_operacion=(isset($_POST['id_tipo_operacion']))?$_POST['id_tipo_operacion']:"";
  $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
  $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
  $recamaras = (isset($_POST['habitaciones'])) ? $_POST['habitaciones'] : "";
  $num_estacionamiento = (isset($_POST['estacionamientos'])) ? $_POST['estacionamientos'] : "";
  $sanitarios = (isset($_POST['sanitarios'])) ? $_POST['sanitarios'] : "";
  $precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";
  $precio_mantenimiento = (isset($_POST['mantenimiento'])) ? $_POST['mantenimiento'] : "";
  $m2Contruidos = (isset($_POST['construidos'])) ? $_POST['construidos'] : "";
  $terreno = (isset($_POST['terreno'])) ? $_POST['terreno'] : "";
  $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "";
  $urlvideo = (isset($_POST['urlvideo'])) ? $_POST['urlvideo'] : "";
  $galeria = (isset($_POST['galeria'])) ? $_POST['galeria'] : "";
  $anio_construccion = (isset($_POST['anio_construccion'])) ? $_POST['anio_construccion'] : "";
  $caracteristica1 = (isset($_POST['caracteristica1']))?$_POST['caracteristica1']:""; 
  $caracteristica2 = (isset($_POST['caracteristica2']))?$_POST['caracteristica2']:"";
  $caracteristica3 = (isset($_POST['caracteristica3']))?$_POST['caracteristica3']:""; 
  $caracteristica4 = (isset($_POST['caracteristica4']))?$_POST['caracteristica4']:"";
  $caracteristica5 = (isset($_POST['caracteristica5']))?$_POST['caracteristica5']:""; 
  $caracteristica6 = (isset($_POST['caracteristica6']))?$_POST['caracteristica6']:"";
  $caracteristica7 = (isset($_POST['caracteristica7']))?$_POST['caracteristica7']:""; 
  $caracteristica8 = (isset($_POST['caracteristica8']))?$_POST['caracteristica8']:"";
  $caracteristica9 = (isset($_POST['caracteristica9']))?$_POST['caracteristica9']:""; 
  $caracteristica10 = (isset($_POST['caracteristica10']))?$_POST['caracteristica10']:"";
  $caracteristica11 = (isset($_POST['caracteristica11']))?$_POST['caracteristica11']:""; 
  $caracteristica12 = (isset($_POST['caracteristica12']))?$_POST['caracteristica12']:"";
  $caracteristica13 = (isset($_POST['caracteristica13']))?$_POST['caracteristica13']:""; 
  $caracteristica14 = (isset($_POST['caracteristica14']))?$_POST['caracteristica14']:"";
  $caracteristica15 = (isset($_POST['caracteristica15']))?$_POST['caracteristica15']:""; 
  $caracteristica16 = (isset($_POST['caracteristica16']))?$_POST['caracteristica16']:"";
  $caracteristica17 = (isset($_POST['caracteristica17']))?$_POST['caracteristica17']:""; 
  $caracteristica18 = (isset($_POST['caracteristica18']))?$_POST['caracteristica18']:"";
  $caracteristica19 = (isset($_POST['caracteristica19']))?$_POST['caracteristica19']:""; 
  $caracteristica20 = (isset($_POST['caracteristica20']))?$_POST['caracteristica20']:"";
  $caracteristica21 = (isset($_POST['caracteristica21']))?$_POST['caracteristica21']:"";
  $caracteristica22 = (isset($_POST['caracteristica22']))?$_POST['caracteristica22']:""; 
  $caracteristica23 = (isset($_POST['caracteristica23']))?$_POST['caracteristica23']:"";

  $sentencia = $conexion->prepare("UPDATE `tbl_propiedades`  SET  titulo=:titulo,  descripcion=:descripcion, habitaciones=:habitaciones, estacionamientos=:estacionamientos, sanitarios=:sanitarios, precio=:precio, precio_mantenimiento=:mantenimiento, metros_construidos=:construidos, metros_terreno=:terreno, direccion=:direccion, url_video=:urlvideo, galeria=:galeria, anio_construccion=:anio_construccion, caracteristica1=:caracteristica1, caracteristica2=:caracteristica2, caracteristica3=:caracteristica3, caracteristica4=:caracteristica4, caracteristica5=:caracteristica5, caracteristica6=:caracteristica6, caracteristica7=:caracteristica7, caracteristica8=:caracteristica8, caracteristica9=:caracteristica9, caracteristica10=:caracteristica10, caracteristica11=:caracteristica11, caracteristica12=:caracteristica12, caracteristica13=:caracteristica13, caracteristica14=:caracteristica14, caracteristica15=:caracteristica15, caracteristica16=:caracteristica16, caracteristica17=:caracteristica17, caracteristica18=:caracteristica18, caracteristica19=:caracteristica19, caracteristica20=:caracteristica20, caracteristica21=:caracteristica21, caracteristica22=:caracteristica22, caracteristica23=:caracteristica23 WHERE id_propiedad=:id_propiedad");

  //$sentencia -> bindParam(":id_tipo_operacion",$id_tipo_operacion);
  $sentencia->bindParam(":titulo", $titulo);
  $sentencia->bindParam(":descripcion", $descripcion);
  $sentencia->bindParam(":habitaciones", $recamaras);
  $sentencia->bindParam(":estacionamientos", $num_estacionamiento);
  $sentencia->bindParam(":sanitarios", $sanitarios);
  $sentencia->bindParam(":precio", $precio);
  $sentencia->bindParam(":mantenimiento", $precio_mantenimiento);
  $sentencia->bindParam(":construidos", $m2Contruidos);
  $sentencia->bindParam(":terreno", $terreno);
  $sentencia->bindParam(":direccion", $direccion);
  $sentencia->bindParam(":urlvideo", $urlvideo);
  $sentencia->bindParam(":galeria", $galeria);
  $sentencia->bindParam(":anio_construccion", $anio_construccion);
  $sentencia->bindParam(":caracteristica1",$caracteristica1);
  $sentencia->bindParam(":caracteristica2",$caracteristica2);
  $sentencia->bindParam(":caracteristica3",$caracteristica3);
  $sentencia->bindParam(":caracteristica4",$caracteristica4);
  $sentencia->bindParam(":caracteristica5",$caracteristica5);
  $sentencia->bindParam(":caracteristica6",$caracteristica6);
  $sentencia->bindParam(":caracteristica7",$caracteristica7);
  $sentencia->bindParam(":caracteristica8",$caracteristica8);
  $sentencia->bindParam(":caracteristica9",$caracteristica9);
  $sentencia->bindParam(":caracteristica10",$caracteristica10);
  $sentencia->bindParam(":caracteristica11",$caracteristica11);
  $sentencia->bindParam(":caracteristica12",$caracteristica12);
  $sentencia->bindParam(":caracteristica13",$caracteristica13);
  $sentencia->bindParam(":caracteristica14",$caracteristica14);
  $sentencia->bindParam(":caracteristica15",$caracteristica15);
  $sentencia->bindParam(":caracteristica16",$caracteristica16);
  $sentencia->bindParam(":caracteristica17",$caracteristica17);
  $sentencia->bindParam(":caracteristica18",$caracteristica18);
  $sentencia->bindParam(":caracteristica19",$caracteristica19);
  $sentencia->bindParam(":caracteristica20",$caracteristica20);
  $sentencia->bindParam(":caracteristica21",$caracteristica21);
  $sentencia->bindParam(":caracteristica22",$caracteristica22);
  $sentencia->bindParam(":caracteristica23",$caracteristica23);
  $sentencia->bindParam(":id_propiedad", $id_propiedad);

  $sentencia->execute();

  header("Location:index.php");
}

?>

<br />
<div class="card">
  <div class="card-header">
    Editar Propiedad
  </div>

  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data" class="row">

      <div class="col-2">

        <label for="id_propiedad" class="form-label">ID</label>
        <input type="text" readonly class="form-control" name="id_propiedad" id="id_propiedad" value="<?php echo $id_propiedad; ?>" aria-describedby="helpId" placeholder="">
      </div>

      <!--
    <div class="mb-3">
      <label for="id_tipo_operacion" class="form-label">Tipo de Operacion</label>
      <select class="form-select form-select-lg" name="id_tipo_operacion" id="id_tipo_operacion">
        <option selected>Elija Uno</option>
        <option value="1">Venta</option>
        <option value="2">Renta</option>
        <option value="3">Preventa</option>
      </select>
    </div>
-->
      <div class="col-10">
        <label for="titulo" class="form-label">Titulo Propiedad</label>
        <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>" aria-describedby="helpId" placeholder="Departamento en la Colonia del Valle" required>
      </div>

      <div class="col-12 mt-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="20" placeholder="Hermoso departamento en la colonia del valle.."> <?php echo $descripcion; ?></textarea>
      </div>



      <div class="col-3 mt-3">
        <label for="habitaciones" class="form-label">Recámaras</label>
        <input type="text" class="form-control" name="habitaciones" id="habitaciones" value="<?php echo $habitaciones ?>" aria-describedby="helpId" placeholder="0">
      </div>

      <div class="col-3 mt-3">
        <label for="estacionamientos" class="form-label">Estacionamientos</label>
        <input type="text" class="form-control" name="estacionamientos" id="estacionamientos" value="<?php echo $estacionamientos; ?>" aria-describedby="helpId" placeholder="0">

      </div>

      <div class="col-3 mt-3">
        <label for="sanitarios" class="form-label">Baños</label>
        <input type="text" class="form-control" name="sanitarios" id="sanitarios" value="<?php echo $sanitarios; ?>" aria-describedby="helpId" placeholder="0">
      </div>

      <div class="col-3 mt-3">
        <label for="precio" class="form-label">Precio venta / renta</label>
        <input type="text" class="form-control" name="precio" id="precio" value="<?php echo $precio; ?>" aria-describedby="helpId" placeholder="1000000">
      </div>

      <div class="col-3 mt-3">
        <label for="mantenimiento" class="form-label">Mantenimiento</label>
        <input type="text" class="form-control" name="mantenimiento" id="mantenimiento" value="<?php echo $precio_mantenimiento; ?>" aria-describedby="helpId" placeholder="0">

      </div>

      <div class="col-3 mt-3">
        <label for="construidos" class="form-label">m2 construidos</label>
        <input type="text" class="form-control" name="construidos" id="construidos" value="<?php echo $metros_construidos; ?>" aria-describedby="helpId" placeholder="100">
      </div>

      <div class="col-3 mt-3">
        <label for="terreno" class="form-label">m2 Terreno</label>
        <input type="text" class="form-control" name="terreno" id="terreno" value="<?php echo $metros_terreno; ?>" aria-describedby="helpId" placeholder="0">

      </div>

      <div class="col -3 mt-3">
        <label for="anio_construccion" class="form-label">Año Construccion</label>
        <input type="text" class="form-control" name="anio_construccion" id="anio_construccion" aria-describedby="helpId" value="<?php echo $anio_construccion; ?>" placeholder="2023">

      </div>

      <div class="col-12 mt-3">
        <label for="direccion" class="form-label">Calle y Numero</label>
        <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $direcion; ?>" aria-describedby="helpId" placeholder="Benito Jaurez #250">
      </div>
      <!--
<div class="mb-3">
            <label for="tipo_inmueble" class="form-label">Tipo de inmueble</label>
            <select class="form-select form-select-lg"  name="tipo_inmueble" id="tipo_inmueble">
                <option selected>Elije tipo</option>
                <option value="1">Departamento</option>
                <option value="2">Casa</option>
                <option value="3">Terreno</option>
            </select>
        </div>

        <div class="mb-3">
          <label for="estados" class="form-label">Estado</label>
          <select class="form-select form-select-lg" name="estados" id="estados">
            <option selected>Elija Uno</option>
            <option value="1">Jalisco</option>
            <option value="2">Ciudad de Mexico</option>
            <option value="3">Morelos</option>
          </select>
        </div>
-->

      <div class="col-12 mt-3">
        <label for="urlvideo" class="form-label">Link Video</label>
        <input type="text" class="form-control" name="urlvideo" id="urlvideo" value="<?php echo $url_video; ?>" aria-describedby="helpId" placeholder="https://youtube.com/video">

      </div>

      <!-- -->
      <div class="card mt-3">

        <div class="card-body row">
          <h6 class="card-title">Caracteristicas</h6>



          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Aire acondicionado" id="caracteristica1" name="caracteristica1" <?php if (!empty($caracteristica1)) { ?> checked  <?php } ?>>
              <label class="form-check-label" for="caracteristica1" value="">
                Aire acondicionado
              </label>
            </div>

         

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Área de Juegos Infantiles" id="caracteristica2" name="caracteristica2" <?php if (!empty($caracteristica2)) { ?> checked <?php } ?>>
              <label class="form-check-label" for="caracteristica2">
                Área de Juegos Infantiles
              </label>
            </div>
          


          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Asador" id="caracteristica3" name="caracteristica3" <?php if (!empty($caracteristica3)) {  ?>  checked  <?php } ?> >
              <label class="form-check-label" for="caracteristica3">
                Asador
              </label>
            </div>
         

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Amueblado" id="caracteristica4" name="caracteristica4"  <?php if (!empty($caracteristica4)) { ?>  checked <?php } ?> >
              <label class="form-check-label" for="caracteristica4">
                Amueblado
              </label>
            </div>

          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Alberca" id="caracteristica5" name="caracteristica5" <?php if (!empty($caracteristica5)) { ?>  checked  <?php } ?> >
              <label class="form-check-label" for="caracteristica5">
                Alberca
              </label>
            </div>

         

          

            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Bodega" id="caracteristica6" name="caracteristica6"  <?php if (!empty($caracteristica6)) { ?> checked <?php } ?> >
              <label class="form-check-label" for="caracteristica6">
                Bodega
              </label>
            </div>
          


          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Calefacción" id="caracteristica7" name="caracteristica7" <?php if (!empty($caracteristica7)) { ?> checked <?php } ?> >
              <label class="form-check-label" for="caracteristica7">
                Calefacción
              </label>
            </div>
          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Cuarto de TV" id="caracteristica8" name="caracteristica8" <?php if (!empty($caracteristica8)) { ?>  checked <?php } ?> >
              <label class="form-check-label" for="caracteristica8">
                Cuarto de TV
              </label>
            </div>

          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Closets" id="caracteristica9" name="caracteristica9" <?php if (!empty($caracteristica9)) { ?> checked <?php } ?>>
              <label class="form-check-label" for="caracteristica9">
                Closets
              </label>
            </div>
          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Cancha de Tenis" id="caracteristica10" name="caracteristica10" <?php if (!empty($caracteristica10)) {  ?> checked <?php } ?> >
              <label class="form-check-label" for="caracteristica10">
                Cancha de Tenis
              </label>
            </div>
          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Cocina Integral" id="caracteristica11" name="caracteristica11" <?php if (!empty($caracteristica11)) { ?> checked <?php } ?>>
              <label class="form-check-label" for="caracteristica11">
                Cocina Integral
              </label>
            </div>
          


          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Cancha de squash" id="caracteristica12" name="caracteristica12" <?php if (!empty($caracteristica12)) { ?> checked <?php  } ?>>
              <label class="form-check-label" for="caracteristica12">
                Cancha de squash
              </label>
            </div>
          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Caseta de guardia" id="caracteristica13" name="caracteristica13" <?php if (!empty($caracteristica13)) { ?> checked <?php } ?> >
              <label class="form-check-label" for="caracteristica13">
                Caseta de guardia
              </label>
            </div>
          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Cuartos de servicio" id="caracteristica14" name="caracteristica14" <?php if (!empty($caracteristica14)) { ?> checked <?php } ?>>
              <label class="form-check-label" for="caracteristica14">
                Cuartos de servicio
              </label>
            </div>
          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Escuelas Cercanas" id="caracteristica15" name="caracteristica15" <?php if (!empty($caracteristica15)) { ?> checked  <?php  } ?> >
              <label class="form-check-label" for="caracteristica15">
                Escuelas Cercanas
              </label>
            </div>
         

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Estudio" id="caracteristica16" name="caracteristica16"  <?php if (!empty($caracteristica16)) { ?> checked <?php } ?> >
              <label class="form-check-label" for="caracteristica16">
                Estudio
              </label>
            </div>
          

          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Elevador(es)" id="caracteristica17" name="caracteristica17" <?php if (!empty($caracteristica17)) { ?> checked  <?php } ?> >
              <label class="form-check-label" for="caracteristica17">
                Elevador(es)
              </label>
            </div>
          


          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Gimnasio" id="caracteristica18" name="caracteristica18" <?php if(!empty($caracteristica18)) { ?> checked <?php } ?> >
              <label class="form-check-label" for="caracteristica18">
                Gimnasio
              </label>
            </div>
          


          
            <div class="form-check col-3">
              <input class="form-check-input" type="checkbox" value="Internet/Wifi" id="caracteristica19" name="caracteristica19" <?php if (!empty($caracteristica19)) { ?> checked   <?php } ?> >
              <label class="form-check-label" for="caracteristica19">
                Internet/Wifi
              </label>
            </div>
         


          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Línea blanca" id="caracteristica20" name="caracteristica20" <?php if (!empty($caracteristica20)) { ?> checked <?php } ?>>
            <label class="form-check-label" for="caracteristica20">
              Línea blanca
            </label>
          </div>



          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Seguridad Privada" id="caracteristica21" name="caracteristica21" <?php if (!empty($caracteristica21)) { ?> checked <?php } ?>>
            <label class="form-check-label" for="caracteristica21">
              Seguridad Privada
            </label>
          </div>





          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Jardín Privado" id="caracteristica22" name="caracteristica22" <?php if (!empty($caracteristica22)) { ?> checked <?php } ?>>
            <label class="form-check-label" for="caracteristica22">
              Jardín Privado
            </label>
          </div>





          <div class="form-check col-3">
            <input class="form-check-input" type="checkbox" value="Mascotas" id="caracteristica23" name="caracteristica23" <?php if (!empty($caracteristica23)) { ?> checked <?php } ?>>
            <label class="form-check-label" for="caracteristica23">
              Mascotas
            </label>
          </div>



        </div>
      </div>
      <!-- -->

      <div class="col-12 mt-3">
        <label for="galeria" class="form-label">Galeria</label>
        <input type="txt" class="form-control" name="galeria" id="galeria" value="<?php echo $galeria; ?>" aria-describedby="helpId" placeholder="Seleccione imagenes">

      </div>


      <div class="col-3 mt-3">
        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
      </div>

    </form>
  </div>
  <div class="card-footer text-muted">

  </div>
</div>




<br />















<?php
include("templates/footer.php");

?>