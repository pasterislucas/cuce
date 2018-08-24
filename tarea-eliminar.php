<?php
include 'clases.php';
if($tarea->eliminar($_GET['id'])==1)
{
	$_SESSION['msgOK']="tarea eliminada";
}else{
	$_SESSION['msgERROR']="Fallo eliminacion";
}

header('location: dispositivo.php');
exit();
