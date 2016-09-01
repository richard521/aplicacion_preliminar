<?php

	if (isset($_GET['ci'])) {
		$mensaje="Seleccione un centro de servicio";
		$tipo_mensaje="warning";
		header("Location ../Views/dashboard.php");
	}
	session_start();
	include ("../Model/empleado.class.php");
	include ("../Model/centro_servicio.class.php");
	include ("../Model/dbconn.php");
	$empleado = empleado::ReadInner();
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
								<input type="text" name="Id_centro" value="<?php echo $_GET['ci'] ?>">
							</div>
							<div class="input-field col s12">
								<input type="text" name="Id_usuario" hidden value="<?php echo ($_SESSION["Id_usuario"]) ?>">
								<input type="text" name="Nombre" value="<?php echo ($_SESSION["Nombre"]) ?>">
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
							<div class="input-field col s6">
								<input type="date" class="datepicker" name="Fecha_cita" class="validate" min="<?php echo date('Y-m-d') ?>" required>
								<label for="Fecha_cita">Fecha</label>
							</div>
							<div class="input-field col s3">
								<select name="hora">
									<option value="12:00">12:00</option>
                  <option value="1:00">1:00</option>
                  <option value="2:00">2:00</option>
                  <option value="3:00">3:00</option>
                  <option value="4:00">4:00</option>
                  <option value="5:00">5:00</option>
                  <option value="6:00">6:00</option>
                  <option value="7:00">7:00</option>
                  <option value="8:00">8:00</option>
                  <option value="9:00">9:00</option>
                  <option value="10:00">10:00</option>
                  <option value="11:00">11:00</option>
								</select>
							</div>
							<div class="input-field col s3">
								<select id="jornada" name="jornada">
                  <option value="am">am</option>
                  <option value="pm">pm</option>
                </select>
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
	<script type="text/javascript">
		alert("<?php echo date('Y-n-j') ?>");
	</script>

	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.js"></script>
      <script type="text/javascript">
      	$('.datepicker').pickadate({
    		selectMonths: true,
    		selectYears: 1,
				min: new Date("<?php echo date('Y-n-j') ?>"),
  		});
  		$(document).ready(function() {
    	$('select').material_select();
  		});
      </script>
      <script src="sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>
      <?php include '../Model/comp_footer.php'; ?>
</body>
</html>
