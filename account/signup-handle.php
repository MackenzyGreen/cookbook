<?php

    session_start();

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);


    $user = $_POST['signEmail'];
    $pwd = $_POST['pwd'].$user;

    
    $query = "INSERT INTO users (email, password) VALUES ('$user', aes_encrypt('$pwd', 'p9alkdfjaldkjfYHp9oYH0p9TY0'))";
    if(mysqli_query($conn, $query)){
        $_SESSION['email']=$user;
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/index.php");
    }else{
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/account/login.php?e=1");
    }

?>