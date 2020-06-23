<?php

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $email = $_GET['u'];

    $query = "SELECT title, recipes.desc, dish_type, prep_time, cook_time, share_code  FROM recipes WHERE owner='$email' ";
    $results = mysqli_query($conn, $query);

    echo json_encode(mysqli_fetch_all($results));

    mysqli_close($conn);

?>