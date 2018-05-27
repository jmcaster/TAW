<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

    public function template(){
        include "views/template.php";
    }

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Pages::linkPagesM($enlaces);

		include $respuesta;

	}






	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroMaestrosController(){

		if(isset($_POST["email"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"],
								      "carrera"=>$_POST["carrera"],
								      "email"=>$_POST["email"],
                                      "password"=>$_POST["password"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = new Datos();
            $respuesta -> registroMaestrosModel($datosController, "maestros");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}

    #REGISTRO DE USUARIOS
    #------------------------------------
    public function registroAlumnosController(){

        if(isset($_POST["matricula"])){
            //Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
            $datosController = array( "matricula"=>$_POST["matricula"],
                "nombre"=>$_POST["nombre"],
                "carrera"=>$_POST["carrera"],
                "id_tutor"=>$_POST["id_tutor"]);

            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
            $respuesta = new Datos();
            $respuesta -> registroAlumnosModel($datosController, "alumnos");

            //se imprime la respuesta en la vista
            if($respuesta == "success"){

                header("location:index.php?action=alumnos");

            }

            else{

                header("location:index.php");
            }

        }

    }
    public function registroTutoriaController(){

        if(isset($_POST["id_alumno"])){
            //Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
            $datosController = array( "id_alumno"=>$_POST["id_alumno"],
                "id_tutor"=>$_POST["id_tutor"],
                "fecha"=>$_POST["fecha"],
                "hora"=>$_POST["hora"],
                "tipo"=>$_POST["tipo"],
                "temas"=>$_POST["temas"]);

            //Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
            $respuesta = new Datos();
            $respuesta -> registroTutoriaModel($datosController, "tutorias");

            //se imprime la respuesta en la vista
            if($respuesta == "success"){

                header("location:index.php?action=tutorias");

            }

            else{

                //header("location:index.php");
            }

        }

    }

	#INGRESO DE USUARIOS
	#------------------------------------
	public function loginController(){

		if(isset($_POST["email"])){

			$datosController = array( "email"=>$_POST["email"],
								      "password"=>$_POST["password"]);

			$r = new Datos();
			$respuesta = $r -> loginModel($datosController, "maestros");
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["email"] == $_POST["email"] && $respuesta["password"] == $_POST["password"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=maestros");

			}

			else{
                //echo "<script type='text/javascript'>";
                //echo "window.location.href = 'index.php?action=fallo';";
                //echo "<script/>";
				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------
    //MAESTROS
	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("maestros");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["num_empleado"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editarMaestros&num_empleado='.$item["num_empleado"].'" class="waves-effect waves-light btn blue">
				<i class="material-icons right">update</i>Editar</a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["num_empleado"].'" class="waves-effect waves-light btn red">
				<i class="material-icons right">delete</i>Borrar</a></td>
			</tr>';
		}
	}

	//CONTROLADOR PARA IMPRIMIR LA TABLA CON EL LISTADO DE ALUMNOS
    public function vistaAlumnosController(){

        $respuesta = Datos::vistaAlumnosModel("alumnos");

        #El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

        foreach($respuesta as $row => $item){
            $tutor = Datos::getTutor($item["id_tutor"]);
            echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$tutor["nombre"].'</td>
				<td><a href="index.php?action=editarAlumnos&id='.$item["id"].'" class="waves-effect waves-light btn blue">
				<i class="material-icons right">update</i>Editar</a></td>
				<td><a href="index.php?action=alumnos&id='.$item["id"].'" class="waves-effect waves-light btn red">
				<i class="material-icons right">delete</i>Borrar</a></td>
			</tr>';

        }

    }

    //IMPRIMIR LA TABLA CON EL LISTADO DE LAS TUTORIAS REGISTRADAS
    public function vistaTutoriasController(){

        $respuesta = Datos::vistaTutoriasModel("tutorias");

        #El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

        foreach($respuesta as $row => $item){
            $alumno = Datos::getAlumno($item["id_alumno"]);
            $tutor = Datos::getTutor($item["id_tutor"]);
            echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$alumno["nombre"].'</td>
				<td>'.$tutor["nombre"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["hora"].'</td>
				<td>'.$item["tipo"].'</td>
				<td>'.$item["temas"].'</td>
				<td><a href="index.php?action=tutorias&id='.$item["id"].'" class="waves-effect waves-light btn red">
				<i class="material-icons right">delete</i>Borrar</a></td>
			</tr>';

        }

    }

	#EDITAR USUARIO
	#------------------------------------

	public function editarMaestrosController(){

		$datosController = $_GET["num_empleado"];
		$respuesta = Datos::editarMaestrosModel($datosController, "maestros");

		echo'<div class="row">
                    <div class="row">
                        <div class="input-field col s4 offset-m4">
                            <input type="text" value="'.$respuesta["num_empleado"].'" name="num_empleado" class="validate" required disabled>
                            <label for="password">Numero Empleado</label>
                        </div>
                    </div>
                    <div class="row">
                    <div class="input-field col s4 offset-m4">
                        <input type="text" value="'.$respuesta["nombre"].'" name="nombre" required>
                        <label for="last_name">Nombre del maestro</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 offset-m4">
                        <input type="text" value="'.$respuesta["carrera"].'" name="carrera" required>
                        <label for="carrera">Carrera</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 offset-m4">
                        <input type="text" value="'.$respuesta["email"].'" name="email" required>
                        <label for="carrera">Carrera</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 offset-m4">
                        <input type="text" value="'.$respuesta["password"].'" name="password" required>
                        <label for="password">Contraseña</label>
                    </div>
                </div>
                

			    <input class="btn" type="submit" value="Actualizar">
			 </div>';

	}

    public function editarAlumnosController(){

        $datosController = $_GET["id"];
        $respuesta = Datos::editarAlumnosModel($datosController, "alumnos");

        echo'<div class="row">
                <div class="row">
                    <div class="input-field col s4 offset-m4">
                        <input type="hidden" value="'.$respuesta["id"].'" name="idEditar" required disabled>
                        <label for="password">ID</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 offset-m4">
                        <input type="text" value="'.$respuesta["matricula"].'" name="usuarioEditar" required>
                        <label for="last_name">Matricula</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 offset-m4">
                        <input type="text" value="'.$respuesta["nombre"].'" name="passwordEditar" required>
                        <label for="carrera">Nombre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4 offset-m4">
                        <input type="text" value="'.$respuesta["carrera"].'" name="emailEditar" required>
                        <label for="carrera">Carrera</label>
                    </div>
                </div>
                <div class="row">
                <div class="input-field col s4 offset-m4">
                    <select name="id_tutor" class="validate" required>
                        <option value="" disabled selected>Seleccionar tutor</option>';

                        $tutores = Datos::getAllTutor();

                        foreach($tutores as $row => $item){
                            echo "<option value='".$item["num_empleado"]."'>".$item["nombre"]."</option>";
                        }
                        echo '</select>
                    <label>Tutor</label>
                </div>
            </div>
			    <input class="btn" type="submit" value="Actualizar">
			 </div>';

    }

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarMaestrosController(){

		if(isset($_POST["num_empleado"])){

			$datosController = array( "num_empleado"=>$_POST["num_empleado"],
							          "nombre"=>$_POST["nombre"],
				                      "carrera"=>$_POST["carrera"],
				                      "email"=>$_POST["emailEditar"],
                                      "password"=>$_POST["password"]);

			$respuesta = new Datos();
			$respuesta -> actualizarMaestrosModel($datosController, "maestros");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}

	}

    public function actualizarAlumnosController(){

        if(isset($_POST["id"])){

            $datosController = array( "id"=>$_POST["id"],
                "matricula"=>$_POST["matricula"],
                "nombre"=>$_POST["nombre"],
                "carrera"=>$_POST["carrera"],
                "id_tutor"=>$_POST["id_tutor"]);

            $respuesta = new Datos();
            $respuesta -> actualizarAlumnosModel($datosController, "alumnos");

            if($respuesta == "success"){

                header("location:index.php?action=alumnos");

            }

            else{

                echo "error";

            }

        }

    }

	#BORRAR USUARIO
	#------------------------------------
	public function borrarAlumnosController($tabla){

		if(isset($_GET["id"])){

			$datosController = $_GET["id"];
			
			$respuesta = Datos::borrarAlumnosModel($datosController, $tabla);

			if($respuesta == "success"){

				header("location:index.php?action=alumnos");
			
			}

		}

	}

    public function borrarMaestrosController($tabla){

        if(isset($_GET["id"])){

            $datosController = $_GET["id"];

            $respuesta = Datos::borrarAlumnosModel($datosController, $tabla);

            if($respuesta == "success"){

                header("location:index.php?action=alumnos");

            }

        }

    }

    public function borrarTutoriaController($tabla){

        if(isset($_GET["id"])){

            $datosController = $_GET["id"];

            $respuesta = Datos::borrarTutoriaModel($datosController, $tabla);

            if($respuesta == "success"){

                header("location:index.php?action=alumnos");

            }

        }

    }

}






////

?>