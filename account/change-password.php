<?php
    session_start();

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $email = $_SESSION['email'];
    $oldPassword = $_POST['oldPassword']."".$email;
    $newPassword = $_POST['newPassword']."".$email;

    $query = "SELECT * FROM users WHERE email = '$email' AND password = aes_encrypt('$oldPassword', 'p9alkdfjaldkjfYHp9oYH0p9TY0') ";
    $results = mysqli_query($conn, $query);

    if(mysqli_num_rows($results)==0){
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/account/settings.php?e=6");
    }else{
        $query = "UPDATE users SET password = aes_encrypt('$newPassword', 'p9alkdfjaldkjfYHp9oYH0p9TY0') ";
        if(mysqli_query($conn, $query)){
            header("Location: http://68.183.125.175/portfolio/demo/cookbook/account/settings.php?e=8");
        }else{
            header("Location: http://68.183.125.175/portfolio/demo/cookbook/account/settings.php?e=10");
        }
    }

?>