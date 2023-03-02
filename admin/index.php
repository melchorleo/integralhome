<?php 
include("templates/header.php");
include("bd.php");

$sentencia = $conexion ->prepare("SELECT `id_propiedad`,`galeria`, `titulo`, `precio`, `estado_id`, `id_tipo_operacion` FROM `tbl_propiedades`");
$sentencia -> execute();
$lista_propiedades = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//print_r($lista_propiedades);


if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conexion->prepare("DELETE FROM `tbl_propiedades` WHERE id_propiedad=:id_propiedad");
    $sentencia->bindParam(":id_propiedad",$txtID);
    $sentencia ->execute();

    header("Location:index.php");
}

?>
<br/>
<div class="card">
    <div class="card-header">
        Mis propiedades
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Icono</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Operación</th>
                        <th scope="col">Acción</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_propiedades as $registros){?>
                    <tr class="">
                        <td scope="row"> <?php echo $registros['id_propiedad'];?> </td>
                        <td> <?php echo $registros['galeria'];?> </td>
                        <td> <?php echo $registros['titulo'];?> </td>
                        <td> <?php echo "$ ".$registros['precio'];?> </td>
                        <td> <?php echo $registros['estado_id'];?> </td>
                        <td> <?php echo $registros['id_tipo_operacion'];?> </td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $registros['id_propiedad'];?>" role="button">Editar</a>
                            |
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['id_propiedad'];?>" role="button">Eliminar</a>
                        </td>
                        
                        
                    </tr>
                   <?php }?>
                </tbody>
            </table>
        </div>
        


    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>


<?php 
include ("templates/footer.php");

?>

 