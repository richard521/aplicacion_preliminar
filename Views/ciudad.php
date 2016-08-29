<?php
	session_start();
	include ("../Model/departamento.class.php");
	include ("../Model/dbconn.php"); 
	$departamento = departamento::ReadAll(); 
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
	<title>Registro ciudad</title>
  <nav>
    <?php 
    	include_once("../Model/menu.php");
     ?>
  </nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/ciudad.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Registro ciudad nueva</h3>
						<article>
							<div class="input-field col s12">
								<select name="Id_departamento" >
										<?php
											foreach ($departamento as $fila ) {
												echo'<option value="'.$fila["Id_departamento"].'">'.$fila["Nombre"].'</option>';
											}
										?>
										
								</select>
								<label>Departamento</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="Nombre" class="validate" length="10" required>
								<label for="Nombre">Nombre ciudad</label>
							</div>
							<a href="<?=$_SERVER['HTTP_REFERER'] ?>" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
							<button class="waves-effect waves-light  btn right cyan darken-1 tooltipped" data-tooltip="Crear" data-position="top" name="acc" value="C">Enviar</button>
						</article>
				
			</form>
		</div>
	</section>
		

	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.js"></script>
      <script src="sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>	
      <script type="text/javascript">
	  	$(document).ready(function() {
    	$('select').material_select();
  		});
	 </script>
</body>
</html>