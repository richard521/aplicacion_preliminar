<?php
	session_start();
	include ("../Model/empleado.class.php");
	include ("../Model/centro_servicio.class.php");
	include ("../Model/dbconn.php");
	$empleado = empleado::ReadInner();
	$centro = centro_servicio::ReadAll(); 
	/*$id_us = $_SESSION["Id_usuario"];
	$no_us = $_SESSION["Nombre"];*/
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
	<title>Registro cita</title>
  <nav class="grey darken-2">
  	<?php include_once("../Model/menu.php"); ?>
  </nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/cita.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Registro cita nueva</h3>
						<article>
							<div class="input-field col s12">
								<select name="Id_centro">
										<?php
											foreach ($centro as $fila ) {
												echo'<option value="'.$fila["Id_centro"].'">'.$fila["Nombre"].'</option>';
											}
										?>
										
								</select>
								<label>Centro de servicio</label>
							</div>
							<div class="input-field col s12">
								<select name="Id_usuario">
									<?php 
										echo '<option value="'.($_SESSION["Id_usuario"]).'">'.($_SESSION["Nombre"]).'</option>';
									 ?>
								</select>
								<label for="Id_usuario">Usuario</label>
							</div>
							<div class="input-field col s12">
								<select name="Id_empleado">
										<?php
											foreach ($empleado as $fila ) {
												echo'<option value="'.$fila["Id_empleado"].'">'.$fila["Nombre"].'</option>';
											}
										?>
										
								</select>
								<label>Empleado</label>
							</div>
							<div class="input-field col s12">
								<input type="date" class="datepicker" name="Fecha_cita" class="validate" required>
								<label for="Fecha_cita">Fecha</label>
							</div>
							<div class="input-field col s12">
								<input type="time" name="hora" class="validate" required>
								<!--<label for="Hora">Hora cita</label>-->
							</div> 
							<br>
								<a href="pruebahome.php" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
								<button class="waves-effect waves-light  btn right cyan darken-1 tooltipped" data-tooltip="Agendar" data-position="top" name="acc" value="C">Enviar</button>
							</div>
						</article>
				
			</form>
			<?php echo @$_GET["msn"]; ?>
		</div>
	</section>
		

	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.js"></script>	
      <script type="text/javascript">
      	$('.datepicker').pickadate({
    		selectMonths: true,
    		selectYears: 15 
  		});
  		$(document).ready(function() {
    	$('select').material_select();
  		});
      </script>
      <script src="sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>
      
</body>
</html>