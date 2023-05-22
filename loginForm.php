<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
 
    <title>Login</title>
</head>
<body>
<?php 
require 'includes/header.php';
?>

    <div class="content">
        <div class="accountPage">
            <div class="tinderCard">
                <div class="accountItems">
                    <h1>Login</h1>
                    <div class="accountForm">
                        <form method="post" action="login.php" class="form">
                            <label for="email">email:</label>
                            <input type="email" id="email" name="email" required>
                            <br>
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                            <br><br>
                            <div id="messagePHP"><?php

                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?>
                            </div>
                            <div class="submitButton">
                                <input type="submit" value="Login" class="submitClass">
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .messagePHP {
        color: black;
    }
</style>


    <?php require 'includes/footer.php'?>
</body>
</html>