<?php

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $shareCode = $_GET['id'];
    $owner = $_GET['user'];

    $query = "SELECT * FROM recipes WHERE share_code = '$shareCode' ";
    $results = mysqli_query($conn, $query);
    $recipe = mysqli_fetch_array($results);

    $query = "SELECT id FROM recipes ORDER BY id DESC LIMIT 1";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);
    $id = $row['id']+1;

    $title = $recipe['title'];
    $desc = $recipe['desc'];
    $dishType = $recipe['dish_type'];
    $prepTime = $recipe['prep_time'];
    $cookTime = $recipe['cook_time'];
    $ingredients = $recipe['ingredients'];
    $directions = $recipe['directions'];
    $private = $recipe['private'];
    $shareCode = $title.$owner.$id;

    $query = "INSERT INTO recipes (title, recipes.desc, dish_type, prep_time, cook_time, ingredients, directions, owner, share_code, private) ";
    $query .= "VALUES (\"$title\", \"$desc\", \"$dishType\", \"$prepTime\", \"$cookTime\", \"$ingredients\", \"$directions\", \"$owner\", SHA1(\"$shareCode\"), \"$private\")";

    $results = mysqli_query($conn, $query);

    if($results){
        echo json_encode(true);
    } else{
        echo json_encode(false);
    }

?>