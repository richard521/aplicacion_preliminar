<?php 
	include ("../Model/usuario.class.php");
	include ("../Model/dbconn.php");
	$user = usuario::ReadAdm();
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
	  <script src="js/valida.js"></script>
	  <script type="text/javascript">
		function validar(e) {
		tecla = (document.all) ? e.keyCode : e.which;
		if (tecla==8) return true;
		patron =/[A-Za-z\s]/;
		te = String.fromCharCode(tecla);
		return patron.test(te);
		}
	  </script>
	  <!--<script type="text/javascript">
		function numeros(nu) {
		tecla = (document.all) ? e.keyCode : e.which;
		if (tecla==8) return true;
		ppatron = /\d/;
		te = String.fromCharCode(tecla);
		return patron.test(te);
		}
	  </script>-->
	  <!--<script type="text/javascript">
	  	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
	  </script>-->
	<title>Registro administradores</title>
  <nav class="grey darken-1">
    <div class="nav-wrapper">
      <a href="pruebahome.php" class="brand-logo" id="titulo">Fusion-Look</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!--<li><a href="login.php">Iniciar sesión</a></li>-->
      </ul>
    </div>
  </nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/administrador.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Administrador nuevo</h3>
						<article>
							<div class="input-field col s12">
								<div class="input-field col s12">
								<select name="Id_usuario">
										<?php
											foreach ($user as $fila ) {
												echo'<option value="'.$fila["Id_usuario"].'">'.$fila["Nombre"].'</option>';
											}
										?>
										
								</select>
								<label>Usuario</label>
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
	  <script type="text/javascript">
	  		$(document).ready(function()
	  		{
	  			<?php 
	  				if(isset($_GET["msn"]) and isset($_GET["t"]))
	  				{
	  					echo "swal('".$_GET["msn"]."','','".$_GET["t"]."');";
	  				}
	  			 ?>
	  		});
	  </script>
</body>
</html>