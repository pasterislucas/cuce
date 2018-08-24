
<?php
error_reporting(0);
session_start();                    
if(! isset($_SESSION['clave'])){       
    header("location: denegado.php");       
    exit();                             
}else{

    $idUser=$_SESSION['idUser'];
    include 'clases.php';
    $filas=$tarea->todas($idUser);


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


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
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
                <li class="active">
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
                    <a class="navbar-brand">Dispositivos</a>
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
                <div id='formularios'>
                    
                          <div class="panel-body">
                            <center><h2 id="tituloGrande">Agregar Dispositivo</h2></center>
                                
                                <form action="nueva-tarea.php" method="POST" role="form">
                                    <div class="form-group">
                                        <label id='labels' for="tarea">Nro de Serie</label>
                                        <input 
                                            type="text" 
                                            
                                            id="nroSerie"
                                            name="nroSerie" 
                                            placeholder="44532332"
                                            size="10">
                                        <label id='labels' for="tarea">Ubicacion</label>
                                        <input 
                                            type="text" 
                                            
                                            id="ubicacion"
                                            name="ubicacion"
                                            placeholder="Piedras 2030, San Miguel de Tucuman"
                                            size="50">


                                    <button 
                                        type="submit" 
                                        class="btn btn-primary">
                                        agregar
                                    </button>
                                    </div>
                                
                                
                                </form>
                                
                                <br>
                                <br>
                                <center><h2 id="tituloGrande">Listado de Dispositivos</h2></center>
                                <ul class="list-group">
                                    <?php foreach($filas as $f) : ?>
                                    <li class="list-group-item">
                                        <?php echo "Nro de Dispositivo: ".$f['nroDispositivo'];
                                              echo "<br>";
                                              echo "Nro de Serie: ".$f['nroSerie'];
                                              echo "<br>";
                                              echo "Ubicacion: ".$f['ubicacion'] ?>
                                        <a href="tarea-eliminar.php?id=<?php echo $f['nroDispositivo'] ?>" class="close">X</a>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
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