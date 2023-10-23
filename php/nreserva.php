
<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET);
extract($_POST);
$query="SELECT count(*) FROM innovdl8_InnovaCrm.detalle_calls
where idtmk=113 and date(fecha_registro)=date(now()) and concretado='Concretado'";
$res=mysql_query($query) or die (mysql_error());
$row=mysql_fetch_array($res);
echo $row[0];
?> 