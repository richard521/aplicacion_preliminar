<?php
	# ->Class: departamento
	# ->Method(s): Create(), ReadAll(), Update(), Delete()
	#Author: Londoño Ochoa
	
	class departamento{
		function create($Nombre)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="INSERT INTO departamento(Nombre) values (?)";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Nombre));

			fusion_look_DB::Disconnect();
		}
		function ReadAll()
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM departamento ORDER BY Nombre asc";
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
		function ReadbyId($Id_departamento)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM departamento WHERE Id_departamento=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_departamento));
			/* devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.
			*/
			$resultado=$query->fetch(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function Update($Nombre,$Id_departamento)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="UPDATE departamento SET Nombre=? WHERE Id_departamento=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Nombre,$Id_departamento));

			fusion_look_DB::Disconnect();
		}
		function Delete($Id_departamento)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="DELETE FROM departamento WHERE Id_departamento=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_departamento));

			fusion_look_DB::Disconnect();
		}
	}
?>