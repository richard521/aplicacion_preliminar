<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
	if ($_SESSION["Tipo_usuario"]!="Desarrollador") {
		$mensaje=("No puede editar");
		header("Location: gestiondepartamento.php?m=".$mensaje);
	}
	require_once("../Model/dbconn.php");
	require_once("../Model/departamento.class.php");
	$departamento = departamento::ReadbyId($_REQUEST["di"]);
	if ($departamento==null) {
		$mensaje=("Selecciona un departamento");
		header("Location: gestiondepartamento.php?m=".$mensaje);
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
	<title>Editar cita</title>
  <nav>
    		<?php include_once("../Model/menu.php");?>
  		</nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/departamento.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Actualizar departamento</h3>
						<article>
							<div class="input-field col s12">
								<input type="number" name="Id_departamento" class="validate" value="<?php echo $departamento[0] ?>" readonly>
								<label for="Id_departamento">Codigo</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Nombre" class="validate" value="<?php echo $departamento[1] ?>" >
								<label for="Nombre">Nombre departamento</label>
							</div>
							<br>
								<a href="pruebainicio.php" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
								<button class="waves-effect waves-light  btn right cyan darken-1 tooltipped" data-tooltip="Modificar" data-position="top" name="acc" value="U">Enviar</button>
						</article>
				
			</form>
		</div>
	</section>
		

	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.js"></script>
      <script src="sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>	
</body>
</html>