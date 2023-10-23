<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract ($_POST);
if ($cnue!=$ccon){
    die ("Las contraseñas nuevas no coinciden");    
}
if (strlen($cnue)<8){
    die ("Las nueva contraseña debe ser mayor a 8 caracteres");    
}
$query="select * from empleados where password=md5('$cant') and idempleados=".$_SESSION["usuario-id"];
$res=mysql_query($query) or die ("Hubo un error en el proceso".$query);
if (mysql_num_rows($res)==0){
    die ("La contraseña anterior no es la correcta");
}
$query="update empleados set password=md5('$cnue') where idempleados=".$_SESSION["usuario-id"];
mysql_query($query) or die ("Hubo un error durante el cambio");
die ("Su contraseña fue cambiada satisfactoriamente");
?>