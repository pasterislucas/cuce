
<?php
session_start();                    
if(! isset($_SESSION['clave'])){       
    header("location: denegado.php");       
    exit();                             
}else{
    $idUser=$_SESSION['idUser'];
    include 'clases.php';
    $dispositivo=$tarea->disp($idUser);
    $primero[]=$tarea->primero($idUser);
    $filas=null;
    if(isset($_POST['comboBox'])){
        $valor=$_POST['comboBox'];
        $filas=$alarma->todas($valor);
    }else{
        //$filas=$alarma->todas($primero);
    }

}  
 
?>
<!doctype html>
<html lang="en">
<head>
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


    


    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

<link href="css/slider.css" rel="stylesheet" /> 


    

<style type="text/css">
#Content{width:120px;}
#Content div{margin:5px 0;width:120px;border:1px #03f solid;border-top-width:8px;}
</style>    

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green">


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
                <li>
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
                <li class="active">
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
                    <a class="navbar-brand">Alarmas</a>
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
            <div>
                <!--<form action="mail.php">
                                    <button 
                                        type="submit" 
                                        class="btn btn-primary pull-right">
                                        Mail
                                    </button>
                </form>-->
                   
                                  <div id='formularios'>
                                <h2 id='tituloGrande'>Agregar Alarma</h2>
                                         <label id='titulo'>Tipo de Alarma</label>
                                        <form action="alarma.php" method="POST" rol="form" name="form" id="form">
                                          <?php  

                                            if($_POST['tipoAlarma']==0){
                                                echo "<input type=\"radio\" name=\"tipoAlarma\" value=0 onchange=\"this.form.submit();\" checked> KW/H <br>";
                                                echo "<input type=\"radio\" name=\"tipoAlarma\" value=1 onchange=\"this.form.submit();\"> $<br> ";            
                                            }
                                            if($_POST['tipoAlarma']==1){
                                                echo "<input type=\"radio\" name=\"tipoAlarma\" value=0 onchange=\"this.form.submit();\" > KW/H <br>";
                                                echo "<input type=\"radio\" name=\"tipoAlarma\" value=1 onchange=\"this.form.submit();\" checked> $<br> ";   
                                            }                   
                                           


                                           ?>



                                           </form>
                                <form action="nuevaAlarma.php" method="POST" role="form">
                                    <label>Nro de Dispositivo</label>
                                    <select name="comboBox"> 
                                    <?php 
                                       foreach($dispositivo as $disp) :
                                       echo "<option value=".$disp['nroDispositivo'].">".$disp['nroDispositivo']."</option>";
                                       endforeach;
                                       ?> 
                                      </select>
                                    <div class="form-group">
                                        <label for="alarma">Descripcion</label>
                                        <input 
                                            type="text" 
                                            
                                            id="descripcion"
                                            name="descripcion" 
                                            placeholder="Alarma de Fin de Mes">
                                    <?php       
                                        if($_POST['tipoAlarma']==0){
                                        echo "<label for=\"alarma\">Monto en Potencia (KWh)</label>
                                        <input 
                                            type=\"text\" 
                                            
                                            id=\"montoPot\"
                                            name=\"montoPot\"
                                            placeholder=\"300KWh\">";

                                        }
                                        if($_POST['tipoAlarma']==1){

                                        echo "<label for=\"alarma\">Monto Monetario ($)</label>
                                        <input 
                                            type=\"text\" 
                                            
                                            id=\"montoMon\"
                                            name=\"montoMon\"
                                            placeholder=\"$1200\"> ";   
                                        }
                                        ?>


                                    <button 
                                        type="submit" 
                                        class="btn btn-primary">
                                        agregar
                                    </button>
                                    </div>
                                
                                </form>

                                <h2 id="tituloGrande">Consultar Alarma</h2>
                                    <label> Nro de Dispositivo</label>
                                    <form action="" method="POST" role="form">
                                      <select name="comboBox"> 
                                    <?php 
                                       foreach($dispositivo as $disp) :
                                       echo "<option value=".$disp['nroDispositivo'].">".$disp['nroDispositivo']."</option>";
                                       endforeach;
                                       ?> 
                                      </select>
                                       <button 
                                                type="submit" 
                                                class="btn btn-primary">
                                                Consultar Alarma
                                            </button>
                                  </form>
                                  <br>
                                <br>
                                <br>
                                <ul class="list-group">
                                    <?php if($filas!=null){
                                        foreach($filas as $f) : ?>
                                    <li class="list-group-item">
                                        <?php echo "Descripcion: ".$f['descripcion'];
                                              echo "<br>";
                                              echo "Monto en Potencia: ".$f['montoPot'];
                                              echo "<br>";
                                              echo "Monto Monetario: ".$f['montoMon'] ?>
                                        <a href="eliminarAlarma.php?id=<?php echo $f['idAlarma'] ?>" class="close">X</a>
                                    </li>
                                    <?php endforeach; }?>
                                </ul>
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

	<!-- Light Bootstrap Table DEMO methods -->
	<script src="assets/js/demo.js"></script>


</html>