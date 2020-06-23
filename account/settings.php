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
    <div class="view-container">
        <div class="title-info-new">
            <h1>Settings</h1>    
        </div>
        <div class="setting-options">
            <div id="divide-border">
            <h3>CHANGE EMAIL</h3>
                <form action="change-email.php" method="POST">
                    <table>
                        <tr>
                            <td>Current Email: </td>
                            <td>
                                <input type="email" name="oldEmail" id="oldEmail" onfocusout="ValidateEmail('oldEmail')" required>
                            </td>
                        </tr>
                        <tr>
                            <td>New Email:</td>
                            <td>
                                <input type="email" name="newEmail" id="newEmail" onfocusout="ValidateEmail('newEmail')" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td>
                                <input type="password" name="emailPassword" id="emailPassword" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <input type="submit" id="updateEmailBtn" value="Update Email" disabled>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <h3>CHANGE PASSWORD</h3>
            <form action="change-password.php" method="POST">
                <table>
                    <tr>
                        <td>New Password: </td>
                        <td>
                            <input type="password" name="newPassword" id="newPassword" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Confrim Password: </td>
                        <td>
                            <input type="password" name="confirmPassword" id="confirmPassword" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Original Password: </td>
                        <td>
                            <input type="password" name="oldPassword" id="oldPassword" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <input type="submit" id="updatePwdBtn" value="Update Password" disabled>
                        </td>
                    </tr>
                </table>
            </form>
            <div id="divide-border">
                <h3>DELETE ACCOUNT</h3>
                <form action="delete_account.php" method="POST">
                    <table>
                        <tr>
                            <td>Password: </td>
                            <td>
                                <input type="password" name="deletePwd" id="deletePwd" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Confrim Password: </td>
                            <td>
                                <input type="password" name="confirmDelete" id="confirmDelete" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <input type="submit" id="deleteBtn" value="Delete Account" disabled>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="../javascript/settings.js"></script>
    <script src="../javascript/nav.js"></script>
</body>
</html>