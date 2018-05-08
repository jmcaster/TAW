<?php 
	/*
	1. Ordenar un array ascendente y descendente.
	2. Hacer un programa en PHP que escriba tu nombre en negrita y la ciudad donde naciste.
	3. Llenar un array de 10 posiciones e imprimirlos en un ciclo for.
	*/

	$arr = array(3,5,7,3,5,9,3,1);
	echo "Array: ";
	for ($i=0; $i < count($arr); $i++) { 
		echo $arr[$i]. " ";
	}
	sort($arr);
	echo "<br>Ascendente: ";
	for ($i=0; $i < count($arr); $i++) { 
		echo $arr[$i]. " ";
	}
	rsort($arr);
	echo "<br>Descendente: ";
	for ($i=0; $i < count($arr); $i++) { 
		echo $arr[$i]. " ";
	}
	
	/////////////////////////////////////////
	$nombre = "Marco Fuentes";
	$ciudad = "Ciudad Victoria";
	echo "<br><br><strong>".$nombre."</strong> ".$ciudad."<br><br>";

	//////////////////////////////////////////////////

	$array = array("uno", "dos", "tres", "cuatro", "cinco", "seis", "siente", "ocho", "nueve", "diez");
	for ($i=0; $i < count($array); $i++) { 
		
		echo $array[$i]."<br>";
	}



 ?>