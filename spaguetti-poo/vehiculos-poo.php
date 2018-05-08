<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POO</title>
</head>
<body>
	<?php 

		/*CLASE
			Es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento, estado e identidad.
		*/
		/**
		* 
		*/
		class Automovil{
			
			/*PROPIEDADES
				Son las caracteristicas que puede tener un objeto
			*/
			public $marca;
			public $modelo;
			/*
			METODOS
				Es el algoritmo asociado a un objeto que indica la capacidad de lo que este puede hacer. La unica diferencia entre metodo y funcion es que llamamos metodo a las funciones de una clase (en POO), mienstras que llamamos funciones a los algoritmos PE.
			*/
			public function mostrar(){
				echo "<p> Hola soy un $this->marca, modelo $this->modelo</php> ";
			}
		}

		/* 
			OBJETO
				Es la entidad provista de metodos o mensajes a los cuales responden las propiedades con los valores asignados.
		*/
		$a = new Automovil();
		$a->marca = "Toyota";
		$a->modelo = "Corolla";
		$a->mostrar();
		$b = new Automovil();
		$b->marca = "Honda";
		$b->modelo = "Accord";
		$b->mostrar();

		/*
			ABSTRACCION
			ENCAPSULACION
			OCULTAMIENTO
		*/
	 ?>
	 <br>
	 <br>
	 <br>
	 <a href="index.php">Atras</a>
</body>
</html>