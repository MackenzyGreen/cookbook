<?php

    
    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $search = $_GET['s'];
    $search = rtrim($search);
    $search = ltrim($search);
    $search = str_replace(", ", "|", $search);
    $search = str_replace(",", "|", $search);
    $search = str_replace(" ", "|", $search);

    if(isset($_GET['d'])){
        $dishType = $_GET['d'];
        $query = "SELECT title, recipes.desc, dish_type, prep_time, cook_time, share_code FROM recipes ";
        $query .= "WHERE private=0 AND (title LIKE \"($search)\" OR ingredients LIKE \"($search)\") AND dish_type=\"$dishType\" ORDER BY RAND()";
    }else{
        $query = "SELECT title, recipes.desc, dish_type, prep_time, cook_time, share_code FROM recipes WHERE private=0 AND (title REGEXP \"($search)\" OR ingredients REGEXP \"($search)\") ORDER BY RAND()";
    }
    
    $results = mysqli_query($conn, $query);
    echo json_encode(mysqli_fetch_all($results));

    mysqli_close($conn);

?>