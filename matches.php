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
    
    <?php

    ?>
    <?php
        // require 'Classes/User.php';

        $userId = $_SESSION['userId']; // Retrieve the user ID from the session
        $user = new User();
        $matchedUserIds = $user->getMatches($userId);
        // var_dump($matchedUserIds)
        if (!empty($matchedUserIds)) {
            foreach ($matchedUserIds as $matchedUserId) {
                $matchedUser = $user->matchedUser($matchedUserId);
        
                if ($matchedUser !== null) {
                    $matchedUserName = $matchedUser[0]['name'];
        
                    // Construct the URL with matchedUserId as a query parameter
                    $url = "chatForm.php?action=chat&matchedUserId=" . urlencode($matchedUserId);
        
                    // Output the link and additional user information
                    echo '<li><a href="' . $url . '">Name: ' . $matchedUserName . '</a></li>';
                }
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