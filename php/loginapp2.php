<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);
$query="Select a.idempleados,a.codtmk,a.puestoid from empleados a where a.mail='$mail' and a.password=md5('$password') and estado=1"; 
$resultado=mysql_query($query) or die ("error");
$row=mysql_fetch_assoc($resultado);
$resp = array();
if (mysql_num_rows($resultado)>0){
    $resp[]=$row;
} else {
    die ("error".mysql_error());
}
print json_encode($row);
?>