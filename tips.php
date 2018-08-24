
<?php

session_start();                    
if(! isset($_SESSION['clave'])){       
    header("location: denegado.php");       
    exit();                             
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

<link href="css/slider.css" rel="stylesheet" /> 

      <link rel="stylesheet" href="css/styleSlide.css">

    

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
                <li class="active">
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
                    <a class="navbar-brand">Tips</a>
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

                <div class="card">
          <div class="products">
            <div class="product active" product-id="1" product-color="#D18B49">
              <div class="thumbnail"><img src="img/slides/bajoConsumo.png"/></div>
              <h1 class="title">Lámparas de Bajo Consumo</h1>
              <p class="description">Usar lámparas de bajo consumo o lámparas LED es una buena opcion para ahorrar energia</p>
            </div>
            <div class="product" product-id="2" product-color="#542F13">
              <div class="thumbnail"><img src="img/slides/aireAcond.png"/></div>
              <h1 class="title">Uso conciente del aire acondicionado</h1>
              <p class="description">Pon el aire acondicionado a 24° C y desenchufalo cuando no lo uses</p>
            </div>
            <div class="product" product-id="3" product-color="#A5AAAE">
              <div class="thumbnail"><img src="img/slides/lavarropa.png"/></div>
              <h1 class="title">Ahorrando con el lavarropa</h1>
              <p class="description">Cuando uses el lavarropa hazlo con la carga máxima para encenderlo menos veces al día</p>
            </div>
            <div class="product" product-id="4" product-color="#ED8D1F">
              <div class="thumbnail"><img src="img/slides/heladera.png"/></div>
              <h1 class="title">Saca todo de una vez</h1>
              <p class="description">Intenta no abrir y cerrar tantas veces la heladera</p>
            </div>
            <div class="product" product-id="5" product-color="#D5DB5F">
              <div class="thumbnail"><img src="img/slides/compu.png"/></div>
              <h1 class="title">La computadora</h1>
              <p class="description">Si dejas de usar la PC por un rato apágala o ponla en suspension para ahorrar energia</p>
            </div>
             <div class="product" product-id="6" product-color="#DB5FCE">
              <div class="thumbnail"><img src="img/slides/tv.png"/></div>
              <h1 class="title">TV</h1>
              <p class="description">Desenchufa los televisores cuando no los estas usando</p>
            </div>
            <div class="product" product-id="7" product-color="#70DB5F">
              <div class="thumbnail"><img src="img/slides/lampara.png"/></div>
              <h1 class="title">Luces</h1>
              <p class="description">Apaga las luces que no uses</p>
            </div>
          </div>
          <div class="footer"><a class="btn" id="prev" href="#" ripple="" ripple-color="#666666">Anterior</a><a class="btn" id="next" href="#" ripple="" ripple-color="#666666">Siguiente</a></div>
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

    <script src="js/index.js"></script>

</html>
