<?php
session_start();
if(!$_SESSION["validar"]){
    header("location:index.php?action=ingresar");
    exit();
}
?>

    <h1>REGISTRO DE TUTORIA</h1>

    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <select name="id_alumno" class="validate" required>
                        <option value="" disabled selected>Seleccionar alumno</option>
                        <?php
                        $alumnos = Datos::getAllAlumnos();

                        foreach($alumnos as $row => $item){
                            echo "<option value='".$item["id"]."'>".$item["nombre"]."</option>";
                        }
                        ?>
                    </select>
                    <label>Alumno</label>
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
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <input type="text" name="fecha" class="datepicker" required>
                    <label for="fecha">Fecha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <input type="text" name="hora" class="timepicker" required>
                    <label for="hora">Hora</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <select name="tipo" class="validate" required>
                        <option value="" disabled selected>Seleccionar tipo</option>
                        <option value="individual"  >Individual</option>
                        <option value="grupal"  >Grupal</option>
                    </select>
                    <label>Tipo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4 offset-m4">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="temas" id="textarea1" class="materialize-textarea"></textarea>
                    <label for="temas">Temas</label>
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
$registro -> registroTutoriaController();

if(isset($_GET["action"])){

    if($_GET["action"] == "ok"){

        echo "Registro Exitoso";

    }

}

?>