<?php 
	require_once 'config.php';
	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

	$sql = "SELECT * FROM users WHERE id = $id+1"; 
	$res = $con->query($sql);
	$r = $res->fetch_assoc();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Actualizar usuario</title>
</head>
<body>
	<?php require_once('header.php'); ?>
 
  	<div class="large-3 columns" style="width:100%; text-align: center;">
  		<h3>Agregar nuevo usuario</h3>
	    <form action="update_process.php" method="POST" style="width:25%; margin:0 auto;">
	    	<input type="hidden" name="id" value="<?php echo $id;?>" >
	    	<label >Nombre:</label>
	    	<input name="name" type="text" style="text-align: center;" value="<?php echo $r['name'];?>" required>
	    	<br><br>
	    	<label >Email:</label>
	    	<input name="email" type="text" style="text-align: center;" value="<?php echo $r['email'];?>" required>
	    	<br><br>
	    	<label >Contraseña:</label>
	    	<input name="password" type="password" style="text-align: center;" value="<?php echo $r['password'];?>" required>
	    	<br><br>
	    	<label >Telefono</label>
	    	<input name="tel" type="text" style="text-align: center;" value="<?php echo $r['tel'];?>" required>
	    	<input type="submit" value="Guardar" class="button">
	    </form>
	</div>
	<?php require_once('footer.php'); ?>
</body>
</html>