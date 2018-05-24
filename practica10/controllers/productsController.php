<?php

	class ProductsController{

		public function template(){
			include "views/template.php";
		}

		public function productsLinks(){
			if(isset($_GET["action"])){
				$link = $_GET["action"];

			}else{
				$link = "index";
			}

			$resp = Pages::linkPagesM($link);

			include $resp;
		}


		public static function productRegistrationController(){
			if(isset($_POST["registro"])){
				$data = array("nombre" => $_POST["nombre"],"descripcion"=>$_POST["descripcion"],"precio_compra"=>$_POST["precio_compra"], "precio_venta"=>$_POST["precio_venta"],"precio"=>$_POST["precio"]);
				$resp = DatosProd::productRegistrationModel("productos",$data);

				if($resp == "1"){
					header("location: index.php?action=ok");
				}else{
					header("location: index.php");
				}
			}

		}

		public static function ingresoUsuarioC(){
		if(isset($_POST["user"])){
			$datos = array( "user"=>$_POST["user"], "pass"=>$_POST["pass"]);
			$respuesta = DatosProd::ingresoUsuarioM("usuarios",$datos);
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["usuario"] == $_POST["user"] && $respuesta["password"] == $_POST["pass"]){
				session_start();
				$_SESSION["validar"] = true;
				header("location:index.php?action=usuarios");
			}else{
				header("location:index.php?action=fallo");
			}

		}	

	}
	}


?>