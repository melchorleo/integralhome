<?php 
$servidor = "localhost";
$baseDatos = "db_integralhomemx";
$usuario = "root";
$password = "";

try{
$conexion = new PDO("mysql:host=$servidor; dbname=$baseDatos",$usuario,$password);
//echo "Conexion establecida...";

}catch(Exception $mensaje){
    echo "No fue posible establecer la conexion con la Base de Datos ".$mensaje->getMessage();
}

?>