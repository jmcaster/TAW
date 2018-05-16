<?php 
	require_once 'connection.php';
	require_once 'utilities.php';
	require_once 'sesion.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Practica 7</title>
	<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>
	<div class="row column" style="background-color: #dfdfdf; color: white;">
		<a href="#" style="width:20%" style="color:white;">Inicio</a>
		<p style="box-sizing: border-box; display: inline-block; width:80%; text-align: right;">Bienvenido <?=$_SESSION['user_name']?>&nbsp&nbsp&nbsp  <a href="logout.php" style="color:white;">Logout</a></p>
	</div>
	<br><hr>	

	<div class="row column">
		<a href="ventas.php" class="button">Registrar Venta</a>
		<a href="productos.php" class="button">Registrar Producto</a>
	  <div class="callout success">
	    <h3>Ventas</h3>
	  </div>
	  <table width="100%">
	    <thead>
	      <!--Creando la tabla-->
	      <tr>
	        <th>ID</th>
	        <th>Producto</th>
	        <th>Cantidad</th>
	        <th>Total</th>
	        <th>Precio unitario</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php 
	      		$sql = "SELECT * FROM sales";
	      		
	      		foreach ($pdo->query($sql) as $row) {
	       	?>
		      <tr>
		        <!--Se imprime cada uno de los totales de las tablas mediante funciones de php-->
		        <td><?php echo$row['id']; ?></td>
		        <?php 
		        	$idP = $row['idProduct'];
		        	$res = $pdo->query("SELECT * FROM products WHERE id = $idP");
		        	$producto = $res->fetch(PDO::FETCH_ASSOC);
		         ?>
		        <td><?php  echo $producto['name']; ?></td>
		        <td><?php echo$row['quantity']; ?></td>
		        <td><?php echo$row['total']; ?></td>
		        <td><?php echo$row['unit']; ?></td>
		      </tr>
	  		<?php } ?>
	    </tbody>
	  </table>
	</div>
</body>
</html>