<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar alumno</title>
</head>
<body>
	<?php require_once('header.php'); ?>
 
  	<div class="large-3 columns" style="width:100%; text-align: center;">
  		<h3>Agregar nuevo alumno</h3>
	    <form action="agregaAlumno.php" method="POST" style="width:50%; margin:0 auto;">
	    	<label >Matricula:</label>
	    	<input name="matricula" type="text">
	    	<br><br>
	    	<label >Nombre:</label>
	    	<input name="nombre" type="text">
	    	<br><br>
	    	<label >Carrera:</label>
	    	<input name="carrera" type="text">
	    	<br><br>
	    	<label >Email:</label>
	    	<input name="email" type="text">
	    	<br><br>
	    	<label >Telefono</label>
	    	<input name="telefono" type="text">
	    	<input type="submit" value="Registrar" class="button">
	    </form>
	</div>
	<?php require_once('footer.php'); ?>
</body>
</html>