<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("warning");

		header("Location: ../Views/login.php?msn=".$mensaje."&t=".$tipo_mensaje);
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos/estilos_index.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilos_login.css">
	  	<!--Import Google Icon Font-->
	  	<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      	<link rel="stylesheet" type="text/css" href="sweetalert/sweetalert-master/dist/sweetalert.css">
      	<!--Let browser know website is optimized for mobile-->
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Prueba inicio de sesion</title>
		<nav>
    		<?php include_once("../Model/menu.php");?>
  		</nav>
	</head>
	<body>
		
	</body>
	<script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script src="sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
	  	$(document).ready(function() {
    	$(".dropdown-button").dropdown();
    	$(".button-collapse").sideNav();
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