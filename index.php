<?php
  session_start();

  if(isset($_SESSION["Id_usuario"])){
    header("Location: Views/pruebainicio.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="Views/estilos/estilos_index.css">
  <!--Import Google Icon Font-->
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="Views/materialize/css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="Views/sweetalert/sweetalert-master/dist/sweetalert.css">
  <title>Fusion-Look tus citas en un solo click</title>
</head>
<body>
  <header>
    <nav class="grey darken-2">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo" style="font-size:40px;">Fusion-Look</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#q" class="iniciar">Quiénes somos</a></li>
          <li><a href="#a" class="iniciar">Administradores</a></li>
          <li><a href="#g" class="iniciar">Geolocalización</a></li>
          <li><a href="Views/usuario.php" class="iniciar">Registrate</a></li>
          <li><a href="Views/login.php" class="iniciar">Iniciar sesión</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
        <li><a href="login.php" style="color:grey darken-1; font-family: 'Poiret one'; font-size: 20px;">Iniciar sesión</a></li>
      </ul>
      </div>
    </nav>
    <div class="slider" >
      <ul class="slides">
        <li>
          <img src="Views/images/slider-inicio.jpg">
          <div class="caption right-align">
            <p class="titulo">Fusion-Look</p>
            <h5 class="descripcion">El sitio web para todas tus citas</h5>
          </div>
        </li>
        <li>
          <img src="Views/images/slider-1.jpg">
          <div class="caption right-align">
            <p class="titulo">Barberias</p>
            <h5 class="descripcion">Encuentra barberias cerca de ti</h5>
          </div>
        </li>
        <li>
          <img src="Views/images/slider-2.jpg">
          <div class="caption left-align" >
            <p class="titulo">Salones de belleza</p>
            <h5 class="descripcion">Encuentra salones de belleza cerca de ti</h5>
          </div>
        </li>
        <li>
          <img src="Views/images/slider-3.jpg">
          <div class="caption left-align">
            <p class="titulo">Masajes & Spa</p>
            <h5 class="descripcion">Encuentra salones de masajes y spa´s cerca de ti</h5>
          </div>
        </li>
      </ul>
    </div>
</header>
<body>
    <div class="container">
      <h3 class="textq" id="q">Quiénes somos</h3>
      <div class="row">
        <div class="col s12 m12 l4 mockup">
          <span class="flow-text" style="font-size:20px;">Fusion-Look es un aplicativo con el cual puedes agendar citas de manera agil en los diferentes centros de servicio cerca de ti y con el profesional que más te interese, bien sea desde un ordenador o desde tu dispositivo móvil.</span>
        </div>
        <div class="col s12 m12 l8">
          <img class="imgmockup" src="Views/images/mockup.jpg">
        </div>
      </div>
    </div>
    <div class="parallax-container">
      <div class="parallax"><img src="Views/images/barberia.jpg"></div>
    </div>
    <div class="container">
      <h3 class="textq" id="a">Administradores</h3>
      <div class="row">
        <div class="col s12 m12 l7 ">
          <img class="imginfo" src="Views/images/info-1.jpg">
        </div>
        <div class="col s12 m12 l5 mockup">
          <span class="flow-text" style="font-size:20px;">Con Fusion-Look tienes la posibilidad de administrar las citas de tus centros de estetica de manera agil y eficaz, ademas puedes visualizar estadisticas en tiempo real de las citas agendadas con cada uno de tus empleados.</span>
        </div>
      </div>
    </div>
    <div class="parallax-container">
      <div class="parallax"><img src="Views/images/fondo.jpg"></div>
    </div>
    <div class="container">
      <h3 class="textq" id="g">Geolocalización</h3>
      <div class="row">
        <div class="col s12 m12 l7 ">
          <img class="imginfo" src="Views/images/mapa.jpg">
        </div>
        <div class="col s12 m12 l5 mockup">
          <span class="flow-text" style="font-size:20px;">Con Fusion-Look tienes la posibilidad de encontrar las barberias, salones de belleza, salas de masajes y spa´s que estan cerca de ti, gracias a nuestro sistema de geolocalizacion.</span>
        </div>
      </div>
    </div>
</body>
      
      <script type="text/javascript" src="Views/js/jquery-1.12.3.js"></script>
      <script type="text/javascript" src="Views/materialize/js/materialize.js"></script>
      <script src="Views/sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>
      <script> 
        $(document).ready(function(){
          $(".button-collapse").sideNav();
          $('.parallax').parallax();
          $('.slider').slider({
            indicators: false,
            interval: 4000,
            transition: 700,
            height:  450,
                   
          });
        });
      </script>
      <script type="text/javascript">
        $(document).ready(function()
        {
          <?php 
            if(isset($_GET["msn"]) and isset($_GET["t"]))
            {
              echo "swal('".$_GET["msn"]."','','".$_GET["t"]."');";
            }
           ?>
        });
    </script>
</html>