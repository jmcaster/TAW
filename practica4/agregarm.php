<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar maestro</title>
</head>
<body>
	<?php require_once('header.php'); ?>
 
  	<div class="large-3 columns" style="width:100%; text-align: center;">
  		<h3>Agregar nuevo maestro</h3>
	    <form action="agregaMaestro.php" method="POST" style="width:50%; margin:0 auto;">
	    	<label >Numero empleado:</label>
	    	<input type="text" name="noEmp">
	    	<br><br>
	    	<label >Carrera:</label>
	    	<input type="text" name="carrera">
	    	<br><br>
	    	<label >Nombre:</label>
	    	<input type="text" name="nombre">
	    	<br><br>
	    	<label >Telefono</label>
	    	<input type="text" name="telefono">
	    	<input type="submit" value="Registrar" class="button">
	    </form>
	</div>
	<?php require_once('footer.php'); ?>
</body>
</html>