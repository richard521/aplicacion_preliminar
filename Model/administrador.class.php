<?php
	//session_start();
	# ->Class: administrador
	# ->Method(s): Create(), ReadAll(),ReadbyId(), Readbyname(), Update(), Delete(), Login()
	#Author: Londoño Ochoa

	class administrador{
		/*
			metodo crear
			Este metodo guardara en la tabla usuarios todos los parametros desde el formulario.
		*/
			//Utilizamos "now" para llamar la fecha del sistema (solo en caso de ser necesaria)
		function Create($Id_usuario)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="INSERT INTO administrador(Id_usuario) values (?)";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_usuario));

			fusion_look_DB::Disconnect();
		}
		function ReadAll()
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM administrador";
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
		function ReadInner()//($Id_usuario)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::Connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT Id_administrador, Nombre FROM administrador INNER JOIN usuario ON administrador.Id_usuario = usuario.Id_usuario";// WHERE Id_usuario=?";
			$query=$conexion->prepare($consulta);
			$query->execute();
			//$query->execute(array($Id_usuario));
			/* devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.
			*/
			$resultado=$query->fetchALL(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function ReadbyId($Id_usuario)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM usuario WHERE Id_usuario=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_usuario));
			/* devolver el resultado en un array
				Fetch: es el resultado que arroja la consulta en forma de vector o matriz
				segun sea el caso, para consultas donde arroja mas de un dato. el Fetch debe ir acompañado con la palabra ALL.
			*/
			$resultado=$query->fetch(PDO::FETCH_BOTH);
			return $resultado;

			fusion_look_DB::Disconnect();
		}
		function Readbyname($Nombre)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::conect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="SELECT * FROM usuario WHERE Nombre=?";
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
		function Update($Nombre,$Apellido,$Clave,$Email,$Telefono,$Sexo,$Estado,$Id_usuario)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="UPDATE usuario SET Nombre=?,Apellido=?,Clave=?,Email=?,Telefono=?,Sexo=?,Estado=? WHERE Id_usuario=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Nombre,$Apellido,$Clave,$Email,$Telefono,$Sexo,$Estado, $Id_usuario));

			fusion_look_DB::Disconnect();
		}
		function Delete($Id_usuario)
		{
			//Instanciamos y hacemos conexion a la base de datos(fusion_look)
			$conexion=fusion_look_DB::connect();
			$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			//Crear el query que se llevara a cabo
			$consulta="DELETE FROM usuario WHERE Id_usuario=?";
			$query=$conexion->prepare($consulta);
			$query->execute(array($Id_usuario));

			fusion_look_DB::Disconnect();
		}
	
	}
?>