<?php 

class Pages{
	
	public static function linkPagesM($link){


		if($link == "ingresar" || $link == "maestros" || $link == "alumnos" || $link == "salir" || $link == "tutorias"
            || $link == "registroMaestros" || $link == "editarMaestros" || $link == "registroAlumnos" || $link == "editarAlumnos"
            || $link == "registroTutoria"){

			$module =  "views/modules/".$link.".php";
		
		}

		else if($link == "index"){

			$module =  "views/modules/registroMaestros.php";
		
		}

		else if($link == "ok"){

			$module =  "views/modules/registroMaestros.php";
		
		}

		else if($link == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($link == "cambio"){

			$module =  "views/modules/maestros.php";
		
		}

		else{

			$module =  "views/modules/registroMaestros.php";

		}
		return $module;

	}

}

?>