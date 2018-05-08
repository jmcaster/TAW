<?php 
	//Desarrollar un script utilizando POO donde se almacenen en un array numerico de 25 posiciones y se imprima la serie fibonacci de el mismo, los valores del array se van a ir llenando con base al calculo de la serie.
	class arreglo{
		public $numeros;
		function fibonacci(){
			echo "Arreglo de numeros: ";
			for ($i=0; $i < count($this->numeros); $i++) { 
				echo $this->numeros[$i]." ";
			}
			$f = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			for ($i=0; $i < count($this->numeros); $i++) { 
				if($i == 0){
					$f[0] = $this->numeros[0];
				}else{
					$f[$i] = $this->numeros[$i]+$this->numeros[$i-1];
				}
			}
			
			echo "<br>Serie fibonacci: ";
			for ($i=0; $i < count($f); $i++) { 
				echo $f[$i]." ";
			}
		}
	}
	$a = new arreglo();
	$a->numeros = array(1,4,6,5,8,9,6,9,7,0,4,2,1,7,4,6,3,5,6,7,8,3,2,4,7);
	$a->fibonacci();
 ?>