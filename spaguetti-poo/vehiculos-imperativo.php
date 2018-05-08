<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>spaguetti</title>
</head>
<body>
	<?php 
		//codigo para mostrar vehiculos ( SPaguetti)

		$automovil1 = (object)["marca" => "Toyota", "modelo" => "Corolla"];
		$automovil2 = (object)["marca" => "Honda", "modelo" => "Accord"];

		function mostrar($automovil){
			echo "<p> Hola soy un $automovil->marca, modelo $automovil->modelo</php> ";
		}
		mostrar($automovil1);
		mostrar($automovil2);
	 ?>
	 <br>
	 <br>
	 <br>
	 <a href="index.php">Atras</a>
</body>
</html>