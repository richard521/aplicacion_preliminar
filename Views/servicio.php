<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");
		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
	require_once("../Model/dbconn.php");
	require_once("../Model/centro_servicio.class.php");
	require_once("../Model/tipo_servicio.class.php");
	$tipo=tipo_servicio::ReadAll();
	$centro=centro_servicio::Readby();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos/estilos_index.css">
<link rel="stylesheet" type="text/css" href="estilos/estilos_usuario.css">
	  <!--<link rel="stylesheet" type="text/css" href="estilos/estilos_usuario.css">-->
	  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="sweetalert/sweetalert-master/dist/sweetalert.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Agregar servicio</title>
	<nav>
    <?php include_once("../Model/menu.php");?>
  </nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/servicio.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Registro servicio nuevo</h3>
						<article>
							<div class="input-field col s12">
								<select name="Id_centro" >
										<?php
											foreach ($centro as $fila ) {
												echo'<option value="'.$fila["Id_centro"].'">'.$fila["centronombre"].'</option>';
											}
										?>
								</select>
								<label>Centro de servicio</label>
							</div>
							<div class="input-field col s12">
								<select name="Id_tipo" >
										<?php
											foreach ($tipo as $fila ) {
												echo'<option value="'.$fila["Id_tipo"].'">'.$fila["Nombre"].'</option>';
											}
										?>
								</select>
								<label>Centro de servicio</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Nombre" class="validate" required>
								<label for="Nombre">Nombre servicio</label>
							</div>
								<br>
								<a href="gestionservicios.php" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
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
			<?php include '../Model/comp_footer.php'; ?>
</body>
</html>
