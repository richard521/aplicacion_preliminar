<?php
	# ->class fusion_look_DB
	# -> Author: Londoño Ochoa

	class fusion_look_DB{

		private static $db_host="localhost";
		private static $db_name="fusion-look";
		private static $db_user ="root";
		private static $db_pass ="";
		private static $conn= null;

		public static function Connect(){
			if (self::$conn==null) {

				
				try {
					
					self::$conn = new PDO("mysql:host=".self::$db_host.";"."dbname=".self::$db_name, self::$db_user, self::$db_pass);
 					self::$conn -> exec("SET CHARACTER SET utf8");
 					}
 				catch(PDOException $e){
 					die($e->getMessage());

				
					}
		}
		return self::$conn; 
		}
		public static function Disconnect(){
 			self::$conn= null;

 		}
 	}


?>