<?php 
    session_start(); 

    if(isset($_SESSION['email'])){
        echo "<script> owner = ".json_encode($_SESSION['email'])."</script>";
    }
    else{
        echo "<script> owner = 'nopenope' </script>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./javascript/view-recipe.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=1885065338296220&autoLogAppEvents=1" nonce="UxP4ZvUU"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <title>Cookbook</title>
</head>
<body>
    <header>
        <a href="http://68.183.125.175/portfolio/demo/cookbook/index.php"><h2 class="logo">Cookbook</h2></a>
        <ul class='nav-links'>
            <?php
                include("./nav-buttons.php");
            ?>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </header>

    <div class="view-container">

        
    </div>
    

    <script src="./javascript/nav.js"></script>
</body>
</html>