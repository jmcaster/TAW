<?php
/**
 * Created by PhpStorm.
 * User: marqo
 * Date: 25/05/2018
 * Time: 09:12 PM
 */
?>
<?php

session_start();
if(!$_SESSION["validar"]){
    header("location:index.php?action=ingresar");
    exit();
}

if (isset($_GET["id"])){
    $todo = new MvcController();
    $todo -> borrarTutoriaController("tutorias");
    header("Location: location:index.php");
}

?>
<h1>Tutorias</h1>
<div class="row right">
    <a href="index.php?action=registroTutoria" class="waves-effect waves-light btn pulse"><i class="material-icons right">add</i>Agregar</a>
</div>
<table border="1" class="striped">

    <thead>

    <tr>
        <th>ID</th>
        <th>Alumno</th>
        <th>Maestro</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Tipo</th>
        <th>Temas</th>
        <th>Eliminar?</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $vistaUsuario = new MvcController();
    $vistaUsuario -> vistaTutoriasController();
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
