<?php 
// content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
include('clases.php');
error_reporting(0);
if(isset($_POST['comboBox']) && $_POST['fechaDesde']!="" && $_POST['comboDisp']!=""){
$valor = $_POST['comboBox']; 
$nroDisp=$_POST['comboDisp'];
$fchDesde= str_replace ( "/" , "-" , $_POST['fechaDesde'] );
$mesAux = substr( $fchDesde, 5, 2);
$diaAux= substr($fchDesde,8,2);
$año= substr($fchDesde, 0,4);
//CONEXION SQL

$diaAuxFinal;
$mesAuxFinal;
$medicion;
$resultado=false;

$cnn = $base->devolverCnn();


    $hora=array();
    $consumo=array();
    $mediaHora=array();
    $dia=array();
    $fecha=array();
//CONSULTA SQL

switch ($valor) {
  case 1:
    $stmt= "SELECT 
                      date(fecha) as fech,
                      hour(fecha) as hora,
                      ((60/30) * HOUR(fecha) + FLOOR( MINUTE(fecha)/30)) as MediaHora,
                      Sum(medicion) as medic
                FROM medicion
                WHERE fecha >= STR_TO_DATE('".$fchDesde." 00:00', '%Y-%m-%d %H:%i') AND 
                      fecha <= STR_TO_DATE('".$fchDesde." 23:59', '%Y-%m-%d %H:%i') AND nroDispositivo=".$nroDisp."
                GROUP BY date(fecha), hour(fecha), MediaHora
                ORDER BY date(fecha), hour(fecha), MediaHora asc; ";
    $consulta=mysql_query($stmt,$cnn);
    $i=0;
    if($consulta==null){
          echo "<center><h1>Error al mostrar grafica</h1></center>" . mysql_error();
    }
    while($row=mysql_fetch_array($consulta)){
         $hora[]=$row['hora'];
         $mediaHora[]=(int) $row['MediaHora'];
         $consumo[]=$row['medic'];
         $fecha[]=$row['fech'];
         $i++;
    }
    break;
  
  case 2:
    if($diaAux+7>31){
      $diaAux2=$diaAux+7;
      $diaAuxFinal=$diaAux2-31;
      if($mesAux+1==13){
        $mesAuxFinal="01";
      }
      else{
        $mesAuxFinal=$mesAux+1;
      }
    }else{
      $diaAuxFinal=$diaAux+7;
      $mesAuxFinal=$mesAux;
    }
    if($diaAuxFinal<10){
      $diaAuxFinal="0".$diaAuxFinal;
    }
    $fchHasta=$año."-".$mesAuxFinal."-".$diaAuxFinal;

    $stmt= "SELECT 
                    date(fecha) as fech,
                    DAY(fecha) as dia,
                    MONTH(fecha) as mes,                
                    ((60/30) * HOUR(fecha) + FLOOR( MINUTE(fecha)/30)) as MediaHora,
                    Sum(medicion) as medic
                  FROM medicion
                  WHERE   DATE(fecha) >= STR_TO_DATE('".$fchDesde."', '%Y-%m-%d') AND
                          DATE(fecha) <= STR_TO_DATE('".$fchHasta."', '%Y-%m-%d') AND nroDispositivo=".$nroDisp."
                  GROUP BY date(fecha), dia
                  ORDER BY date(fecha) asc;";
    $consulta=mysql_query($stmt,$cnn);

    $i=0;
    if($consulta==null){
          echo "<center><h1>Error al mostrar grafica</h1></center>" . mysql_error();
    }
    while($row=mysql_fetch_array($consulta)){
         $consumo[]=$row['medic'];
         //$dia[]=(int) $row['dia']."  ".$row['hora'].":".$row['MediaHora']; ///aquii
         $dia[]=(int) $row['dia']."/".$row['mes'];
         $fecha[]=$row['fech'];
         $i++;

    }
    break;

  case 3:
    $stmt="SELECT 
                  date(fecha) as fech,
                  DAY(fecha) as dia,
                  MONTH(fecha) as mes,
                  Sum(medicion) as medic
                FROM medicion
                WHERE   MONTH(fecha) = MONTH('".$fchDesde."') AND nroDispositivo=".$nroDisp."  
                GROUP BY date(fecha), dia
                ORDER BY date(fecha) asc;";
    $consulta=mysql_query($stmt,$cnn);

    $i=0;
    if($consulta==null){
          echo "<center><h1>Error al mostrar grafica</h1></center>" . mysql_error();
    }
    while($row=mysql_fetch_array($consulta)){
         $consumo[]=$row['medic'];
         $dia[]=(int) $row['dia']."/".$row['mes'];

         $fecha[]=$row['fech'];
         $i++;

    }
    break;
  case 4:
    $stmt="SELECT 
                  date(fecha) as fech,
                  DAY(fecha) as dia,
                  MONTH(fecha) as mes,
                  Sum(medicion) as medic
                FROM medicion
                WHERE  nroDispositivo=".$nroDisp." AND  MONTH(fecha) = MONTH('".$fchDesde."') OR
                    MONTH(fecha) = MONTH('".$fchDesde."') -1 
                GROUP BY date(fecha), dia
                ORDER BY date(fecha) asc;";
    $consulta=mysql_query($stmt,$cnn);

    $i=0;
    if($consulta==null){
          echo "<center><h1>Error al mostrar grafica</h1></center>" . mysql_error();
    }
    $resultado=true;
    while($row=mysql_fetch_array($consulta)){
         $consumo[]=$row['medic'];
         $dia[]= $row['dia']."/".$row['mes'];

         $fecha[]=$row['fech'];
         $i++;

    }
    break;
}





}

?>


  

