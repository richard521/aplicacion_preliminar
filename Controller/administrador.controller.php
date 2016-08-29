<?php
	# -> Controller: usuario
	#Author: Londoño Ochoa
	session_start();
	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/administrador.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_usuario			=$_POST["Id_usuario"];

				try {
					administrador::Create($Id_usuario);
					$mensaje="Administrador registrado con exito.";
					$tipo_mensaje="success";
					header("Location: ../Views/pruebainicio.php?msn=".$mensaje."&t".$tipo_mensaje);
				} catch (Exception $e){
					$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
					$tipo_mensaje="error";
					header("Location: ../Views/administrador.php?msn=".$mensaje."&t".$tipo_mensaje);	
				}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_usuario 			=$_POST["Id_usuario"];
			$Nombre					=$_POST["Nombre"];
			$Apellido				=$_POST["Apellido"];
			$Clave					=$_POST["Clave"];
			$Email					=$_POST["Email"];
			$Telefono				=$_POST["Telefono"];
			$Sexo					=$_POST["Sexo"];
			$Estado					=$_POST["Estado"];
			try {
				usuario::Update($Nombre,$Apellido,$Clave,$Email,$Telefono,$Sexo,$Estado,$Id_usuario);
				$mensaje="Usuario actualizado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/gestion.php?msn=".$mensaje."&t".$tipo_mensaje);
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el usuario, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			try {
				$usuario = usuario::Delete($_REQUEST["ui"]);
				$mensaje="Usuario eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el usuario, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'L':
			#Login
			#inicializar las variables que enviara el formulario y las que se validaran en la tabla
			$Email				=$_POST["Email"];
			$Clave				=$_POST["Clave"];

			try {
				$usuario = usuario::Login($Email,$Clave);

				#utilizamos el metodo count para contar la cantidad de registros que retorna la consulta
				$usuario_existe = count($usuario[0]);

				if($usuario_existe == 0){
					$mensaje="Usuario o contraseña incorrectos.";
					$tipo_mensaje="advertencia";
					

					header("Location: ../Views/login.php?m=".$mensaje."&t".$tipo_mensaje);
				}else{
					#creamos variables de session

					$_SESSION["Id_usuario"]				= $usuario[0];
					$_SESSION["Tipo_usuario"]			= $usuario[1];
					$_SESSION["Nombre"]					= $usuario[2];
					$_SESSION["Apellido"]				= $usuario[3];
					$_SESSION["Clave"]					= $usuario[4];
					$_SESSION["Email"]					= $usuario[5];
					$_SESSION["Telefono"]				= $usuario[6];
					$_SESSION["Sexo"]					= $usuario[7];
					$_SESSION["Estado"]					= $usuario[8];

					header("Location: ../Views/pruebainicio.php?");
				}
			}catch(Exception $e){
				$mensaje=("Lo sentimos, ocurrio un error ".$e->getMessage());
				$tipo_mensaje=("error");

				header("Location: ../Views/login.php?m=".$mensaje."&t".$tipo_mensaje);
			}
	}
	// 
?>