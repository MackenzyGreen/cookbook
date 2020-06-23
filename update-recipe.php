<?php 

    session_start();

    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $oldShareCode = $_GET['id'];
    $query = "SELECT id FROM recipes WHERE share_code = '$oldShareCode' ";
    $res = mysqli_query($conn, $query); $row = mysqli_fetch_array($res);
    $id = $row['id'];

    $title = $_POST['recipe-name'];
    $desc = $_POST['desc'];
    $dishType = $_POST['dish-type'];
    $prepTime = $_POST['prep-time'];
    $cookTime = $_POST['cook-time'];
    if(isset($_POST['secret'])){
        $secret = $_POST['secret'];
    }else{
        $secret = 0;
    }
    $ingredients = ""; 
    $directions = ""; 
    $owner = $_SESSION['email'];
    $newShareCode = $title.$owner.$id;

    $i=1;
    while(isset($_POST['ingred'.$i])){
        $ingredients.=$_POST['ingred'.$i]."+$+";
        $i++;
    }
    $ingredients=substr($ingredients, 0, strlen($ingredients)-3);

    $i=1;
    while(isset($_POST['step'.$i])){
        $directions.=$_POST['step'.$i]."+$+";
        $i++;
    }
    $directions=substr($directions, 0, strlen($directions)-3);

    $query = "UPDATE recipes SET title=\"$title\", recipes.desc=\"$desc\", dish_type=\"$dishType\", prep_time=\"$prepTime\", cook_time=\"$cookTime\", ";
    $query .= "ingredients=\"$ingredients\", directions=\"$directions\", share_code=SHA1(\"$newShareCode\"), private=\"$secret\" ";
    $query .= "WHERE id='$id' ";

    $results = mysqli_query($conn, $query);
    if($results){
        $query = "SELECT share_code FROM recipes WHERE id='$id'";
        $res = mysqli_query($conn, $query); $row=mysqli_fetch_array($res);
        $code = $row['share_code'];
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/view-recipe.php?r=$code");
    }else{
        echo "<script>alert('Something Went Wrong. Could Not Update Recipe.');</script>";
        header("Location: http://68.183.125.175/portfolio/demo/cookbook/edit-recipe.php?r=$oldShareCode");
    }

    mysqli_close($conn);
?>