<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
  require_once("../Model/dbconn.php");
	require_once("../Model/ciudad.class.php");
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos/estilos_index.css">
    <title>Gestion ciudad</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <!--Import Google Icon Font-->
	  <!--<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>-->
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
      <?php 
        include_once("../Model/menu.php")
       ?>
    </nav>
    </head>
  	<body>
    <h1>Gestion de ciudades</h1>
    <table id="datatable" class="display">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Departamento</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php

      $ciudad = ciudad::ReadAll();
      foreach ($ciudad as $row) {    
      echo "<tr>
                <td>".$row["Id_ciudad"]."</td>
                <td>".$row["Id_departamento"]."</td>
                <td>".$row["Nombre"]."</td>
                <td>

                  <a href='editarciudad.php?cui=".($row["Id_ciudad"])."'><i class='small material-icons' style='color: #757575'>mode_edit</i></a>
                  <a href='../Controller/ciudad.controller.php?cui=".($row["Id_ciudad"])."&acc=D'><i class='small material-icons' style='color: #757575'>delete</i></a>


                </td>
              </tr>";
          }
         ?>
        </tbody>
    </table>
  </body>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function() {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        });
  </script>
</html>