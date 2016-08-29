<?php
	# -> Controller: cita
	#Author: Londoño Ochoa
	session_start();
	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/cita.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_centro			=$_POST["Id_centro"];
			$Id_usuario			=$_POST["Id_usuario"];
			$Id_empleado		=$_POST["Id_empleado"];
			$Fecha_cita			=$_POST["Fecha_cita"];
			$Hora				=$_POST["hora"];
			
			try {
				cita::Create($Id_centro,$Id_usuario,$Id_empleado,$Fecha_cita,$Hora);
				$mensaje="Cita agendada con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=".$mensaje."&t=".$tipo_mensaje);
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
				$tipo_mensaje="error";
			}
			
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_cita 			=$_POST["Id_cita"];
			$Id_usuario			=$_POST["Id_usuario"];
			$Id_empleado		=$_POST["Id_empleado"];
			$Fecha_cita			=$_POST["Fecha_cita"];
			$Hora   			=$_POST["hora"];
			try {
				cita::Update($Id_empleado,$Fecha_cita,$Id_cita,$Id_usuario,$Hora);
				$mensaje="Cita actualizada con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=".$mensaje."&t=".$tipo_mensaje);
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar la cita, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			echo $mensaje;
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			try {
				$cita = cita::Delete($_REQUEST["cii"]);
				$mensaje="Cita eliminada con exito.(Esta accion es irreversible)";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=".$mensaje."&t=".$tipo_mensaje);
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar la cita, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		
	}
?>