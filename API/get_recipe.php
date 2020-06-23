<?php

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $id = $_GET['id'];

    $query = "SELECT * FROM recipes WHERE share_code='$id' ";
    $results = mysqli_query($conn, $query);

    mysqli_close($conn);

    echo json_encode(mysqli_fetch_all($results));

?>