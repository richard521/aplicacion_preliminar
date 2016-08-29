<?php
	# -> Controller: departamento
	#Author: Londoño Ochoa
	session_start();
	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/departamento.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Nombre 					=$_POST["Nombre"];
			
			try {
				departamento::Create($Nombre);
				$mensaje="Departamento creado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Nombre 					=$_POST["Nombre"];
			try {
				departamento::Update($Nombre);
				$mensaje="Departamento actualizado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el departamento, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
				$tipo_mensaje="error";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			}
			break;
		case 'D':
			# Delete
			# inicializamos las variables que enviara el formulario y las que se guardaran en la tabla
			try{
				$depar = departamento::Delete($_REQUEST["di"]);
				$mensaje="Departamento eliminado con exito.(Esta accion es irreversible)";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			}catch(Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar la ciudad, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
			}
			break;
		
	}
?>