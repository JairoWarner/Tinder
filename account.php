<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <title>Account</title>
</head>
<body>
<?php require 'includes/header.php'?>
<div class="divRead">
    <p>Dit zijn alle klant gegevens uit de database:</p>
    <div class="read">
        <?php 
            require 'Classes/User.php';
            $email = $_SESSION['email']; // Retrieve the email from the session

            $user1 = new User();
            $user1->readUser($email);
        ?>
        <!-- <div class="redirect">
            <a href="swipe.php">Swipe here!</a>
        </div> -->
    </div>
    
    <div id="messagePHP"><?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>

    
<?php require 'includes/footer.php'?>
</body>
</html>