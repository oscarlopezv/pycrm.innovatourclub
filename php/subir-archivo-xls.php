<?php
//print_r($_POST);
require('../importar/excel_reader2.php');
require('../importar/SpreadsheetReader.php');
include_once("conexion.php");
$sql=new conectar();
$sql->mysqlsrv();
extract($_POST);
$name=uniqid('',true);
switch ($id){
	case "Subir":
	  if (move_uploaded_file($_FILES['archivo']['tmp_name'], "../xls/".$name.$archivo)) {
          importar($name.$archivo);
	  	//echo '{"newName":"'.$name.$archivo.'"}';
	  } else {
		  echo "¡Posible ataque de carga de archivos!\n".$_FILES['archivo']['tmp_name'];
	  }
	  
    break;
	case "Eliminar":
		if (unlink('../images/'.$archivo)){
		} else {
			echo "No se pudo eliminar";
		}
	break;
}
function importar($name){
    
    $Spreadsheet = new SpreadsheetReader("../xls/".$name);
    
    foreach ($Spreadsheet as $keyd=> $rowd){
        if ($keyd!=0){
            $query="Insert into clientes_import (cedula,nombre,cel1,cel2,tel,provincia,ciudad,mail)
            values ('".$rowd[0]."','".$rowd[1]."','".$rowd[2]."','".$rowd[3]."','".$rowd[4]."','".$rowd[5]."','".$rowd[6]."','".$rowd[7]."')";
            mysql_query($query) or die ("Error".mysql_error().$query);
        }
    }
    if (unlink("../xls/".$name)){
        echo '{"newName":"'.$name.$archivo.'"}';
    } else {
        echo "No se pudo eliminar";
    }
    
}
?>