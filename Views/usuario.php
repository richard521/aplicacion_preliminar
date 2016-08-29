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
	  <script type="text/javascript">
	  	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
        
        return /\d/.test(String.fromCharCode(keynum));
        }
	  </script>
	<title> Registro usuarios</title>
  <nav class="grey darken-2">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo" style="font-size:40px;">Fusion-Look</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="../index.php#q" class="iniciar">Quiénes somos</a></li>
          <li><a href="../index.php#a" class="iniciar">Administradores</a></li>
          <li><a href="../index.php#g" class="iniciar">Geolocalización</a></li>
          <li><a href="login.php" class="iniciar">Iniciar sesión</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
        <li><a href="login.php" style="color:grey darken-1; font-family: 'Poiret one'; font-size: 20px;">Iniciar sesión</a></li>
      </ul>
      </div>
    </nav>
</head>
<body>
	<section >
		<div class="row">
			<form action="../Controller/usuario.controller.php" method="POST" class="col s12">
				<div class="row">
					<h3>Registro usuario nuevo</h3>
						<article>
							<div class="input-field col s12">
								<input type="hidden" id="Tipo_usuario" name="Tipo_usuario" class="validate" value="Usuario" onkeypress="return validar(event)">
  							</div>
							<div class="input-field col s12">
								<input type="text" id="Nombre" name="Nombre" class="validate" onkeypress="return validar(event)">
								<label for="Nombre">Nombre</label>
							</div>
							<div class="input-field col s12">
								<input type="text" id="Apellido" name="Apellido" class="validate" onkeypress="return validar(event)">
								<label for="Apellido">Apellido</label>
							</div>
							<div class="input-field col s12">
								<input type="password" id="Clave" name="Clave" class="validate">
								<label for="Clave">Contraseña</label>
							</div>
							<div class="input-field col s12">
								<input type="text" id="Email" name="Email" class="validate">
								<label for="Email">Correo electronico</label>
							</div>
							<div class="input-field col s12">
								<input type="text" id="Telefono" name="Telefono" class="validate" onkeypress="return justNumbers(event);">
								<label for="Telefono">Telefono(Celular)</label>
							</div>
							<div class="input-field col s12">
								<h5>Sexo</h5>
									<p>
										<input name="Sexo" type="radio" id="femenino" value="Femenino" required>
										<label for="femenino">Femenino</label>
									</p>
									<p>
										<input name="Sexo" type="radio" id="masculino" value="Masculino" required>
										<label for="masculino">Masculino</label>
									</p>
									<p>
										<input name="Sexo" type="radio" id="sin_especificar" value="Sin especificar" required>
										<label for="sin_especificar">Sin especificar</label>
									</p>
							</div>
							<div class="input-field col s12">
								<h5>Estado</h5>
									<p>
										<input type="checkbox" name="Estado" id="activo"  value="Activo" checked="checked" required>
										<label for="activo">Activo</label>
									</p>
									<p>
										<input type="checkbox" name="Estado" id="inactivo"  value="Inactivo" disabled="disabled" required>
										<label for="inactivo">Inactivo</label>
									</p>
								<br>
								<a href="<?=$_SERVER['HTTP_REFERER'] ?>" class="waves-effect waves-light btn red darken-1 left tooltipped" data-tooltip="Volver" data-position="top">Cancelar</a>
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
	  				if(isset($_GET["msn"]))
	  				{
	  					echo "swal('".$_GET["msn"]."','','error');";
	  				}
	  			 ?>
	  		})
	  </script>
</body>
</html>