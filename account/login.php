<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Cookbook</title>
</head>
<body>
    <header>
        <a href="http://68.183.125.175/portfolio/demo/cookbook/index.php"><h2 class="logo">Cookbook</h2></a>
        <ul class='nav-links'>
            <?php
                include("../nav-buttons.php");
            ?>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </header>

    <div class="split-container">
        <form action="./signup-handle.php" method="POST" id='half1'>
            <table>
                <tr>
                    <td colspan='2' id="center"><h2 class="logTitle">Sign Up</h2></td>
                </tr>
                <tr>
                    <td><h4 class="logPrompt">Email: </h4></td>
                    <td><input type="email" name="signEmail" id="signEmail" class="logInput" onfocusout="ValidateEmail('signEmail')" required></td>
                </tr>
                <tr>
                    <td><h4 class="logPrompt">Password: </h4></td>
                    <td><input type="password" name="pwd" id="pwd" required></td>
                </tr>
                <tr>
                    <td><h4 class="logPrompt">Confirm Password: </h4></td>
                    <td><input type="password" name="confirm" id="confirm" required></td>
                </tr>
                <tr>
                    <td colspan='2'  id="center">
                        <input type="button" id='signupbtn' class="logSumbit" value="Sign Up!" disabled>
                    </td>
                </tr>
            </table>
        </form>

        <form action="./login-handle.php" method="POST" id="half2">
            <table>
                <tr>
                    <td colspan='2' id="center"><h2 class="logTitle">Log In</h2></td>
                </tr>
                <tr>
                    <td><h4 class="logPrompt">Email: </h4></td>
                    <td>
                        <input type="email" name="logEmail" id="logEmail" onfocusout="ValidateEmail('logEmail')" required>
                    </td>
                </tr>
                <tr>
                    <td><h4 class="logPrompt">Password: </h4></td>
                    <td>
                        <input type="password" name="logPwd" id="logPwd" required>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' id="center">
                        <input type="submit" id='loginbtn' class="logSumbit" value="Log In!">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="../javascript/login.js"></script>
    <script src="../javascript/nav.js"></script>
</body>
</html>