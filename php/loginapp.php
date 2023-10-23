<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);
$query="Select a.* from empleados a where a.mail='$mail' and a.password=md5('$password') and estado=1";
$resultado=mysql_query($query) or die (mysql_error());
if (mysql_num_rows($resultado)>0){
    die ("ok");
} 
?>