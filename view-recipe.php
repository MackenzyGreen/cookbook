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
        <ul>
            <?php
                include("./nav-buttons.php");
            ?>
        </ul>
    </header>

    <?php //entire thing populated from php or api pull after done styling it. ?>
    <div class="view-container">

        <div class="title-info">
            <h2>Yummy Chicken</h2>
            <h4>A skillet full of diced chicken covered in cheese and a special blend of seasonings. YUMMY!</h4>
            <div class="view-tags">
                <p id="dType">Main Dish</p>
                <p id="prepTime">Prep: 5 minutes</p>
                <p id="cookTime">Cook: 25 minutes</p>
            </div>
            <div class="social">
                <?php //add api to share on social media ?>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Pintrest</li>
                </ul>
                <?php 
                    //will set onclick/value to adjust via api call and javascript.
                ?>
                <input type="button" id='optionButton' value="Save">
            </div>
        </div>
        <h2 id='divHeader'>Ingredients</h2>
        <ul class="ingredients">
            <li> Chicken</li>
            <li> Spice 1</li>
            <li> Spice 2</li>
            <li> Spice 3</li>
            <li> Cheese</li>
        </ul>


        <h2 id='divHeader'>Directions</h2>
        <div class="directions">
            <p class='desk-directions'>
                Dice chicken up and place into skillet. Cover the chicken very well with spice 1. Add about half as much of spice 2 to the chicken. A dash or two of Spice 3. Mix the skillet of chicken by hand until it is throughly mixed. 
                Cook the chicken mix on high heat until the chicken is done. Turn the heat on low and cover in cheddar cheese. Occassionaly stir until the cheese is completely melted. Enjoy!
            </p>
            
            <br><br>

            <ul class='mobile-directions'>
                <li>Dice chicken up and place into skillet</li>
                <li>Cover the chicken very well with spice 1</li>
                <li>Add about half as much of spice 2 to the chicken</li>
                <li>A dash or two of Spice 3</li>
                <li>Throughly mix by hand</li>
                <li>Cook until chicken is done</li>
                <li>Turn heat down to low and cover in cheddar cheese</li>
                <li>Occasionaly stir until cheese is melted</li>
                <li>ENJOY</li>
            </ul>
        </div>
    </div>
    


</body>
</html>