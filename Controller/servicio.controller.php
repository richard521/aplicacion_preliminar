<?php
	# -> Controller: servicio
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/servicio.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_centro				=$_POST["Id_centro"];
			$Id_tipo				=$_POST["Id_tipo"];
			$Nombre					=$_POST["Nombre"];
			try {
				servicio::Create($Id_centro,$Id_tipo,$Nombre);
				$mensaje="Servicio registrado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/gestionservicios.php?msn=$mensaje&tm=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
				$tipo_mensaje="error";
				header("Location: ../Views/servicio.php?msn=$mensaje&tm=$tipo_mensaje");
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_servicio			=$_POST["Id_servicio"];
			$Id_centro				=$_POST["Id_centro"];
			$Id_tipo				=$_POST["Id_tipo"];
			$Nombre					=$_POST["Nombre"];
			try {
				servicio::Update($Id_centro,$Id_tipo,$Nombre,$Id_servicio);
				$mensaje="Servicio actualizado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/gestionservicios.php?msn=$mensaje&tm=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
				$tipo_mensaje="error";
				header("Location: ../Views/gestionservicios.php?msn=$mensaje&tm=$tipo_mensaje");
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			try {
				$servicio = servicio::Delete($_REQUEST["si"]);
				$mensaje="Servicio eliminado con exito.(Esta accion es irreversible)";
				$tipo_mensaje="success";
				header("Location: ../Views/gestionservicios.php?msn=$mensaje&tm=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
				$tipo_mensaje="error";
				header("Location: ../Views/gestionservicios.php?msn=$mensaje&tm=$tipo_mensaje");
			}
			break;
	}
?>
