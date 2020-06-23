<?php 

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $id = $_GET['r'];

    $query = "SELECT * FROM recipes WHERE share_code='$id' ";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);

?>