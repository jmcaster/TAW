<?php
    //VISTA DE MAESTROS
	session_start();
	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}

?>

<h1>MAESTROS</h1>
<div class="row right">
    <a href="index.php?action=registroMaestros" class="waves-effect waves-light btn pulse"><i class="material-icons right">add</i>Agregar</a>
</div>


	<table border="1">
		
		<thead>
			
			<tr>
				<th>No. Empleado</th>
				<th>Nombre</th>
				<th>Carrera</th>
                <th>Email</th>
				<th>Editar?</th>
				<th>Eliminar?</th>
			</tr>
		</thead>
		<tbody>
			<?php
            //SE LLAMA AL CONTROLADOR PARA LA CONSULTA DE MAESTROS
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaUsuariosController();
			//$vistaUsuario -> borrarUsuarioController();
			?>
		</tbody>
	</table>
<?php
if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		echo "Cambio Exitoso";
	}
}
?>