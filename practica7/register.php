<?php 
	include 'connection.php';
	$user = filter_input(INPUT_POST, 'user_name');
	$pass = filter_input(INPUT_POST, 'password');
	$md5 = md5($pass);
	if (!$user && !$pass) {
		header('Location: login.html');
		exit();
	}else{
		$md5pass = md5($pass);
		$db = getDbConnection();
		$sql = "INSERT INTO users (user_name, password) VALUES ($user, $pass);";
		$pdo->query($sql);


		header('Location: login.html');
		
	}