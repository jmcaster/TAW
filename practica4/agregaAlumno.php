<?php 

	$matricula = $_POST['matricula'];
	$nombre = $_POST['nombre'];
	$carrera = $_POST['carrera'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];

	$regA = fopen("registroa.txt", "a+");
	$str = "\n".$matricula.":".$nombre.":".$carrera.":".$email.":".$telefono;
	fwrite($regA, $str);
	fclose($regA);
	header("Location: ./index.php");
 ?>