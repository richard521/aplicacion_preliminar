<?php
	# -> Controller: usuario
	#Author: Londoño Ochoa
	session_start();
	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/usuario.class.php");
	require_once("../Model/empleado.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Tipo_usuario			=$_POST["Tipo_usuario"];
			$Nombre					=$_POST["Nombre"];
			$Apellido				=$_POST["Apellido"];
			$Clave					=$_POST["Clave"];
			$Email					=$_POST["Email"];
			$Telefono				=$_POST["Telefono"];
			$Sexo					=$_POST["Sexo"];
			$Estado					=$_POST["Estado"];
			$centro					=$_POST["Id_centro"];
			$servicio				=$_POST["Id_servicio"];
			$inicio				=$_POST["inicio"];
			$fin				=$_POST["fin"];
			if ($Tipo_usuario=="Usuario") {
				try {
					usuario::Create($Tipo_usuario,$Nombre,$Apellido,$Clave,$Email,$Telefono,$Sexo,$Estado);
					$mensaje="Usuario registrado con exito.";
					$tipo_mensaje="success";
					header("Location: ../Views/login.php?msn=$mensaje&t=$tipo_mensaje");
				} catch (Exception $e){
					$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
					$tipo_mensaje="error";
					header("Location: ../Views/usuario.php?msn=$mensaje&t=$tipo_mensaje");
				}
			}
			else if($Tipo_usuario=="Desarrollador"){
				try {
					usuario::Create($Tipo_usuario,$Nombre,$Apellido,$Clave,$Email,$Telefono,$Sexo,$Estado);
					$mensaje="Desarrollador registrado con exito.";
					$tipo_mensaje="success";
					header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
				} catch (Exception $e){
					$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
					$tipo_mensaje="error";
					header("Location: ../Views/admins.php?msn=$mensaje&t=$tipo_mensaje");
				}
			}
			else if($Tipo_usuario=="Administrador"){
				try {
					usuario::Create($Tipo_usuario,$Nombre,$Apellido,$Clave,$Email,$Telefono,$Sexo,$Estado);
					$idusuario=usuario::compmail($Email);
					usuario::createadmin($idusuario["Id_usuario"]);
					$mensaje="hola";
					$tipo_mensaje="success";
					header("Location: ../Views/gestionadmins.php?msn=$mensaje&t=$tipo_mensaje");

				} catch (Exception $e){
					$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
					$tipo_mensaje="error";
					header("Location: ../Views/gestionadmins.php?msn=$mensaje&t=$tipo_mensaje");

				}
			}
			else if($Tipo_usuario=="Empleado"){
				try {
					usuario::Create($Tipo_usuario,$Nombre,$Apellido,$Clave,$Email,$Telefono,$Sexo,$Estado);
					$idusu=usuario::compmail($Email);
					usuario::createemple($idusu["Id_usuario"],$centro,$servicio,$inicio,$fin);
					$mensaje="Empleado registrado con exito.";
					$tipo_mensaje="success";
					header("Location: ../Views/gestionempleado.php?msn=$mensaje&t=$tipo_mensaje");
				} catch (Exception $e){
					$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
					$tipo_mensaje="error";
					header("Location: ../Views/empleado.php?msn=$mensaje&t=$tipo_mensaje");
				}
			}
			else{
				$mensaje="Lo sentimos a ocurrido un error.";
				$tipo_mensaje="error";
				header("Location: ../Views/usuario.php?msn=$mensaje&t=$tipo_mensaje");
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
				$mensaje="Perfil actualizado con exito.";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el usuario, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();
				$tipo_mensaje="error";
				header("Location: ../Views/editarusuario.php?msn=$mensaje&t=$tipo_mensaje");
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			try {
				$usuario = usuario::Delete($_REQUEST["ui"]);
				$mensaje="Usuario eliminado con exito.(Esta accion es irreversible)";
				$tipo_mensaje="success";
				header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			} catch (Exception $e){
				$mensaje="No se puede eliminar este usuario de manera directa ";
				$tipo_mensaje="error";
				header("Location: ../Views/dashboard.php?msn=$mensaje&t=$tipo_mensaje");
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
					$tipo_mensaje="error ";
					header("Location: ../Views/login.php?m=".$mensaje."&t=".$tipo_mensaje);
				}elseif($usuario[1]=="Administrador"){
					$admin = usuario::consadmin($usuario[0]);
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
					$_SESSION["Id_administrador"] = $admin[0];

					header("Location: ../Views/gestioncentros.php");
				}
				elseif($usuario[1]=="Usuario"){
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

					header("Location: ../Views/dashboard.php");
				}elseif($usuario[1]=="Desarrollador"){
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

					header("Location: ../Views/gestiondesarrollo.php");
				}elseif($usuario[1]=="Empleado"){
					$empleado = usuario::consempl($usuario[0]);
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
					$_SESSION["Id_empleado"]		=$empleado[0];

					header("Location: ../Views/gestioncita.php");
				}
			}catch(Exception $e){
				$mensaje=("Lo sentimos, ocurrio un error ".$e->getMessage());
				$tipo_mensaje=("error");

				header("Location: ../Views/login.php?m=".$mensaje."&t".$tipo_mensaje);
			}
	}
	//
?>
