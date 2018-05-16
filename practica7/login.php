<?php 
    include 'connection.php';
    session_start();
    session_unset();
    session_destroy();
    $user = filter_input(INPUT_POST, 'user');
    $pass = filter_input(INPUT_POST, 'pass');
    
    if (!$user && !$pass) {
        header('Location: login.html');
        exit();
    }else{
        $md5pass = md5($pass);

        $sql = "SELECT * FROM users WHERE user_name = '$user' AND password = '$md5pass';";
        $res = $pdo->query($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        if(!$row){
            header('Location: login.html');
            exit();
        }else{
            session_start();
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
            header('Location: index.php');
        }
    }