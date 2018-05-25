<?php

class Conexion{
	public static function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=practica8","root","");//Modificar contraseña, dbname y host en caso de ser necesario por los datos del servicio local
		return $link;
	}
}
