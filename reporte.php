<?php

session_start();                    
if(! isset($_SESSION['clave'])){       
    header("location: denegado.php");       
    exit();                             
}else{

    $idUser=$_SESSION['idUser'];
  include 'chartGoogle.php';
   //include 'clases.php';
    $dispositivo=$tarea->disp($idUser);
}     
 
?>
<!doctype html>
<html lang="en">
<head>

<!--<link href="css/style.css" rel="stylesheet" />-->
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>CUCE</title>


	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    

<style type="text/css">
#Content{width:120px;}
#Content div{margin:5px 0;width:120px;border:1px #03f solid;border-top-width:8px;}
#div1, #div2, #div3 {margin: 20px;}
</style>    


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    <h3>Cuce</h3>
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-user"></i>
                        <p>INICIO</p>
                    </a>
                </li>
                <li>
                    <a href="grafico.php">
                        <i class="pe-7s-graph"></i>

                        <p>GRAFICOS</p>
                    </a>
                </li>
                <li class="active">
                    <a href="reporte.php">
                        <i class="pe-7s-note2"></i>
                        <p>REPORTES</p>
                    </a>
                </li>
                <li>
                    <a href="proyeccion.php">
                        <i class="pe-7s-news-paper"></i>
                        
                        <p>PROYECCIONES</p>
                    </a>
                </li>
                <li>
                    <a href="dispositivo.php">
                        <i class="pe-7s-user"></i>
                        <p>DISPOSITIVOS</p>
                    </a>
                </li>
                <li>
                    <a href="alarma.php">
                        <i class="pe-7s-bell"></i>                        
                        <p>ALARMAS</p>
                    </a>
                </li>
                <li>
                    <a href="tips.php">
                        <i class="pe-7s-science"></i>
                        <p>TIPS</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Reportes</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

                 <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                               <div class="col-md-6" style="width: 100px; height: 200px;">

                              
                              <form  id='formularios' name="formulario" method="POST" action="reporte.php"> 
                              <label>Tipo</label>
                              <select name="comboBox"> 
                              <option value=1>Diario</option> 
                              <option value=2>Semanal</option>
                              <option value=3>Mensual</option> 
                              <option value=4>Bimestral</option>  
                              </select> 
                              <label>Fecha</label><input type="date" name="fechaDesde"></p>
                             <!-- <p>N° de Dispositivo <input type="text" name="nroDisp"></p>-->
                              <label>Nro de Dispositivo</label>
                                    <select name="comboDisp"> 
                                    <?php 
                                       foreach($dispositivo as $disp) :
                                       echo "<option value=".$disp['nroDispositivo'].">".$disp['nroDispositivo']."</option>";
                                       endforeach;
                                       ?> 
                                      </select>
                              <input type="submit" value="Mostrar Reporte"> 
                              </form> 
                            </div>
                        </div>
                    </div>
                </div>
                <div id="div1" class="row">
                      
                      &nbsp
                      &nbsp
                      &nbsp
                      &nbsp
                      &nbsp
                      &nbsp
                      &nbsp
                    <div class="col-md-12">
                        <div class="col-md-10 col-md-offset-1">

                <table width=100% border="3x solid#000">
                    <thead>
                        <tr>
                            <?php
                            switch ($valor) {
                                case 1:
                                  echo "<th>Fecha</th>";
                                  echo "<th>Hora</th>";
                                  echo "<th>Consumo</th>";
                                  break;
                                
                                case 2:
                                  echo "<th>Fecha</th>";
                                  echo "<th>Consumo</th>";
                                  break;
                            
                                case 3:
                                  echo "<th>Fecha</th>";
                                  echo "<th>Consumo</th>";
                                  break;

                                case 4:
                                  echo "<th>Fecha</th>";
                                  echo "<th>Consumo</th>";
                                  break;
                                default:
                                break;
                            }
                            ?>

                        </tr>
                    </thead >   
                    <tbody border="3x solid#000">

                        <?php 
                        switch ($valor) {
                        case 1:
                          $n=1;
                          while($n<$i){     
                          $consumo[$n]=$consumo[$n];
                          if($mediaHora[$n] % 2==0) { 
                          echo "<tr>"."<td>".$fecha[$n]."</td>"."<td>".$hora[$n].":00</td>"."<td>".$consumo[$n]."Wh"."</td></tr>";
                          }
                          else{

                          echo "<tr>"."<td>".$fecha[$n]."</td>"."<td>".$hora[$n].":30</td>"."<td>".$consumo[$n]."Wh"."</td></tr>";
                          }
                          $n=$n+1;
                          }
                          break;

                          default:
                          $n=1;
                          while ($n<$i) {
                            
                          $consumo[$n]=$consumo[$n]/1000;
                           echo "<tr>"."<td>".$fecha[$n]."</td>"."<td>".$consumo[$n]."KWh"."</td></tr>";
                            $n=$n+1;
                          }
                          break;
                          

                      }
                                                     
                        ?>


                    
                    </tbody>
                </table>    
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                
            </div>

                    </div>
                            
                        

                </div>
                                
                            </div>
                        </div>


 </div>



                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> CUCE, innovando para una vida mejor
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>