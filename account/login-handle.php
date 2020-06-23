<?php

    session_start();

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $user = $_POST['logEmail'];
    $password = $_POST['logPwd']."".$user;

    $query = "SELECT email FROM users WHERE email='$user' AND password=aes_encrypt('$password', 'p9alkdfjaldkjfYHp9oYH0p9TY0') ";
    $results = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($results)==0){
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/account/login.php?e=3");
    }else{
        $row=mysqli_fetch_array($results);
        $_SESSION['email'] = $row['email'];
        

        header("Location: http://68.183.125.175/portfolio/demo/cookbook/index.php");
    }

?>