<?php
error_reporting(0);
session_start(); 
class Base
{
	private $cnn;					
	public function __construct( 	
		//$host='localhost',			
		//$usuario='root',			
		//$pass='',
		//Cloud Google//
		$host='35.202.222.155',
		$usuario='root',
		$pass='root',
		$base='proyectocuce'
		)
	{			
		$this->host=$host;					
		$this->usuario=$usuario;			
		$this->pass=$pass;
		$this->base=$base;	
		$this->cnn=mysql_connect($host,$usuario,$pass);		
		if(! $this->cnn){
			die('fallo la coneccion '.mysql_error($this->cnn));  	
		}
		if(! mysql_select_db($base,$this->cnn)){
			die('fallo al conectarse a la base '.mysql_error($this->cnn));
		}
	}

	public function devolverCnn(){
		if($this->cnn!=null)
		return $this->cnn;
	}

	public function select($sqlSelect){

		$result=mysql_query($sqlSelect,$this->cnn);
		if(! $result){
			die('fallo consulta: <br>'.$sqlSelect.'<br>'.mysql_error($this->cnn));
		}
		$filas=[];
		while( $row=mysql_fetch_array($result) ){
			$filas[]=$row;
		}

		mysql_free_result($result); 		

		return $filas;

	}
	public function selectDisp($sqlSelect){

		$result=mysql_query($sqlSelect,$this->cnn);
		if(! $result){
			die('fallo consulta: <br>'.$sqlSelect.'<br>'.mysql_error($this->cnn));
		}
		$filas=[];
		while( $row=mysql_fetch_array($result) ){
			$filas[]=$row;
		}

		mysql_free_result($result); 		

		return $filas;

	}

	public function selectNroDisp($sqlSelectNroDisp){
		$result=mysql_query($sqlSelectNroDisp,$this->cnn);
		if(! $result){
			die('fallo consulta: <br>'.$sqlSelectNroDisp.'<br>'.mysql_error($this->cnn));
		}
		$nroDisp=-1;
		if( $row=mysql_fetch_array($result) ){
			$nroDisp=$row['nroDispositivo'];
			$nroDisp++;
		}else{

		$nroDisp=1;
		}

		mysql_free_result($result); 		
		return $nroDisp;
	}

	public function dml($sqlDml){
		$res=mysql_query($sqlDml,$this->cnn);
		if(! $res){
			die('fallo consulta: <br>'.$sqlDml.'<br>'.mysql_error($this->cnn));
		}
		return $res;
	}	

} // fin clase Base


class Tarea
	{
		public function __construct($base){
			$this->base=$base;
		}
		public function primero($idUser){
			$sqlDisp="select nroDispositivo from dispositivo where idUsuario=\"$idUser\" order by nroDispositivo limit 1";
			return $this->base->selectNroDisp($sqlDisp);	
		}
		public function disp($idUser){
			$sqlDisp="select nroDispositivo from dispositivo where idUsuario=\"$idUser\"";
			return $this->base->selectDisp($sqlDisp);
		}
		public function todas($idUser){

			$sql="select nroDispositivo, nroSerie, ubicacion from dispositivo where idUsuario=\"$idUser\"";
			return $this->base->select($sql);
		}

		public function nueva($nuevaTarea){
			if(isset($_POST['nroSerie']) && ! empty($_POST['nroSerie'])){ 
				$nroSerie=$_POST['nroSerie'];		
				$ubicacion=$_POST['ubicacion'];
				$idUsuario=$_SESSION['idUser'];
				$sqlDisp="select nroDispositivo from dispositivo where idUsuario=\"$idUsuario\" order by nroDispositivo desc limit 1";
				$nroDispositivo=$this->base->selectNroDisp($sqlDisp);
				$sql="insert into dispositivo (nroSerie,ubicacion,nroDispositivo,idUsuario)
				values(\"$nroSerie\",\"$ubicacion\",\"$nroDispositivo\",\"$idUsuario\");";
				return $this->base->dml($sql);
				}
				else{
					return 0;
					}

		} 

		public function eliminar($nroDispositivo){
			if(isset($nroDispositivo) &&  is_numeric($nroDispositivo)){	
				$idUsuario=$_SESSION['idUser'];
				$sql="delete from dispositivo where nroDispositivo=\"$nroDispositivo\" and idUsuario=\"$idUsuario\"";
				return $this->base->dml($sql);
				}
				else{
					return 0;
					}

		} 
		


	}

	class Alarma
	{
		public function __construct($base){
			$this->base=$base;
		}

		public function todas($nroDispositivo){

			$sql="select idAlarma, descripcion, montoPot, montoMon, nroDispositivo from alarma where nroDispositivo=\"$nroDispositivo\"";
			return $this->base->select($sql);
		}

		public function nueva($nuevaAlarma){
			if(isset($nuevaAlarma) && ! empty($nuevaAlarma)){ 
				$descripcion=$_POST['descripcion'];
				$montoPot=$_POST['montoPot'];
				$montoMon=$_POST['montoMon'];
				if(empty($montoPot)){
					$montoPot=0;
				}
				if(empty($montoMon)){
					$montoMon=0;
				}
				$sql="insert into alarma (descripcion,montoPot,montoMon,nroDispositivo)
				values(\"$descripcion\",\"$montoPot\",\"$montoMon\",\"$nuevaAlarma\");";
				return $this->base->dml($sql);
				}
				else{
					return 0;
					}

		} 

		public function eliminar($idAlarma){
			if(isset($idAlarma) &&  is_numeric($idAlarma)){	
				$sql="delete from alarma where idAlarma=\"$idAlarma\"";
				return $this->base->dml($sql);
				}
				else{
					return 0;
					}

		} //fin function nueva
		


	}
	
$base=new Base();
$tarea=new Tarea($base);
$alarma= new Alarma($base);