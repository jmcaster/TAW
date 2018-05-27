<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroMaestrosModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, carrera, email, password) 
                                                        VALUES (:nombre,:carrera,:email, :password)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		//$stmt->close();

	}

    public function registroAlumnosModel($datosModel, $tabla){

        #prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, carrera, id_tutor) 
                                                        VALUES (:matricula,:nombre,:carrera, :id_tutor)");

        #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

        $stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":id_tutor", $datosModel["id_tutor"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "success";

        }

        else{

            return "error";

        }

        //$stmt->close();

    }

    public function registroTutoriaModel($datosModel, $tabla){

        #prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_alumno, id_tutor, fecha, hora, tipo, temas) 
                                                        VALUES (:id_alumno,:id_tutor,:fecha, :hora, :tipo, :temas)");

        #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

        $stmt->bindParam(":id_alumno", $datosModel["id_alumno"], PDO::PARAM_STR);
        $stmt->bindParam(":id_tutor", $datosModel["id_tutor"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":temas", $datosModel["temas"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "success";

        }

        else{

            return "error";

        }

        //$stmt->close();

    }



	#INGRESO USUARIO
	#-------------------------------------
	public function loginModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE email = :email");
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		//$stmt->close();

	}

	#VISTA USUARIOS
	#-------------------------------------
    //MAESTROS
	public function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		//$stmt->close();

	}

	//CONEXION A LA BASE DE DATOS PARA LA CONSULTA DE LOS ALUMNOS REGISTRADOS
    public function vistaAlumnosModel($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();

        #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
        return $stmt->fetchAll();

        //$stmt->close();

    }

    //CONEXION A LA BASE DE DATOS PARA LA CONSULTA DEL TUTOR ASIGNADO A CADA ALUMNO
    public function getTutor($id_tutor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM maestros WHERE num_empleado = :id");
        $stmt->bindParam(":id", $id_tutor, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }
    public function getAllTutor(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM maestros ");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    //CONSULTAR LA INFORMACION DE UN ALUMNO MEDIANTE SU ID
    public function getAlumno($id){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM alumnos WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAllAlumnos(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM alumnos");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getCarreras(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM carreras");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    //CONSULTA DE LAS TUTORIAS REGISTRADAS
    public function vistaTutoriasModel($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();

        #fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
        return $stmt->fetchAll();

        //$stmt->close();

    }

	#EDITAR USUARIO
	#-------------------------------------

	public function editarMaestrosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT num_empleado, nombre, carrera, email, password FROM $tabla WHERE num_empleado = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		//$stmt->close();

	}

    public function editarAlumnosModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT id, matricula, nombre, carrera, id_tutor FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();

        //$stmt->close();

    }

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarMaestrosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, carrera = :carrera,
                                                            email = :email, password = :password,  WHERE num_empleado = :num_empleado");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		//$stmt->close();

	}

    public function actualizarAlumnosModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula = :matricula, nombre = :nombre, carrera = :carrera,
                                                            id_tutor = :id_tutor,  WHERE id = :id");

        $stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":id_tutor", $datosModel["id_tutor"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "success";

        }

        else{

            return "error";

        }

        //$stmt->close();

    }


	#BORRAR USUARIO
	#------------------------------------
	public function borrarMaestrosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE num_empleado = :num_empleado");
		$stmt->bindParam(":num_empleado", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		//$stmt->close();

	}
    public function borrarAlumnosModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        if($stmt->execute()){

            return "success";

        }

        else{

            return "error";

        }

        //$stmt->close();


    }

    public function borrarTutoriaModel($datosModel, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        if($stmt->execute()){

            return "success";

        }

        else{

            return "error";

        }

        //$stmt->close();


    }

}




/*

#REGISTRO DE PRODUCTOS
	#-------------------------------------
	public function registroProductosModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreProd, descProduc, BuyPrice,SalePrice, Proce) VALUES (:nombreProd,:descProduc,:BuyPrice,:SalePrice,:Proce)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt1->bindParam(":nombreProd", $datosModel["nombreProd"], PDO::PARAM_STR);
		$stmt1->bindParam(":descProduc", $datosModel["descProduc"], PDO::PARAM_STR);
		$stmt1->bindParam(":BuyPrice", $datosModel["BuyPrice"], PDO::PARAM_STR);
		$stmt1->bindParam(":SalePrice", $datosModel["SalePrice"], PDO::PARAM_STR);
		$stmt1->bindParam(":Proce", $datosModel["Proce"], PDO::PARAM_STR);
		

		if($stmt1->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt1->close();

	}

*/

?>