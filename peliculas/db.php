<?php
	require 'vendor/autoload.php';

	class  Db{
		private static $conexion=NULL;
		private function __construct (){}
 
		public static function conectar(){
			//Un nuevo comentario
				//Abrimos conexión a Mongo
				$conexion = new MongoDB\Client;
				//Seleccionamos la conexión a la BD de pelicula

				//Seleccionamos base de datos

				self::$conexion = $conexion->pelicula;

				return self::$conexion;
		}		
	} 
?>