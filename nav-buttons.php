<?php

    if(isset($_SESSION['email'])){
        echo "<a href='http://68.183.125.175/portfolio/demo/cookbook/your-cookbook.php'><li>Your Cookbook</li></a>
            <a href='http://68.183.125.175/portfolio/demo/cookbook/account/logout.php'><li>Log Out</li></a>";
    }else{
        echo "<a href='http://68.183.125.175/portfolio/demo/cookbook/account/login.php'><li>Your Cookbook</li></a>
            <a href='http://68.183.125.175/portfolio/demo/cookbook/account/login.php'><li>Log In</li></a>";
    }

    $uri = strtok($_SERVER["REQUEST_URI"], '?');
    if($uri=="/portfolio/demo/cookbook/index.php" || $uri == "/portfolio/demo/cookbook/your-cookbook.php"){
        echo "
            <li class='mob'>Filters</li>
            <li class='mob'><input type='button' class='button' id='Canning' value='Canning'></li>
            <li class='mob'><input type='button' class='button' id='Beverages' value='Beverages'></li>
            <li class='mob'><input type='button' class='button' id='Appetizers' value='Appetizers'></li>
            <li class='mob'><input type='button' class='button' id='Soups' value='Soups'></li>
            <li class='mob'><input type='button' class='button' id='Salads' value='Salads'></li>
            <li class='mob'><input type='button' class='button' id='Breads' value='Breads'></li>
            <li class='mob'><input type='button' class='button' id='Sides' value='Sides'></li>
            <li class='mob'><input type='button' class='button' id='Entrees' value='Entrees'></li>
            <li class='mob'><input type='button' class='button' id='Keto' value='Keto'></li>
            <li class='mob'><input type='button' class='button' id='Atkins' value='Atkins'></li>
            <li class='mob'><input type='button' class='button' id='Desserts' value='Desserts'></li>
            <li class='mob'><input type='button' class='button' id='Snacks' value='Snacks'></li>
            <li class='mob'><input type='button' class='button' id='Other' value='Other'></li>
        ";
    }
?>