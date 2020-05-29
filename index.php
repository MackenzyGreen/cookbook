<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./javascript/index.js"></script>
    <title>Cookbook</title>
</head>
<body>
    <header>
        <a href="index.php"><h2 class="logo">Cookbook</h2></a>
        <div class="searchDiv">
            <input type="text" name="searchText" id="searchText">
            <input type="button" value="Search">    
        </div>
        <ul>
            <?php
                include("./nav-buttons.php");
            ?>
        </ul>
    </header>

    <div class="main-container">
        <div class="dishTypeDiv">
            <ul>
                <li><input type='button' class="button" id="Entree" value="Entree"></li>
                <li><input type='button' class="button" id="Soup" value="Soup"></li>
                <li><input type='button' class="button" id="Salad" value="Salad"></li>
                <li><input type='button' class="button" id="Bread" value="Bread"></li>
                <li><input type='button' class="button" id="Snack" value="Snack"></li>
                <li><input type='button' class="button" id="Desserts" value="Desserts"></li>
                <li><input type='button' class="button" id="Keto" value="Keto"></li>
                <li><input type='button' class="button" id="Atkins" value="Atkins"></li>
                <li><input type='button' class="button" id="All" value="All"></li>
                <li><input type='button' class="button" id="Etc" value="Etc"></li>
                <li><input type='button' class="button" id="Etc2" value="Etc"></li>
            </ul>
            </div>
            <?php //change to pull from database after styling....recipe id will come from sql pull. ?>
            <div class='settingsContainer'>
                <div class="recipeCardDiv" onclick="myFunc('id')"> 
                        <div class="recipeCard">
                            <h3>Recipe Title Here</h3>
                            <p id="card-desc">A Short Description Goes Here</p>
                            <div class="tags">
                                <p id="dType">Dish Type</p>
                                <p id="prepTime">Prep Time</p>
                                <p id="cookTime">Cook Time</p>
                            </div>
                        </div>
                        <div class="recipeCard">
                            <h3>Yummy Chicken</h3>
                            <p id="card-desc">A skillet full of diced chicken covered in cheese and a special blend of seasonings. YUMMY!</p>
                            <div class="tags">
                                <p id="dType">Main Dish</p>
                                <p id="prepTime">Prep: 5 Minutes</p>
                                <p id="cookTime">Cook: 25 Minutes</p>
                            </div>
                        </div>
                        <div class="recipeCard">
                            <h3>Yummy Chicken</h3>
                            <p id="card-desc">A skillet full of diced chicken covered in cheese and a special blend of seasonings. YUMMY!</p>
                            <div class="tags">
                                <p id="dType">Main Dish</p>
                                <p id="prepTime">Prep: 5 Minutes</p>
                                <p id="cookTime">Cook: 25 Minutes</p>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</body>
</html>