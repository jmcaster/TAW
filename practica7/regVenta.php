<?php 
	include 'connection.php';
	$producto = filter_input(INPUT_POST, 'producto');
	$cantidad = filter_input(INPUT_POST, 'cantidad');
	
	if (!$producto && !$cantidad) {
		header('Location: index.php');
		exit();
	}else{
		$sql = "SELECT * FROM products WHERE name = '$producto';";
		$res = $pdo->query($sql);
		$row = $res->fetch(PDO::FETCH_ASSOC);
		$idP = $row['id'];
		$price = $row['price'];
		$total = $cantidad * $price;
		$sql = "INSERT INTO sales (idProduct, quantity, total, unit) VALUES ($idP, $cantidad, $total, $price);";
		$pdo->query($sql);

		echo "<script type='text/javascript'>";
		echo "alert('Venta registrada.');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
		
	}
 ?>