<?php 
	include 'connection.php';
	$name = filter_input(INPUT_POST, 'name');
	$price = filter_input(INPUT_POST, 'price');
	
	if (!$name && !$price) {
		header('Location: index.php');
		exit();
	}else{
		
		$sql = "INSERT INTO products (name, price) VALUES ('$name', $price);";
		$pdo->query($sql);

		echo "<script type='text/javascript'>";
		echo "alert('Producto registrado.');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
		
	}
 ?>