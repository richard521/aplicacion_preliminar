<?php 
	session_start();
	include ("../Model/usuario.class.php");
	include ("../Model/centro_servicio.class.php");
	include ("../Model/servicio.class.php");
	include ("../Model/dbconn.php");

	if($_SESSION["Tipo_usuario"] != "Administrador"){
		$mensaje="lo sentimos usted no puede agregar empleados";
		header("Location: index.php?m=$mensaje");
	}
	$user = usuario::Reademp();
	$servicio = servicio::ReadAll();
	$centro = centro_servicio::ReadAll();
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
	<title>Registro empleado</title>
  <nav class="grey darken-2">
  	<?php include_once("../Model/menu.php"); ?>
  </nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/empleado.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Registro empleado nuevo paso 2</h3>
						<article>
							<div class="input-field col s12">
								<select name="Id_usuario">
										<?php
											foreach ($user as $fila ) {
												echo'<option value="'.$fila["Id_usuario"].'">'.$fila["Nombre"].'</option>';
											}
										?>
									<label>Empleado</label>
								</select>
								<select name="Id_centro">
										<?php
											foreach ($centro as $fila ) {
												echo'<option value="'.$fila["Id_centro"].'">'.$fila["Nombre"].'</option>';
											}
										?>
										
								</select>
								<select name="Id_servicio">
										<?php
											foreach ($servicio as $fila ) {
												echo'<option value="'.$fila["Id_servicio"].'">'.$fila["Nombre"].'</option>';
											}
										?>
										
								</select>
								<div class="input-field col s12">
									<input type="text" id="Inicio" name="Inicio" class="validate" onkeypress="return validar(event)">
									<label for="Inicio">Hora de inicio</label>
  								</div>
	  							<div class="input-field col s12">
									<input type="text" id="Fin" name="Fin" class="validate" onkeypress="return validar(event)">
									<label for="Fin">Hora fin</label>
	  							</div>
									<a href="pruebahome.php" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
									<button class="waves-effect waves-light  btn right cyan darken-1" name="acc" value="C" onclick="return valida()">Enviar</button>
								</div>
						</article>
				
			</form>
			
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