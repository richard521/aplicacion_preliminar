<?php
	# ->Class: empleado
	# ->Method(s): Create(), ReadAll(), Update(), Delete()
	#Author: Londoño Ochoa
	
	class empleado{
		function create($Id_usuario,$Id_centro,$Id_servicio,$Inicio,$Fin)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="INSERT INTO empleado(Id_usuario,Id_centro,Id_servicio,Inicio,Fin) values (?,?,?,?,?)";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_usuario,$Id_centro,$Id_servicio,$Inicio,$Fin));

			fusion_look_DB::Disconnect();
		}
		function ReadAll()
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT Id_empleado, Id_usuario, Id_centro, Id_servicio, Inicio, Fin FROM empleado";
			$query=$conexion->prepare($consulta);
			$query->execute(array());

			fusion_look_DB::Disconnect();
		}
		//
		function ReadInner()
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT Id_empleado, Nombre FROM empleado INNER JOIN usuario ON empleado.Id_usuario = usuario.Id_usuario";
			$query=$conexion->prepare($consulta);
			$query->execute();
			/* devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.
			*/
			$resultado=$query->fetchALL(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function Readin()
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT Id_empleado, empleado.Inicio, empleado.Fin, usuario.Nombre as 'nombreusuario', Apellido, usuario.Email, usuario.Telefono, Sexo, servicio.Nombre as 'nombreservicio', centro_servicio.Nombre as 'nombrecentro' FROM empleado INNER JOIN usuario ON empleado.Id_usuario = usuario.Id_usuario INNER JOIN servicio ON empleado.Id_servicio = servicio.Id_servicio INNER JOIN centro_servicio ON empleado.Id_centro = centro_servicio.Id_centro";
			$query=$conexion->prepare($consulta);
			$query->execute();

			/* devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.
			*/
			$resultado=$query->fetchALL(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function Update($Id_centro,$Id_servicio,$Cargo,$Disponibilidad)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::conect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="UPDATE empleado SET Id_centro=?,Id_servicio=?,Cargo=?,Disponibilidad=? WHERE Id_empleado=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_centro,$Id_servicio,$Cargo,$Disponibilidad));

			fusion_look_DB::Disconnect();
		}
		function Delete($Id_empleado)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::conect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="DELETE FROM empleado WHERE Id_empleado=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_empleado));

			fusion_look_DB::Disconnect();
		}
	}
?>