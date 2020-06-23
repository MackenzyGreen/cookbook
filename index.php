<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cookbook</title>
</head>
<body>
    <header>
        <a href="http://68.183.125.175/portfolio/demo/cookbook/index.php"><h2 class="logo">Cookbook</h2></a>
        <div class="searchDiv">
            <input type="text" name="searchText" id="searchText" placeholder="Search Cookbook">
            <input type="button" id="mainSearch" value="Search">    
        </div>
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

    <div class="main-container">
        <div class="dishTypeDiv">
            <ul>
                <li><input type='button' class="button" id="Canning" value="Canning"></li>
                <li><input type='button' class="button" id="Beverages" value="Beverages"></li>
                <li><input type='button' class="button" id="Appetizers" value="Appetizers"></li>
                <li><input type='button' class="button" id="Soups" value="Soups"></li>
                <li><input type='button' class="button" id="Salads" value="Salads"></li>
                <li><input type='button' class="button" id="Breads" value="Breads"></li>
                <li><input type='button' class="button" id="Sides" value="Sides"></li>
                <li><input type='button' class="button" id="Entrees" value="Entrees"></li>
                <li><input type='button' class="button" id="Keto" value="Keto"></li>
                <li><input type='button' class="button" id="Atkins" value="Atkins"></li>
                <li><input type='button' class="button" id="Desserts" value="Desserts"></li>
                <li><input type='button' class="button" id="Snacks" value="Snacks"></li>
                <li><input type='button' class="button" id="Other" value="Other"></li>
            </ul>
            </div>
            <div class='settingsContainer'>
                <div class="recipeCardDiv"> 
                
                </div>
            </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./javascript/index.js"></script>
    <script src="./javascript/nav.js"></script>
</body>
</html>