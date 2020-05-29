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
        <a href="../index.php"><h2 class="logo">Cookbook</h2></a>
        <ul>
            <?php
                include("../nav-buttons.php");
            ?>
        </ul>
    </header>

    <div class="split-container">
        <form action="./signup-handle.php" method="POST" id='half1'>
            <table>
                <tr>
                    <td colspan='2' id="center"><h2>Sign Up</h2></td>
                </tr>
                <tr>
                    <td><h4>Email: </h4></td>
                    <td><input type="email" name="signEmail" id="signEmail" onfocusout="ValidateEmail('signEmail')" required></td>
                </tr>
                <tr>
                    <td><h4>Password: </h4></td>
                    <td><input type="password" name="pwd" id="pwd" required></td>
                </tr>
                <tr>
                    <td><h4>Confirm Password: </h4></td>
                    <td><input type="password" name="confirm" id="confirm" required></td>
                </tr>
                <tr>
                    <td colspan='2'  id="center">
                        <input type="button" id='signupbtn' value="Sign Up!" disabled>
                    </td>
                </tr>
            </table>
        </form>

        <form action="./login-handle.php" method="POST" id="half2">
            <table>
                <tr>
                    <td colspan='2' id="center"><h2>Log In</h2></td>
                </tr>
                <tr>
                    <td><h4>Email: </h4></td>
                    <td>
                        <input type="email" name="logEmail" id="logEmail" onfocusout="ValidateEmail('logEmail')" required>
                    </td>
                </tr>
                <tr>
                    <td><h4>Password: </h4></td>
                    <td>
                        <input type="password" name="logPwd" id="logPwd" required>
                    </td>
                </tr>
                <tr>
                    <td colspan='2' id="center">
                        <input type="submit" id='loginbtn' value="Log In!">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="../javascript/login.js"></script>
</body>
</html>