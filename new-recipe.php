<?php 
    session_start(); 
    if(!isset($_SESSION['email'])){
        header("Location: /cookbook/account/login.php");
    }
    
?>

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
        <div class="title-info-new">
          <h1>NEW RECIPE</h1>  
        </div>
        <form action='save-recipe.php' method='POST'  class="new-recipe-form">
            <table class="new-recipe-table">
                <tr>
                    <td id="form-prompt">Recipe Name: </td>
                    <td>
                        <input type="text" name="recipe-name" id="recipe-name" required>
                    </td>
                </tr>
                <tr>
                    <td id="form-prompt">Description: </td>
                    <td>
                        <textarea name="desc" id="desc" cols="30" rows="4" maxlength='100'></textarea>
                    </td>
                </tr>
                <tr>
                    <td id="form-prompt">Dish Type: </td>
                    <td>
                        <select name="dish-type" id="dish-type">
                            <option value="Canning">Canning</option>
                            <option value="Beverages">Beverages</option>
                            <option value="Appetizers">Appetizers</option>
                            <option value="Soups">Soups</option>
                            <option value="Salads">Salads</option>
                            <option value="Breads">Breads</option>
                            <option value="Sides">Sides</option>
                            <option value="Entrees">Entrees</option>
                            <option value="Keto">Keto</option>
                            <option value="Atkins">Atkins</option>
                            <option value="Desserts">Desserts</option>
                            <option value="Snacks">Snacks</option>
                            <option value="Other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="form-prompt">Prep Time: </td>
                    <td>
                        <input type="text" name="prep-time" id="prep-time"  required>
                    </td>
                </tr>
                <tr>
                    <td id="form-prompt">Cook Time: </td>
                    <td>
                        <input type="text" name="cook-time" id="cook-time"  required>
                    </td>
                </tr>
                <tr>
                    <th colspan='2' id="form-prompt">Secret Recipe: </th>
                </tr>
                <tr>
                    <td colspan='2'>
                        <div style='margin-bottom: 10px;'><input type="checkbox" name="secret" id="secret"> YES</div>
                    </td>
                </tr>
                <tr>
                    <th colspan='2' id="form-prompt">Ingredients</td>
                </tr>
                <tr>
                    <td class="ingredient-list" colspan='2'>
                        <div id="ingred-slot-1">
                            <input type="text" name="ingred1" id="ingred1">
                            <input type="button" id="addIngredientSlot1" value="+">
                        </div>
                        
                    </td>
                </tr>
                <tr>
                    <th colspan='2' id="form-prompt">Directions</th>
                </tr>
                <tr>
                    <td class="direction-list" colspan='2'>
                        <div id='direction-slot-1'>
                            <input type="text" name="step1" id="step1">
                            <input type="button" id="directionAdd1" value="+">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input type="submit" value="Save Recipe!">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./javascript/new-recipe.js"></script>
    <script src="./javascript/nav.js"></script>
</body>
</html>