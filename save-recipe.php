<?php 

    session_start();

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $query = "SELECT id FROM recipes ORDER BY id DESC LIMIT 1";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);
    $id = $row['id']+1;

    $title = $_POST['recipe-name'];
    $desc = $_POST['desc'];
    $dishType = $_POST['dish-type'];
    $prepTime = $_POST['prep-time'];
    $cookTime = $_POST['cook-time'];
    $ingredients = "";
    $directions = "";
    $owner = $_SESSION['email'];
    $shareCode = $title.$owner.$id;
    if(isset($_POST['secret'])){
        $private = 1;
    }else{
        $private = 0;
    }

    $i = 1;
    while(isset($_POST['ingred'.$i])){
        $ingredients.=$_POST['ingred'.$i]."+$+";
        $i++;
    }

    $ingredients=substr($ingredients, 0, (strlen($ingredients)-3));
    
    $i = 1;
    while(isset($_POST['step'.$i])){
        $directions.=$_POST['step'.$i]."+$+";
        $i++;
    }

    $directions=substr($directions, 0, (strlen($directions)-3));

    $query = "INSERT INTO recipes (title, recipes.desc, dish_type, prep_time, cook_time, ingredients, directions, owner, share_code, private) ";
    $query .= "VALUES(\"$title\", \"$desc\", \"$dishType\", \"$prepTime\", \"$cookTime\", \"$ingredients\", \"$directions\", \"$owner\", SHA1(\"$shareCode\"), \"$private\")";

    echo "$query";
    
    if(mysqli_query($conn, $query)){
        $query = "SELECT share_code FROM recipes WHERE id='$id' ";
        $res = mysqli_query($conn, $query); $row=mysqli_fetch_array($res);
        $code = $row['share_code'];

        header("Location: http://68.183.125.175/portfolio/demo/cookbook/view-recipe.php?r=$code");
    }else{
        echo "<script> alert('Something Went Wrong. Recipe Could Not Be Saved.'); </script>";
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/new-recipe.php");
    }

?>