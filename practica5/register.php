<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Agregar usuario</title>
</head>
<body>
	<?php require_once('header.php'); ?>
 
  	<div class="large-3 columns" style="width:100%; text-align: center;">
  		<h3>Agregar nuevo usuario</h3>
	    <form action="register_process.php" method="POST" style="width:25%; margin:0 auto;">
	    	<label >Nombre:</label>
	    	<input name="name" type="text" style="text-align: center;" required>
	    	<br><br>
	    	<label >Email:</label>
	    	<input name="email" type="text" style="text-align: center;" required>
	    	<br><br>
	    	<label >Contraseña:</label>
	    	<input name="password" type="password" style="text-align: center;" required>
	    	<br><br>
	    	<label >Telefono</label>
	    	<input name="tel" type="text" style="text-align: center;" required>
	    	<input type="submit" value="Registrar" class="button">
	    </form>
	</div>
	<?php require_once('footer.php'); ?>
</body>
</html>