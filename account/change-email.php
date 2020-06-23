<?php 
    session_start();

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $oldEmail = $_POST['oldEmail'];
    $newEmail = $_POST['newEmail'];
    $pwd = $_POST['emailPassword']."".$oldEmail;
    $newPwd = $_POST['emailPassword']."".$newEmail;

    $query = "SELECT * FROM users WHERE email='$oldEmail' AND password=aes_encrypt('$pwd', 'p9alkdfjaldkjfYHp9oYH0p9TY0')";
    $results = mysqli_query($conn, $query);

    if(mysqli_num_rows($results)==0){
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/account/settings.php?e=2");
    }else{
        $query = "UPDATE users SET email='$newEmail', password=aes_encrypt('$newPwd', 'p9alkdfjaldkjfYHp9oYH0p9TY0') WHERE email='$oldEmail' ";
        if(mysqli_query($conn, $query)){
            $_SESSION['email'] = $newEmail;
            $query = "UPDATE recipes SET owner = '$newEmail' WHERE owner='$oldEmail' ";
            mysqli_query($conn, $query);
            header("Location: http://68.183.125.175/portfolio/demo/cookbook/account/settings.php?e=1");
        }else{
            header("Location: http://68.183.125.175/portfolio/demo/cookbook/account/settings.php?e=5");
        }
    }

?>