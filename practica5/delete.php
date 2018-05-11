<?php 
	include 'config.php';

	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

	$sql = "DELETE FROM users WHERE id = $id+1"; 

	if ($con->query($sql) === TRUE) {
		echo "<script type='text/javascript'>";
		echo "alert('Usuario eliminado exitosamente.');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('Error al eliminar usuario.');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
	}
 ?>