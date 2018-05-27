<?php

	
?>
<h1>INGRESAR</h1>

	<div class="row">
		<form method="post" class="col s12">
			<div class="row">
				<div class="input-field col s4 offset-m4">
					<input type="text" name="email" class="validate" required>
			     	<label for="email">Email</label>
			    </div>
			</div>
			<div class="row">
				<div class="input-field col s4 offset-m4">
					<input type="password" name="password" class="validate" required>
			     	<label for="password">Contraseña</label>
			    </div>
			</div>
			<button class="btn waves-effect waves-light" type="submit" name="registro">Entrar
				<i class="material-icons right">arrow_forward</i>
			</button>

		</form>
	</div>
	

<?php
//SE LLAMA AL CONTROLADOR PARA VALIDAR LOS DATOS DEL FORMULARIO DE LOGIN
$ingreso = new MvcController();
$ingreso -> loginController();
if(isset($_GET["action"])){
	if($_GET["action"] == "fallo"){
		echo "Fallo al ingresar";
	}
}

?>