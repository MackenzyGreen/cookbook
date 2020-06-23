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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./javascript/edit-recipe.js"></script>
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
    <?php 
        include("./API/get_recipe_php.php");
    ?>
    <div class="view-container">
        <div class="title-info-new">
          <h1>Edit Recipe</h1>  
        </div>
        <?php 
            echo "<form action='update-recipe.php?id=$id' method='POST'  class='new-recipe-form'>";
        ?>
            <table class="new-recipe-table">
                <tr>
                    <td id="form-prompt">Recipe Name: </td>
                    <td>
                        <input type="text" name="recipe-name" id="recipe-name" value=<?php echo "'{$row['title']}'"; ?>>
                    </td>
                </tr>
                <tr>
                    <td id="form-prompt">Description: </td>
                    <td>
                        <textarea name="desc" id="desc" cols="30" rows="4" maxlength='100'><?php echo $row['desc']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td id="form-prompt">Dish Type: </td>
                    <td>
                        <select name="dish-type" id="dish-type">
                            <?php 
                                $dishTypes = array('Canning', 'Beverages', 'Appetizers', 'Soups', 'Salads', 'Breads', 'Sides', 'Entrees', 'Keto', 'Atkins', 'Desserts', 'Snacks', 'Other');

                                for($i=0; $i<count($dishTypes); $i++){
                                    if($dishTypes[$i]==$row['dish_type']){
                                        echo "<option value='{$dishTypes[$i]}' selected>{$dishTypes[$i]}</option>";
                                    }else{
                                        echo "<option value='{$dishTypes[$i]}'>{$dishTypes[$i]}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td id="form-prompt">Prep Time: </td>
                    <td>
                        <input type="text" name="prep-time" id="prep-time" value=<?php echo "'{$row['prep_time']}'"; ?>>
                    </td>
                </tr>
                <tr>
                    <td id="form-prompt">Cook Time: </td>
                    <td>
                        <input type="text" name="cook-time" id="cook-time" value=<?php echo "'{$row['cook_time']}'"; ?>>
                    </td>
                </tr>
                <tr>
                    <th colspan='2' id="form-prompt">Secret Recipe: </th>
                </tr>
                <tr>
                    <td colspan='2'>
                        <?php 
                            if($row['private']==1){
                                echo "<div style='margin-bottom: 10px;'><input type='checkbox' name='secret' id='secret' value='1' checked> YES</div>";
                            }else{
                                echo "<div style='margin-bottom: 10px;'><input type='checkbox' name='secret' value='1' id='secret'> YES</div>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th colspan='2' id="form-prompt">Ingredients</td>
                </tr>
                <tr>
                    <td class="ingredient-list" colspan='2'>
                        <?php 
                            $ingredList = explode("+$+", $row['ingredients']);
                            for($i=0; $i<count($ingredList); $i++){
                                $temp = $i+1;
                                if($i==(count($ingredList))-1){
                                    echo "
                                        <div id='ingred-slot-$temp'>
                                            <input type='text' name='ingred$temp' id='ingred$temp' value='{$ingredList[$i]}'>
                                            <input type='button' id='addIngredientSlot$temp' value='+'>
                                        </div>
                                    ";
                                }else{
                                    echo "
                                        <div id='ingred-slot-$temp'>
                                            <input type='text' name='ingred$temp' id='ingred$temp' value='{$ingredList[$i]}'>
                                            <input type='button' id='deleteIngredientSlot$temp' value='-'>
                                        </div>
                                    ";
                                }
                            }
                        ?>
                        
                    </td>
                </tr>
                <tr>
                    <th colspan='2' id="form-prompt">Directions</th>
                </tr>
                <tr>
                    <td class="direction-list" colspan='2'>
                        <?php 
                            $directList = explode("+$+", $row['directions']);
                            for($i=0; $i<count($directList); $i++){
                                $temp = $i+1;
                                if($i==(count($directList))-1){
                                    echo "
                                        <div id='direction-slot-$temp'>
                                            <input type='text' name='step$temp' id='step$temp' value='{$directList[$i]}'>
                                            <input type='button' id='directionAdd$temp' value='+'>
                                        </div>
                                    ";
                                }else{
                                    echo "
                                        <div id='direction-slot-$temp'>
                                            <input type='text' name='step$temp' id='step$temp'  value='{$directList[$i]}'>
                                            <input type='button' id='directionDelete$temp' value='-'>
                                        </div>    
                                    ";
                                }
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input type="submit" value="Update Recipe!">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php 
        echo "
                <script>
                    ingredientCount = ".json_encode((count($ingredList)+1)).";
                    directionCount = ".json_encode((count($directList)+1)).";
                </script>
            ";
    ?>
    <script src="./javascript/nav.js"></script>
</body>
</html>