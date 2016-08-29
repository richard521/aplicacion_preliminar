<?php
	# ->Class: servicio
	# ->Method(s): Create(), ReadAll(), Update(), Delete()
	#Author: Londoño Ochoa
	
	class servicio{
		function create($Id_centro,$Id_tipo,$Nombre)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="INSERT INTO servicio(Id_centro,Id_tipo,Nombre) values (?,?,?)";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_centro,$Id_tipo,$Nombre));

			fusion_look_DB::Disconnect();
		}
		function ReadAll()
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM servicio";
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
		function ReadbyId($Id_servicio)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM servicio	 WHERE Id_servicio	=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_servicio));
			/* devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.
			*/
			$resultado=$query->fetch(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function Update($Id_centro,$Id_tipo,$Nombre,$Id_servicio)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="UPDATE servicio SET Id_centro=?,Id_tipo=?,Nombre=? WHERE Id_servicio=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_centro,$Id_tipo,$Nombre,$Id_servicio));

			fusion_look_DB::Disconnect();
		}
		function Delete($Id_servicio)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="DELETE FROM servicio WHERE Id_servicio=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_servicio));

			fusion_look_DB::Disconnect();
		}
	}
?>