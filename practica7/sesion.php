<?php 

	session_start();
	if (!isset($_SESSION['user_name'])) {
		header('Location: login.html');
		exit();
	}else{
		$now = time();
		if ($now > $_SESSION['expire']) {
        	session_destroy();
             echo "Your session has expired! <a href='login.php'>Login here</a>";
         }
	}
 ?>