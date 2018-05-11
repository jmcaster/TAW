<?php 
	$host = "localhost"; //puede ser necesario cambiar por '127.0.0.1' dependiendo del server y/o sistema operativo
	$user = "root";//usuario del servicio mysql
	$pass = "123456";//Cambiar por la contraseña del servicio mysql local
	$db = "practica5";//nombre de la base de datos designada para el proyecto
	
	//conectar a la base de datos
	$con = new mysqli($host,$user,$pass,$db);
	// Verificar conexion
	if (mysqli_connect_errno())
	  {
	  echo "Error al conectar con mysql: " . mysqli_connect_error(); //Mostrar mensaje de error en caso de no lograr una conexion
	  }

 ?>