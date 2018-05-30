<?php

	
?>
<h1>INGRESAR</h1>

	<div class="row">
		<form method="post" class="col s12">
			<div class="row">
				<div class="input-field col s4 offset-m4">
					<input type="text" name="user" class="validate" required>
			     	<label for="last_name">Usuario</label>
			    </div>
			</div>
			<div class="row">
				<div class="input-field col s4 offset-m4">
					<input type="password" name="pass" class="validate" required>
			     	<label for="last_name">Contraseña</label>
			    </div>
			</div>
			<button class="btn waves-effect waves-light" type="submit" name="registro">Entrar
				<i class="material-icons right">arrow_forward</i>
			</button>

		</form>
	</div>
	

<?php

$ingreso = new ProductsController();
$ingreso -> ingresoUsuarioC();
if(isset($_GET["action"])){
	if($_GET["action"] == "fallo"){
		echo "Fallo al ingresar";
	}
}

?>