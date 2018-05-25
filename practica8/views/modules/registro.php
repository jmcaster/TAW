<?php
	session_start();
	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
?>

<h1>REGISTRO DE MAESTROS</h1>

<div class="row">
	<form method="post" class="col s12">
		<div class="row">
			<div class="input-field col s4 offset-m4">
				<input type="text" name="nombre" class="validate" required>
		     	<label for="last_name">Nombre del maestro</label>
		    </div>
		</div>
		<div class="row">
			<div class="input-field col s4 offset-m4">
				<input type="text" name="carrera" class="validate" required>
		     	<label for="carrera">Carrera</label>
		    </div>
		</div>
		<div class="row">
			<div class="input-field col s4 offset-m4">
				<input type="text" name="email" class="validate" required>
		     	<label for="email">Email</label>
		    </div>
		</div>
	    <div class="row">
	    	<div class="input-field col s4 offset-m4">
				<input type="text" name="password" class="validate" required>
	     		<label for="password">Contraseña</label>
	    	</div>
	    </div>
		<button class="btn waves-effect waves-light" type="submit" name="registro">Enviar
			<i class="material-icons right">send</i>
		</button>
	</form>
</div>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroMaestrosController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
