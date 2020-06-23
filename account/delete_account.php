<?php
    //might revist at later date to create a "deleted" table set for account retrieval 
    session_start();

    $email = $_SESSION['email'];
    $password = $_POST['deletePwd']."".$email;

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $query = "DELETE FROM users WHERE email = '$email' AND password=aes_encrypt('$password', 'p9alkdfjaldkjfYHp9oYH0p9TY0')";
   
    if((mysqli_query($conn, $query))==1){
        $query = "DELETE FROM recipes WHERE owner = '$email' ";
        mysqli_query($conn, $query);
        session_destroy();
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/index.php");
    }

?>