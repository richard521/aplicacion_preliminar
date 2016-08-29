<?php
	# -> Controller: centro_servicio
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/centro_servicio.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_administrador		=$_POST["Id_administrador"];
			$Id_ciudad				=$_POST["Id_ciudad"];
			$Nombre					=$_POST["Nombre"];
			$Direccion				=$_POST["Direccion"];
			$Email					=$_POST["Email"];
			$Telefono				=$_POST["Telefono"];
			
			try {
				centro_servicio::Create($Id_administrador,$Id_ciudad,$Nombre,$Direccion,$Email,$Telefono);
				$mensaje="Centro de servicio registrado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
				header("Location: ../Views/centro_servicio.php?m=$mensaje");
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_centro				=$_POST["Id_centro"];
			$Id_ciudad				=$_POST["Id_ciudad"];
			$Nombre					=$_POST["Nombre"];
			$Direccion				=$_POST["Direccion"];
			$Email					=$_POST["Email"];
			$Telefono				=$_POST["Telefono"];
			try {
				centro_servicio::Update($Id_ciudad,$Nombre,$Direccion,$Email,$Telefono,$Id_centro);
				$mensaje="Centro de servicio actualizado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el usuario, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			if($_SESSION["Tipo_usuario"]!= "Administrador"){
		    $mensaje=("Usted no tiene permiso para eliminar");
		    $tipo_mensaje=("warning");
		    header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
		 	}
			elseif($_SESSION["Tipo_usuario"]=="Administrador"){
				try {
				$centro = centro_servicio::Delete($_REQUEST["ci"]);
				$mensaje="Centro de servicio eliminado con exito.(Esta accion es irreversible)";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");

			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el usuario, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
				$tipo_mensaje="error";
		}
	}
			break;
	} 
?>