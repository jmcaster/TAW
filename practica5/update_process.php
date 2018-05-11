<?php 
	require_once 'config.php';
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$tel = $_POST['tel'];

	$sql = "UPDATE users SET name = '$name', email = '$email', password = '$pass', tel = '$tel' WHERE id = $id+1";
	if ($con->query($sql) === TRUE) {
		echo "<script type='text/javascript'>";
		echo "alert('Usuario actualizado exitosamente.');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('Error al actualizar usuario.');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
	}



 ?>