<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>EDITAR MAESTRO</h1>

<form method="post">
	
	<?php
	$editarUsuario = new MvcController();
	$editarUsuario -> editarMaestrosController();
	$editarUsuario -> actualizarMaestrosController();

	?>

</form>



