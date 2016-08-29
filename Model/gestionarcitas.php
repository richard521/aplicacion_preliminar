<?php 
	if ($_SESSION["Tipo_usuario"]=="Usuario") {
 ?>
 	<table id="datatable" class="display">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Usuario</th>
          <th>Empleado</th>
          <th>Fecha</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php

      $cita = cita::ReadByUserId();
      foreach ($cita as $row) {    
      echo "<tr>
                <td>".$row["Id_cita"]."</td>
                <td>".$row["Id_usuario"]."</td>
                <td>".$row["Id_empleado"]."</td>
                <td>".$row["Fecha_cita"]."</td>
                <td>

                  <a href='editarcita.php?cii=".($row["Id_cita"])."'><i class='small material-icons'>mode_edit</i></a>
                  <a href='../Controller/cita.controller.php?cii=".($row["Id_cita"])."&acc=D'><i class='small material-icons'>delete</i></a>


                </td>
              </tr>";
          }
         ?>
        </tbody>
    </table>
<?php 
}elseif ($_SESSION["Tipo_usuario"]=="Administrador") {
 ?>
 <table id="datatable" class="display">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Usuario</th>
          <th>Empleado</th>
          <th>Fecha</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php

      $cita = cita::Read();
      foreach ($cita as $row) {    
      echo "<tr>
                <td>".$row["Id_cita"]."</td>
                <td>".$row["Id_usuario"]."</td>
                <td>".$row["Id_empleado"]."</td>
                <td>".$row["Fecha_cita"]."</td>
                <td>

                  <a href='editarcita.php?cii=".($row["Id_cita"])."'><i class='small material-icons'>mode_edit</i></a>
                  <a href='../Controller/cita.controller.php?cii=".($row["Id_cita"])."&acc=D'><i class='small material-icons'>delete</i></a>


                </td>
              </tr>";
          }
         ?>
        </tbody>
    </table>
<?php
}
?>