<?php
include 'clases.php';
if($tarea->nueva($_POST['nroSerie'])==1)
{
	$_SESSION['msgOK']="nueva tarea";
}else{
	$_SESSION['msgERROR']="Fallo nueva tarea";
}

header('location: dispositivo.php');
exit();
