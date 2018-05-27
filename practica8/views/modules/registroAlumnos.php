<?php
session_start();
if(!$_SESSION["validar"]){
    header("location:index.php?action=ingresar");
    exit();
}
?>

    <h1>REGISTRO DE ALUMNOS</h1>

    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <input type="text" name="matricula" class="validate" required>
                    <label for="last_name">Matricula</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <input type="text" name="nombre" class="validate" required>
                    <label for="carrera">Nombre</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <select name="carrera" class="validate" required>
                        <option value="" disabled selected>Seleccionar carrera</option>
                        <?php
                        $carreras = Datos::getCarreras();

                        foreach($carreras as $row => $item){
                            echo "<option value='".$item["nombre"]."'>".$item["nombre"]."</option>";
                        }
                        ?>
                    </select>
                    <label>Carrera</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <select name="id_tutor" class="validate" required>
                        <option value="" disabled selected>Seleccionar tutor</option>
                        <?php
                        $tutores = Datos::getAllTutor();

                        foreach($tutores as $row => $item){
                            echo "<option value='".$item["num_empleado"]."'>".$item["nombre"]."</option>";
                        }
                        ?>
                    </select>
                    <label>Tutor</label>
                </div>
            </div>
            <!--<div class="row">
                <div class="input-field col s4 offset-m4">
                    <input type="text" name="id_tutor" class="validate" required>
                    <label for="password">Tutor</label>
                </div>
            </div>-->
            <button class="btn waves-effect waves-light" type="submit" name="registro">Enviar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroAlumnosController();

if(isset($_GET["action"])){

    if($_GET["action"] == "ok"){

        echo "Registro Exitoso";

    }

}

?>