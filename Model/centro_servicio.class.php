<?php
	# ->Class: centro_servicio
	# ->Method(s): Create(), ReaadAll(),ReadbyId(), Readbyname(), Update(), Delete()
	#Author: Londoño Ochoa

	class centro_servicio{
			//Utilizamos "now" para llamar la fecha del sistema (solo en caso de ser necesaria)
		function Create($Id_administrador,$Id_ciudad,$Nombre,$Direccion,$Email,$Telefono)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="INSERT INTO centro_servicio(Id_administrador,Id_ciudad,Nombre,Direccion,Email,Telefono) values (?,?,?,?,?,?)";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_administrador,$Id_ciudad,$Nombre,$Direccion,$Email,$Telefono));

			fusion_look_DB::Disconnect();
		}
		function ReadAll()
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM centro_servicio";
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
		function ReadbyId($Id_centro)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM centro_servicio WHERE Id_centro=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_centro));
			/* devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.
			*/
			$resultado=$query->fetch(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function Readby()
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT usuario.Nombre as 'usuarionombre', Id_centro, ciudad.Nombre as 'ciudadnombre', centro_servicio.Nombre as 'centronombre', Direccion, centro_servicio.Email, centro_servicio.Telefono FROM usuario INNER JOIN administrador ON usuario.Id_usuario = administrador.Id_usuario INNER JOIN centro_servicio ON administrador.Id_administrador = centro_servicio.Id_administrador INNER JOIN ciudad ON centro_servicio.Id_ciudad = ciudad.Id_ciudad";
			$query=$conexion->prepare($consulta);
			$query->execute();
			/*devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.*/
			
			$resultado=$query->fetch(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function Readbyname($Nombre)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM centro_servicio WHERE Nombre=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Nombre));
			/* devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.
			*/
			$resultado=$query->fetch(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function Update($Id_ciudad,$Nombre,$Direccion,$Email,$Telefono,$Id_centro)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="UPDATE centro_servicio SET Id_ciudad=?,Nombre=?,Direccion=?,Email=?,Telefono=? WHERE Id_centro=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_ciudad,$Nombre,$Direccion,$Email,$Telefono,$Id_centro));

			fusion_look_DB::Disconnect();
		}
		function Delete($Id_centro)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="DELETE FROM centro_servicio WHERE Id_centro=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_centro));

			fusion_look_DB::Disconnect();
		}
		
	}
?>