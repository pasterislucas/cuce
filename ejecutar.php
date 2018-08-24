<?php
error_reporting(0);
//CONEXION SQL


$cnn=$base->devolverCnn();

$impTotal;
$impParcial=0;
$impParcial2=0;
$impParcial3=0;
$medicion;
//CONSULTA SQL

$consulta=mysql_query("select avg(medicion) as medic
                        from medicion
                        where YEAR(fecha)= YEAR(now()) and MONTH(fecha)=MONTH(now()) and nroDispositivo=".$nroDisp." group by HOUR(fecha)",$cnn);



    while($row=mysql_fetch_array($consulta)){
         $medicion=$row['medic'];

    }
$consulta2=mysql_query("select medicion as inst
                          from medicion
                          where YEAR(fecha)=YEAR(now()) and MONTH(fecha)=MONTH(now()) and nroDispositivo=".$nroDisp." order by idMedicion desc limit 1",$cnn);

    $inst=0;
    while($row1=mysql_fetch_array($consulta2)){
         $inst=$row1['inst'];
         $inst=$inst;
    }    
    
    $comparador=$medicion;
?>

<html>
<head>
</head>
<body>
              <div class="panel-body">
                <form>
                  <div> <h3 id='titulo'>Consumo Acumulado del Mes</h3>
                  <input type="text" value=<?php echo round($medicion,2)."KWh"; ?>>
                </div>
                <div> <h3 id='titulo'> A pagar (No Incluye Impuestos)</h3>
                    <?php
                    $impParcial=0;
                    $impParcial2=0;
                    $impParcial3=0;
                    $impParcial4=0;
                    $impParcial5=0;
                    $impTotal=0;
                    ?>
                    <input type="text" value=<?php 
                    if($medicion>900){
                      $aux=$medicion-900;
                      $impParcial=$aux*2.0359;
                      $medicion=$medicion-$aux;
                    }
                    if($medicion>600 && $medicion<=900){
                      $aux2=$medicion-600;
                      $impParcial2=$aux2*1.8784;
                      $medicion=$medicion-$aux2;
                    }
                    if($medicion>300 && $medicion<=600){
                      $aux3=$medicion-300;
                      $impParcial3=$aux3*1.7972;
                      $medicion=$medicion-$aux3;
                    }
                    if($medicion>200 && $medicion<=300){
                      $aux4=$medicion-200;
                      $impParcial4=$aux4*1.4392;
                      $medicion=$medicion-$aux4;
                    }
                    if($medicion>0 && $medicion<=200){
                      $impParcial5=$medicion*1.3581;
                    }
                    $impTotal=$impParcial+$impParcial2+$impParcial3+$impParcial4+$impParcial5;
                    echo "$".round($impTotal,2);?>>
                  
                  <br>
                </form>
              <!--</div>

              <div class="panel-body">-->
                <form>
                  <div> <h3 id='titulo'>Consumo Instantaneo</h3>
                  <input type="text" value=<?php echo round($inst,2)."Wh"; ?>>
                </div>
                <div> <h3 id='titulo'> A pagar (No Incluye Impuestos)</h3>
                    <?php
                    $inst=$inst/1000;
                    $impTotalInst=0;
                    $b=true;
                    ?>
                    <input type="text" value=<?php 
                    if($comparador>900){
                      $impTotalInst=$inst*2.0359;
                      $b=false;
                    }
                    if($comparador>600 && $comparador<=900 && $b){
                      $impTotalInst=$inst*1.8784;
                      $b=false;
                    }
                    if($comparador>300 && $comparador<=600 && $b){
                      $impTotalInst=$inst*1.7972;
                      $b=false; 
                    }
                    if($comparador>200 && $comparador<=300 && $b){
                      $impTotalInst=$inst*1.4392;
                      $b=false;
                    }
                    if($comparador>0 && $comparador<=200 && $b){
                      $impTotalInst=$inst*1.3581;
                      $b=false;
                    }
                    echo "$".round($impTotalInst,2)."/h";?>>
                  
                  <br>
                </form>
              </div>



</body>
</html>