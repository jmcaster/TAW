<?php 
	require_once 'connection.php';
	require_once 'sesion.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de venta</title>
	<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>

	<div class="row column" style="background-color: #dfdfdf; color: white;">
		<a href="index.php" style="width:20%" style="color:white;">Inicio</a>
		<p style="box-sizing: border-box; display: inline-block; width:80%; text-align: right;">Bienvenido <?=$_SESSION['user_name']?>&nbsp&nbsp&nbsp  <a href="logout.php" style="color:white;">Logout</a></p>
	</div>
	<br><hr>	

	<div class="row column">
		<a href="#" class="button" style="background-color: lightblue;">Registrar Venta</a>
		<a href="productos.php" class="button">Registrar Producto</a>
		<form action="regVenta.php" method="POST" style="width:40%; margin:100px auto;">
			<label>Producto</label>
			<select name="producto" id="">
				<?php 
					$sql = "SELECT * FROM products;";
					foreach ($pdo->query($sql) as $row) {
				 ?>
					<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
				<?php } ?>
			</select>
			<br>
			<label>Cantidad</label>
			<input type="text" name="cantidad">
			<br>
			<input type="submit" class="button" value="Registrar" style="background-color: #01A15B; width:100%;">

		</form>
	</div>

</body>
</html>