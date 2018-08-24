<?php
Class Conexion{
	private $cnn;

function conectar(){
$host='localhost';
$usuario='root';
$pass='';
$base='proyectocuce';
$cnn=mysql_connect($host,$usuario,$pass);
if(! $cnn){
	die('fallo la coneccion '.mysql_error());
}
if(! mysql_select_db($base)){
	die('fallo al conectarse a la base '.mysql_error());
}
return $cnn;
}

}

$bd=new Conexion();
