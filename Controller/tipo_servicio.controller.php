<?php
	# -> Controller: usuario
	#Author: Londoño Ochoa
	session_start();
	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/tipo_servicio.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			
			$Nombre				=$_POST["Nombre"];
			
			try {
				tipo_servicio::Create($Nombre);
				$mensaje="Tipo de servicio creado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Nombre				=$_POST["Nombre"];
			try {
				tipo_servicio::Update($Nombre);
				$mensaje="Tipo de servicio actualizado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el tipo de servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_tipo				=$_POST["Id_tipo"];

			try {
				tipo_servicio::Delete($Id_tipo,$Nombre);
				$mensaje="Tipo de servicio eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el Tipo de servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		
	}
?>