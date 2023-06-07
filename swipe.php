<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <title>Swipe</title>
</head>
<body>
<?php require 'includes/header.php'?>
<div class="divRead">
    <div class="swipe">

        <?php 
            require 'Classes/User.php';
            $email = $_SESSION['email']; // Retrieve the email from the session
            if (!isset($_SESSION['email'])) {
                $_SESSION['message'] = "Please log in first.";
                header("Location: loginForm.php");
                exit;
            }
            $user1 = new User();
            $user1->getUserIdSession($email);
        ?>
    </div>
    
    <!-- <a href="liked.php">Like</a> -->
    <?php

    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $link = "liked.php?userId=" . $userId;
        echo '<a href="' . $link . '">Like</a>';
    } else {
        echo "User ID is not present in the session";
    }

    
    ?>

    <div id="messagePHP"><?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>


    
<?php require 'includes/footer.php'?>
</body>
</html>