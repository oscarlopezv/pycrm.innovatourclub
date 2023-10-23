<?php
session_start();
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_GET); 
extract($_POST);
$query="select *,hour(hreserva)hora,minute(hreserva)min from detalle_calls where iddetalle_calls=$detcall";
$resultado=mysql_query($query) or die ("error");
$rows = array();
$i=0;
while( $row = mysql_fetch_assoc($resultado) ) {
	$rows[] =  $row;
}
print json_encode($rows); 

?>