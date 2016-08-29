<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("warning");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
  require_once("../Model/dbconn.php");
	require_once("../Model/centro_servicio.class.php");
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
    <nav class="cyan darken-1">
    <?php include_once("../Model/menu.php"); ?>
  </nav>
    </head>
  	<body>
    <h1>Gestion centros de servicio</h1>
    <table id="datatable" class="display highlight responsive-table">
      <thead>
        <tr>
          <th>Administrador</th>
          <th>Codigo</th>
          <th>Ciudad</th>
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Correo electronico</th>
          <th>Telefono</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <!--<?php
      $centro = centro_servicio::Readby();
      //$centro = centro_servicio::ReadbyIdadmin();
      foreach ($centro as $row) {    
      echo "<tr>
                <td>".$row["usuarionombre"]."</td>
                <td>".$row["Id_centro"]."</td>
                <td>".$row["ciudadnombre"]."</td>
                <td>".$row["centronombre"]."</td>
                <td>".$row["Direccion"]."</td>
                <td>".$row["Email"]."</td>
                <td>".$row["Telefono"]."</td>
                <td>

                  <a href='editarcentro.php?ci=".($row["Id_centro"])."'><i class='small material-icons' style='color: #757575'>mode_edit</i></a>
                  <a href='../Controller/centro_servicio.controller.php?ci=".($row["Id_centro"])."&acc=D'><i class='small material-icons' style='color: #757575'>delete</i></a>


                </td>
              </tr>";
          }
         ?>*-->
         <?php
      $centro = centro_servicio::ReadAll();
      //$centro = centro_servicio::ReadbyIdadmin();
      foreach ($centro as $row) {    
      echo "<tr>
                <td>".$row["Id_administrador"]."</td>
                <td>".$row["Id_centro"]."</td>
                <td>".$row["Id_ciudad"]."</td>
                <td>".$row["Nombre"]."</td>
                <td>".$row["Direccion"]."</td>
                <td>".$row["Email"]."</td>
                <td>".$row["Telefono"]."</td>
                <td>

                  <a href='editarcentro.php?ci=".($row["Id_centro"])."'><i class='small material-icons' style='color: #757575'>mode_edit</i></a>
                  <a href='../Controller/centro_servicio.controller.php?ci=".($row["Id_centro"])."&acc=D'><i class='small material-icons' style='color: #757575'>delete</i></a>


                </td>
              </tr>";
          }
         ?>
        </tbody>
    </table>
  </body>
      
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
      <script src="sweetalert/sweetalert-master/dist/sweetalert.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function() {
      $('select').material_select();
      });
      </script>
</html>