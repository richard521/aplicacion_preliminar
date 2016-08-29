<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
  if($_SESSION["Tipo_usuario"]!=="Desarrollador"){
    $mensaje=("Solo los desarrolladores tienen acceso a este contenido");
    $tipo_mensaje=("advertencia");
    header("Location: editarusuario.php?m=".$mensaje."&t=".$tipo_mensaje);
  }
  require_once("../Model/dbconn.php");
	require_once("../Model/usuario.class.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos/estilos_index.css">
    <title></title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <!--Import Google Icon Font-->
	    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="sweetalert/sweetalert-master/dist/sweetalert.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!--datatable-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

      <script>
    	$(document).ready( function () {
      	$('#datatable').DataTable({
           "language": {               
                     "url": "https://cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"       
                } 
              })
      }); 
    </script>
      <nav>
        <?php include_once("../Model/menu.php");?>
      </nav>
    </head>
  	<body>
    <h1>Consultar desarrolladores</h1>
    <table id="datatable"><!-- class="display highlight responsive-table">-->
    <a href="desarrollo.php" class="waves-effect waves-light btn grey darken-1">Crear nuevo</a>
      <thead>
        <tr>
          <th>N° Administrador</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo Electronico</th>
          <th>Telefono</th>
          <th>Sexo</th>
          <th>Perfil</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $desarrollo = usuario::ReadDev();
      //$centro = centro_servicio::ReadbyIdadmin();
      foreach ($desarrollo as $row) {    
      echo "<tr>
                <td>".$row["Id_usuario"]."</td>
                <td>".$row["Nombre"]."</td>
                <td>".$row["Apellido"]."</td>
                <td>".$row["Email"]."</td>
                <td>".$row["Telefono"]."</td>
                <td>".$row["Sexo"]."</td>
                <td>".$row["Tipo_usuario"]."</td>
              </tr>";
          }
         ?>
        </tbody>
    </table>
  </body>
      <!--<script type="text/javascript" src="js/jquery-1.12.3.js"></script>-->
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        });
      </script>
</html>