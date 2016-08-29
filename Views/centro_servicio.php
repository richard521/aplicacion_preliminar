<?php
	session_start();
	include ("../Model/ciudad.class.php");
	include ("../Model/administrador.class.php");
	include ("../Model/dbconn.php");
	$ciudad = ciudad::ReadAll();
	$admin = administrador::ReadInner();
	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
	if ($_SESSION["Tipo_usuario"]!== "Administrador") {
		$mensaje=("Lo sentimos, debes ser administrador para ejecutar esta accion.");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	  <link rel="stylesheet" type="text/css" href="estilos/estilos_index.css">
	<link rel="stylesheet" type="text/css" href="estilos/estilos_usuario.css">
	  <!--<link rel="stylesheet" type="text/css" href="estilos/estilos_usuario.css">-->
	  <!--Import Google Icon Font-->
	  <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="sweetalert/sweetalert-master/dist/sweetalert.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Registro centros</title>
  <nav class="cyan darken-1">
    <?php include_once("../Model/menu.php"); ?>
  </nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/centro_servicio.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Registro centro nuevo</h3>
						<article>
							<div class="input-field col s12">
								<select name="Id_administrador" >
										<?php
											foreach ($admin as $fila ) {
												echo'<option value="'.$fila["Id_administrador"].'">'.$fila["Nombre"].'</option>';
											}
										?>
								</select>
								<label>Administrador</label>
							</div>
							<div class="input-field col s12">
								<select name="Id_ciudad" >
										<?php
											foreach ($ciudad as $fila ) {
												echo'<option value="'.$fila["Id_ciudad"].'">'.$fila["Nombre"].'</option>';
											}
										?>
								</select>
								<label>Ciudad</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Nombre" class="validate" required>
								<label for="Nombre">Nombre centro</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Direccion" class="validate" required>
								<label for="Direccion">Direccion</label>
							</div>
							<div class="input-field col s12">
								<input type="email" name="Email" class="validate" required>
								<label for="Email">Correo electronico</label>
							</div>
							<div class="input-field col s12">
								<input type="number" name="Telefono" class="validate" required/>
								<label for="Telefono">Telefono</label>
							</div>
							<br>
								<a href="pruebahome.php" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
								<button class="waves-effect waves-light  btn right cyan darken-1 tooltipped" data-tooltip="Crear" data-position="top" name="acc" value="C">Enviar</button>
							</div>
						</article>
				
			</form>
			<?php echo @$_GET["msn"]; ?>
		</div>
	</section>
		

	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	  <script src="sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>
	  <script type="text/javascript">
	  	$(document).ready(function() {
    	$('select').material_select();
  		});
	 </script>
</body>
</html>