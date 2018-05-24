<?php
	require_once("conexion.php");

	class DatosProd extends Conexion{
		public static function productRegistrationModel($table,$datos){
			$statement = Conexion::conectar()->prepare("INSERT INTO $table(nombre,descripcion,precio_compra,precio_venta,precio) VALUES (:nombre,:descripcion,:precioC,:precioV,:precioP)");
			$statement->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
			$statement->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
			$statement->bindParam(":precioC",$datos["precio_compra"],PDO::PARAM_INT);
			$statement->bindParam(":precioV",$datos["precio_venta"],PDO::PARAM_INT);
			$statement->bindParam(":precioP",$datos["precio"],PDO::PARAM_INT);
			if($statement->execute()){
				return "1";
			}else{
				return "0";
			}
			$statement->close();
		}

		public static function ingresoUsuarioM($table, $datos){
			$statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE usuario = :user");
			$statement->bindParam(":user", $datos["user"],PDO::PARAM_STR);
			$statement->execute();
			#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
			return $statement->fetch();
			$statement->close();
		}
	}
?>