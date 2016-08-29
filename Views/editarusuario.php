<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
	require_once("../Model/dbconn.php");
	require_once("../Model/usuario.class.php");
	$usuario = usuario::ReadbyId($_SESSION["Id_usuario"]);
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
	<title>Editar usuario</title>
  	<nav>
    		<?php include_once("../Model/menu.php");?>
  		</nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/usuario.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Actualizar usuario</h3>
						<article>
							<div class="input-field col s12">
								<input type="number" name="Id_usuario" class="validate" value="<?php echo $usuario[0] ?>" readonly >
								<label for="Id_usuario">Codigo</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Nombre" class="validate" value="<?php echo $usuario[2] ?>">
								<label for="Nombre">Nombre</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Apellido" class="validate" value="<?php echo $usuario[3] ?>">
								<label for="Apellido">Apellido</label>
							</div>
							<div class="input-field col s12">
								<input type="password" name="Clave" class="validate" value="<?php echo $usuario[4] ?>">
								<label for="Clave">Contraseña</label>
							</div>
							<div class="input-field col s12">
								<input type="email" name="Email" class="validate" value="<?php echo $usuario[5] ?>">
								<label for="Email">Correo electronico</label>
							</div>
							<div class="input-field col s12">
								<input type="number" name="Telefono" class="validate" value="<?php echo $usuario[6] ?>">
								<label for="Telefono">Telefono</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Sexo" class="validate" value="<?php echo $usuario[7] ?>" readonly>
								<label for="Sexo">Sexo</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Estado" class="validate" value="<?php echo $usuario[8] ?>" readonly>
								<label for="Estado">Estado</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Tipo_usuario" class="validate" value="<?php echo $usuario[1] ?>" readonly>
								<label for="Tipo_usuario">Tipo de usuario</label>
							</div>
							<!--<div class="input-field col s12">
								<h5>Sexo</h5>
									<p>
										<input name="Sexo" type="radio" id="femenino" value="Femenino" >
										<label for="femenino">Femenino</label>
									</p>
									<p>
										<input name="Sexo" type="radio" id="masculino" value="Masculino" >
										<label for="masculino">Masculino</label>
									</p>
									<p>
										<input name="Sexo" type="radio" id="sin_especificar" value="Sin especificar" >
										<label for="sin_especificar">Sin especificar</label>
									</p>
							</div>
							<div class="input-field col s12">
								<h5>Estado</h5>
									<p>
										<input type="checkbox" name="Estado" id="activo"  value="Activo" checked="checked" >
										<label for="activo">Activo</label>
									</p>
									<p>
										<input type="checkbox" name="Estado" id="inactivo"  value="Inactivo"  >
										<label for="inactivo">Inactivo</label>
									</p>-->
								<br>
								<a href="gestion.php" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
								<button class="waves-effect waves-light  btn right cyan darken-1 tooltipped" name="acc" value="U" data-tooltip="Modificar" data-position="top">Enviar</button>
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