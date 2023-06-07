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
<?php require 'includes/header.php'?> <!-- Include the header.php file -->

<div class="divRead">
    <div class="swipe">

        <?php 
            require 'Classes/User.php'; // Include the User class
            $email = $_SESSION['email']; // Retrieve the email from the session

            if (!isset($_SESSION['email'])) {
                $_SESSION['message'] = "Please log in first.";
                header("Location: loginForm.php");
                exit;
            }

            $user1 = new User(); // Create an instance of the User class
            $user1->getUserIdSession($email); // Call the getUserIdSession method of the User class
        ?>
    </div>
    
    <?php
        // require 'Classes/User.php';

        $userId = $_SESSION['userId']; // Retrieve the user ID from the session
        $user = new User(); // Create an instance of the User class
        $matchedUserIds = $user->getMatches($userId); // Call the getMatches method of the User class

        // var_dump($matchedUserIds)

        if (!empty($matchedUserIds)) { // Check if there are matched user IDs
            foreach ($matchedUserIds as $matchedUserId) { // Iterate through the matched user IDs
                $matchedUser = $user->matchedUser($matchedUserId); // Call the matchedUser method of the User class

                if ($matchedUser !== null) { // Check if the matched user exists
                    $matchedUserName = $matchedUser[0]['name']; // Retrieve the matched user's name
                    
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
            echo $_SESSION['message']; // Output the stored message from the session
            unset($_SESSION['message']); // Remove the message from the session
        }
    ?>
    
</div>
<?php require 'includes/footer.php'?> <!-- Include the footer.php file -->
</body>
</html>
