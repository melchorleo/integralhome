<?php 

$url_base ="http://localhost/integralhomemx/admin/";

session_start();
session_destroy();

header("location:login.php");
?>