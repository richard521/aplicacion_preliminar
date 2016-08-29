<?php
	session_start();

	if(isset($_SESSION["Id_usuario"])){
		header("Location: ../Views/pruebainicio.php");
	}
	//preguntar uso de funcion para omitir ciertos errores
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" type="text/css" href="estilos/estilos_login.css">
	  <!--Import Google Icon Font-->
	  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="sweetalert/sweetalert-master/dist/sweetalert.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="js/validalogin.js"></script>
	<title>Iniciar sesión</title>
</head>
<body background="images/login.jpg">

	<h3 id="titulo">Fusion-Look</h3>
	<section>
		<div class="row">
			<form action="../Controller/usuario.controller.php" method="POST" class="col s12" novalidate>
				<div class="row">
					<h3>Iniciar sesión</h3>
						<article>
							<div class="input-field col s12 ">
								<input type="text" id="Email" name="Email" class="validate " >
								<label for="Email" style="color:#616161">Correo electronico</label>
							</div>
							<div class="input-field col s12">
								<input type="password" id="Clave" name="Clave" class="validate">
								<label for="Clave" style="color:#616161">Contraseña</label>
								<p>
									<input type="checkbox" name="recordar" id="recordar" value="recordar">
									<label for="recordar">Mantener activa la sesión.</label>
								</p>
								<br>
								<button class="waves-effect waves-light btn right cyan darken-1" id="envio" name="acc" value="L" onclick="return validar()">Iniciar sesión</button>
								<a href="usuario.php" class="waves-effect waves-light btn right red darken-1" id="cancelar">Registrate</a>
								
								<div class="textos">
									<a href="#" aling="center">Olvide mi contraseña</a>
								</div>
							</div>				
						</article>
				</div>
			</form>

		</div>
	</section>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script src="sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
	  		$(document).ready(function()
	  		{
	  			<?php 
	  				if(isset($_GET["msn"]))
	  				{
	  					echo "swal('".$_GET["msn"]."','','success');";
	  				}
	  			 ?>
	  		})
	  </script>
	  <script type="text/javascript">
	  		$(document).ready(function()
	  		{
	  			<?php 
	  				if(isset($_GET["m"]) and isset($_GET["t"]))
	  				{
	  					echo "swal('".$_GET["m"]."','','".$_GET["t"]."');";
	  				}
	  			 ?>
	  		});
	  </script>
	  
</body>
</html>