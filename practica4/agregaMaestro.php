<?php 

	$noEmp = $_POST['noEmp'];
	$carrera = $_POST['carrera'];
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];

	$regA = fopen("registrom.txt", "a+");
	$str = "\n".$noEmp.":".$carrera.":".$nombre.":".$telefono;
	fwrite($regA, $str);
	fclose($regA);
	header("Location: ./index.php");
 ?>