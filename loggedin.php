<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>You are logged in!</title>
</head>
<body>
<?php require 'includes/header.php'?>
<div class="divRead">
    <!-- <p>You are loggged in!:</p> -->
    <div class="read">
    <?php 
    require 'Classes/User.php';
    $email = $_SESSION['email']; // Retrieve the email from the session

    $userIdSession = new User();
    $userIdSession->getUserIdSession($email);
?>
    <div class="content">
        <div class="center_title">
            <div class="title_text">
                <h1>Swipe naar Rechts</h1>
                <button><a href="swipe.php">Start swiping</a> </button>
            </div>
        </div>
    </div>

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