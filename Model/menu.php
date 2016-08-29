<?php
  if($_SESSION["Tipo_usuario"] == NULL){
    $mensaje="Debes iniciar sesion primero";
    $tipo_mensaje="warning";
    header("Location: ../index.php?msn=".$mensaje."&t=".$tipo_mensaje);
?>
<?php
}elseif($_SESSION["Tipo_usuario"]=="Usuario"){
?>
    <div class="nav-wrapper grey darken-1">
        <style type="text/css">
        .brand-logo {font-family: 'Poiret One'}
      </style>
        <ul id="centros" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="gestioncentros.php"style="color: white;">Consultar</a></li>
        </ul>
        <ul id="cita" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="cita.php"style="color: white;">Agendar cita</a></li>
            <li><a href="gestioncita.php"style="color: white;">Mis citas</a></li>
        </ul>
        <ul id="perfil" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="#"style="color: white;"><?php echo($_SESSION["Tipo_usuario"]).": ".($_SESSION["Nombre"])." "?></a></li>
            <li><a href="editarusuario.php"style="color: white;">Modificar</a></li>
        </ul>
            <a href="#" class="brand-logo">Fusion-Look</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="pruebainicio.php">Inicio</a></li>
              <li><a href="#" class="dropdown-button" data-activates="centros">Centros de servicio</a></li>
              <li><a href="#" class="dropdown-button" data-activates="cita">Mis Citas</a></li>
              <li><a href="#" class="dropdown-button" data-activates="perfil">Mi perfil</a></li>
              <li><a href="../Model/cerrarsesion.php">Cerrar sesion</a></li>
            </ul>
            <!--<ul class="side-nav" id="mobile-demo">
              <li><a href="#">Inicio</a></li>
              <li><a href="gestioncentros.php">Centros de servicio</a></li>
              <li><a href="gestioncita.php">Mis citas</a></li>
              li><a href="#">Mi perfil</a></li>
              <li><a href="../Model/cerrarsesion.php">Cerrar sesion</a></li>
            </ul>-->
    </div>
<?php
}elseif($_SESSION["Tipo_usuario"]=="Administrador"){
?>
    <div class="nav-wrapper grey darken-1">
        <style type="text/css">
        .brand-logo {font-family: 'Poiret One'}
      </style>
        <ul id="centros" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="centro_servicio.php"style="color: white;">Crear</a></li>
            <li><a href="gestioncentros.php"style="color: white;">Gestionar</a></li>
        </ul>
        <ul id="empleados" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="empleado.php"style="color: white;">Crear</a></li>
            <li><a href="gestionempleado.php"style="color: white;">Gestionar</a></li>
        </ul>
        <ul id="servicios" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="servicio.php"style="color: white;">Crear</a></li>
            <li><a href="gestionservicios.php"style="color: white;">Gestionar</a></li>
        </ul>
        <ul id="tiposer" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="tipo_servicio.php"style="color: white;">Crear</a></li>
            <li><a href="#"style="color: white;">Consultar</a></li>
        </ul>
        <ul id="perfil" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="#"style="color: white;"><?php echo($_SESSION["Tipo_usuario"]).": ".($_SESSION["Nombre"])." "?></a></li>
            <li><a href="editarusuario.php"style="color: white;">Modificar</a></li>
        </ul>
            <a href="#" class="brand-logo">Fusion-Look</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="#" class="dropdown-button" data-activates="centros">Centros de servicio</a></li>
              <li><a href="#" class="dropdown-button" data-activates="empleados">Empleados</a></li>
              <li><a href="gestioncita.php">Citas</a></li>
              <!--<li><a href="servicio.php">Servicios</a></li>
              <li><a href="tipo_servicio.php">Tipos de servicio</a></li>-->
              <li><a href="#" class="dropdown-button" data-activates="perfil">Mi perfil</a></li>
              <li><a href="../Model/cerrarsesion.php">Cerrar sesion</a></li>
            </ul>
            <!--<ul class="side-nav" id="mobile-demo">
              <li><a href="#" class="dropdown-button" data-activates="centros">Centros de servicio</a></li>
              <li><a href="#" class="dropdown-button" data-activates="empleados">Empleados</a></li>
              <li><a href="gestioncita.php">Citas</a></li>
              <li><a href="../Model/cerrarsesion.php">Cerrar sesion</a></li>
            </ul>-->
    </div>


<?php
}elseif($_SESSION["Tipo_usuario"]=="Desarrollador"){
?>
    <div class="nav-wrapper grey darken-1">
        <style type="text/css">
        .brand-logo {font-family: 'Poiret One'}
        </style>
        <ul id="desarrollo" class="dropdown-content grey darken-1" style="margin-top: 64px;">
            <li><a href="desarrollo.php" style="color: white;">Crear</a></li>
            <li><a href="gestiondesarrollo.php" style="color: white;">Consultar</a></li>
        </ul>
        <ul id="admins" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="administrador.php" style="color: white;">Crear</a></li>
            <li><a href="gestionadmins.php" style="color: white;">Gestionar</a></li>
        </ul>
        <ul id="users" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="gestion.php" style="color: white;">Gestionar</a></li>
        </ul>
        <ul id="departamentos" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="departamento.php" style="color: white;">Crear</a></li>
            <li><a href="gestiondepartamento.php" style="color: white;">Gestionar</a></li>
        </ul>
        <ul id="ciudades" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="ciudad.php" style="color: white;">Crear</a></li>
            <li><a href="gestionciudad.php" style="color: white;">Gestionar</a></li>
        </ul>
        <ul id="perfil" class="dropdown-content grey darken-1"style="margin-top: 64px;">
            <li><a href="#"style="color: white;"><?php echo($_SESSION["Tipo_usuario"]).": ".($_SESSION["Nombre"])." "?></a></li>
            <li><a href="editarusuario.php"style="color: white;">Modificar</a></li>
        </ul>
            <a href="pruebainicio.php" class="brand-logo">Fusion-Look</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="#" class="dropdown-button" data-activates="desarrollo">Desarrolladores</a></li>
              <li><a href="#" class="dropdown-button" data-activates="admins">Administradores</a></li>
              <li><a href="#" class="dropdown-button" data-activates="users">Usuarios</a></li>
              <li><a href="#" class="dropdown-button" data-activates="departamentos">Departamentos</a></li>
              <li><a href="#" class="dropdown-button" data-activates="ciudades">Ciudades</a></li>
              <li><a href="#" class="dropdown-button" data-activates="perfil">Mi perfil</a></li>
              <li><a href="../Model/cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
            <!--<ul class="side-nav" id="mobile-demo">
              <li><a href="#" class="dropdown-button" data-activates="desarrollo">Desarrolladores</a></li>
              <li><a href="#" class="dropdown-button" data-activates="admins">Administradores</a></li>
              <li><a href="#" class="dropdown-button" data-activates="users">Usuarios</a></li>
              <li><a href="#" class="dropdown-button" data-activates="departamentos">Departamentos</a></li>
              <li><a href="#" class="dropdown-button" data-activates="ciudades">Ciudades</a></li>
              <li><a href="../Model/cerrarsesion.php">Cerrar sesion</a></li>
            </ul>-->
    </div>
<?php
}
?>