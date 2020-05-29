<?php

    if(isset($_SESSION['email'])){
        echo "<a href='/cookbook/your-cookbook.php'><li>Your Cookbook</li></a>
            <a href='/cookbook/account/logout.php'><li>Log Out</li></a>";
    }else{
        echo "<a href='/cookbook/account/login.php'><li>Your Cookbook</li></a>
            <a href='/cookbook/account/login.php'><li>Log In</li></a>";
    }

?>