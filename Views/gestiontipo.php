<?php
	session_start();

	if(!isset($_SESSION["Id_usuario"])){
		$mensaje=("Debes iniciar sesion primero");
		$tipo_mensaje=("advertencia");

		header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
	}
  require_once("../Model/dbconn.php");
	require_once("../Model/tipo_servicio.class.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
      <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
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
    <h1>Consultar Tipos de Servicio</h1>
    <table id="datatable" class="display">
      <thead>
        <tr>
          <th>Codigo Tipo de Servicio</th>
          <th>Nombre Tipo de Servicio</th>
          <!-- <th>Acciones</th> -->
        </tr>
      </thead>
      <tbody>
      <?php

      $tipo = tipo_servicio::ReadAll();
      foreach ($tipo as $row) {
      echo "<tr>
                <td>".$row["Id_tipo"]."</td>
                <td>".$row["Nombre"]."</td>
              
              </tr>";
      /*echo "<tr>
                <td>".$row["Id_empleado"]."</td>
                <td>".$row["Nombre"]."</td>
                <td>".$row["Apellido"]."</td>
                <td>".$row["Email"]."</td>
                <td>".$row["Telefono"]."</td>
                <td>".$row["Sexo"]."</td>
                <td>".$row["centro_servicio.Nombre"]."</td>
                <td>".$row["servicio.Nombre"]."</td>
                <td>".$row["Inicio"]."</td>
                <td>".$row["Fin"]."</td>
                <!--<td>

                  <a href='editarusuario.php?ui=".($row["Id_usuario"])."'><i class='small material-icons'>mode_edit</i></a>
                  <a href='../Controller/usuario.controller.php?ui=".($row["Id_usuario"])."&acc=D'><i class='small material-icons'>delete</i></a>


                </td>-->
              </tr>";*/

          }
         ?>
        </tbody>
    </table>
		<?php include '../Model/comp_footer.php'; ?>
  </body>

  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function() {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        });
  </script>
</html>
