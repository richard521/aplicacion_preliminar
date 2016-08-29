 <?php
	# -> Controller: empleado
	#Author: Londoño Ochoa
	session_start();
	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/empleado.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_usuario 				=$_POST["Id_usuario"];
			$Id_centro					=$_POST["Id_centro"];
			$Id_servicio 				=$_POST["Id_servicio"];
			$Inicio 					=$_POST["Inicio"];
			$Fin						=$_POST["Fin"];
			
			try {
				empleado::Create($Id_usuario,$Id_centro,$Id_servicio,$Inicio,$Fin);
				$mensaje="Empleado creado con exito.";
				$tipo_mensaje="success";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			header("Location: ../Views/pruebainicio.php?msn=$mensaje&t=$tipo_mensaje");
			break;
			//
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_centro					=$_POST["Id_centro"];
			$Id_servicio 				=$_POST["Id_servicio"];
			$Cargo						=$_POST["Cargo"];
			$Disponibilidad 			=$_POST["Disponibilidad"];
			try {
				empleado::Update($Id_centro,$Id_servicio,$Cargo,$Disponibilidad);
				$mensaje="Empleado actualizado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el empleado, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$Id_empleado			=$_POST["Id_empleado"];

			try {
				empleado::Delete($Id_empleado,$Id_usuario,$Id_centro,$Id_servicio,$Cargo,$Disponibilidad);
				$mensaje="Empleado eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el empleado, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		
	}
?>