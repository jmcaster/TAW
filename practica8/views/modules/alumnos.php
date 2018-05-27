<?php
    //VISTA DE ALUMNOS
	session_start();
	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
	if (isset($_GET["id"])){
        $todo = new MvcController();
        $todo -> borrarAlumnosController("alumnos");
        header("Location: location:index.php");
    }

?>
<h1>ALUMNOS</h1>
<div class="row right">
    <a href="index.php?action=registroAlumnos" class="waves-effect waves-light btn pulse"><i class="material-icons right">add</i>Agregar</a>
</div>
	<table border="1">
		
		<thead>
			
			<tr>
				<th>ID</th>
				<th>Matricula</th>
				<th>Nombre</th>
                <th>Carrera</th>
                <th>Tutor</th>
				<th>Editar?</th>
				<th>Eliminar?</th>
			</tr>
		</thead>
		<tbody>
			<?php
            //SE LLAMA AL CONTROLADOR PARA LA CONSULTA DE ALUMNOS
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaAlumnosController();
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