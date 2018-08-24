<?php
include 'clases.php';
if($alarma->nueva($_POST['comboBox'])==1)
{
	$_SESSION['msgOK']="nueva tarea";
}else{
	$_SESSION['msgERROR']="Fallo nueva tarea";
}

header('location: alarma.php');
exit();
