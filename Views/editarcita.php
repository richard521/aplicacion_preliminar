<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
	require_once("../Model/dbconn.php");
	require_once("../Model/cita.class.php");
	include ("../Model/empleado.class.php");
	$empleado = empleado::ReadInner();
	$cita = cita::ReadbyId($_REQUEST["cii"]);
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
	<title>Editar cita</title>
  <nav class="grey darken-2">
  	<?php include_once("../Model/menu.php"); ?>
  </nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/cita.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Modificar cita</h3>
						<article>
							<div class="input-field col s12">
								<input type="number" name="Id_cita" class="validate" value="<?php echo $cita[0] ?>" readonly>
								<label for="Id_cita">Cita</label>
							</div>
							<div class="input-field col s12">
								<input type="number" name="Id_usuario" class="validate" value="<?php echo $cita[2] ?>" readonly>
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
							<!--<div class="input-field col s12">
								<input type="number" name="Id_empleado" class="validate" value="<?php echo $cita[2] ?>" >
								<label for="Id_empleado">Empleado</label>
							</div>-->
							<div class="input-field col s12">
								<input type="text" class="datepicker validate" name="Fecha_cita" value="<?php echo $cita[4] ?>">
								<label for="Fecha_cita">Fecha</label>
							</div>
							<div class="input-field col s12">
								<input type="time"name="hora" value="<?php echo $cita[5] ?>">
							</div>
							<br>
								<a href="pruebahome.php" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
								<button class="waves-effect waves-light  btn right cyan darken-1 tooltipped" data-tooltip="Modificar" data-position="top" name="acc" value="U">Enviar</button>
							</div>
						</article>
				
			</form>
			<!--<?php //echo @$_GET["msn"]; ?>-->
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