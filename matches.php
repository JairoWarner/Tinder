<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <title>Chat</title>
</head>
<body>
<?php require 'includes/header.php'?>
<div class="divRead">
    <div class="swipe">

        <?php 
            require 'User/User.php';
            $email = $_SESSION['email']; // Retrieve the email from the session

            $user1 = new User();
            $user1->getUserIdSession($email);
        ?>
    </div>
    
    <?php

    ?>
    <?php
        $userId = $_SESSION['userId']; // Retrieve the user ID from the session
        $user = new User();
        $matchedUserIds = $user->getMatches($userId);
        
        if (!empty($matchedUserIds)) {
            foreach ($matchedUserIds as $matchedUserId) {
                $user->matchedUser($matchedUserId);
            }
        } else {
            echo "No matches found.";
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