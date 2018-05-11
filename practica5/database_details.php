<?php 
	require_once('config.php');
	
	function prueba(){
		echo "conexion: ";
	}

	function getUsers(){
		$sql = "SELECT * FROM users";
		$res = $con->query($sql);
	}

	function delete($id){

	}

	function update($id){
		echo "Hola ".$id;
	}

	
	//header("Location: ./index.php");
 ?>