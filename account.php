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

<!-- The main content section -->
<div class="content">
    <div class="divRead">
        <p>Dit zijn alle klant gegevens uit de database:</p>
        
        <!-- Display the user information -->
        <div class="read">
            <?php 
                // Require the User class file
                require 'Classes/User.php';
                
                // Retrieve the email from the session
                $email = $_SESSION['email'];

                // Create a new User object
                $user1 = new User();

                // Retrieve and display the user information based on the email
                $user1->readUser($email);
            ?>
            
            <!-- Redirect links -->
            <div class="redirect">
                <a href="swipe.php"><i class='bx bxs-hot'>Swipe here!</i></a>
            </div>
            <div class="redirect">
                <a href="matches.php"><i class='bx bx-chat'>Matches</i></a>
            </div>
        </div>
        
        <!-- Display a message stored in the session -->
        <div id="messagePHP"><?php
            if (isset($_SESSION['message'])) {
                // Output the message
                echo $_SESSION['message'];
                // Remove the message from the session
                unset($_SESSION['message']);
            }
        ?></div>
    </div>

<?php require 'includes/footer.php'?>
</body>
</html>
