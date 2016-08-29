<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
	//$usuario = usuario::ReadbyId($_REQUEST["Id"]);
  require_once("../Model/dbconn.php");
	require_once("../Model/servicio.class.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <!--Import Google Icon Font-->
	  <!--<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>-->
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
      	$('#datatable').DataTable();
    	});
    </script>
    </head>
  	<body>
    <h1>Gestion de servicios</h1>

    <a href="servicio.php">Nuevo servicio</a>

    <table id="datatable" class="display">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Centro de servicio</th>
          <th>Tipo de servicio</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php

      $servicio = servicio::ReadAll();
      foreach ($servicio as $row) {
      echo "<tr>
                <td>".$row["Id_servicio"]."</td>
                <td>".$row["Id_centro"]."</td>
                <td>".$row["Id_tipo"]."</td>
                <td>".$row["Nombre"]."</td>
                <td>

                  <a href='editaservicio.php?si=".($row["Id_servicio"])."'><i class='small material-icons'>mode_edit</i></a>
                  <a href='../Controller/servicio.controller.php?si=".($row["Id_servicio"])."&acc=D'><i class='small material-icons'>delete</i></a>


                </td>
              </tr>";
      }
         ?>
        </tbody>
    </table>
  </body>
</html>