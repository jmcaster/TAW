<?php
/**
 * Created by PhpStorm.
 * User: marqo
 * Date: 26/05/2018
 * Time: 04:03 PM
 */

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>EDITAR ALUMNO</h1>

<form method="post">

	<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editarAlumnosController();
	$editarUsuario -> actualizarAlumnosController();

	?>

</form>