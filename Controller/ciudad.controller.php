<?php 
	# -> Controller: ciudad
	# -> Author: Londoño Ochoa

	//Hacemos conexion a la base de datos
	require_once("../Model/dbconn.php");
	//Traemos las clases necesarias
	require_once("../Model/ciudad.class.php");
	//instanciamos las variables globales y una llamada"$accion"
	//la variable accion nos indicara que parte del CRUD estamos creando

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializamos las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_departamento 		=$_POST["Id_departamento"];
			$Nombre 				=$_POST["Nombre"];
			try{
				ciudad::Create($Id_departamento,$Nombre);
				$mensaje="Ciudad registrada con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			}catch(Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
			}
			break;
		case 'U':
			# Update			# inicializamos las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_ciudad				=$_POST["Id_ciudad"];
			$Id_departamento 		=$_POST["Id_departamento"];
			$Nombre 				=$_POST["Nombre"];
			try{
				ciudad::Update($Id_departamento,$Nombre,$Id_ciudad);
				$mensaje="Ciudad actualizada con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			}catch(Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar la ciudad, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
			}
			break;
		case 'D':
			# Delete
			# inicializamos las variables que enviara el formulario y las que se guardaran en la tabla
			try{
				$ciudad = ciudad::Delete($_REQUEST["cui"]);
				$mensaje="Ciudad eliminada con exito.(Esta accion es irreversible)";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			}catch(Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar la ciudad, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
			}
			break;
	}
?>