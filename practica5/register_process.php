<?php 
	require_once 'config.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$tel = $_POST['tel'];

	$sql = "INSERT INTO users (name,email,password,tel) VALUES ('$name', '$email', '$pass', '$tel');";
	if ($con->query($sql) === TRUE) {
		echo "<script type='text/javascript'>";
		echo "alert('Usuario registrado exitosamente.');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('Error al registrar usuario.');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
	}



 ?>