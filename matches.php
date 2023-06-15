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

<!-- <div class="divRead"> -->
<div class="content">
<h1>Matches</h1>

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
    <div class="matches">
    <?php
        // require 'Classes/User.php';

        $userId = $_SESSION['userId']; // Retrieve the user ID from the session
        $user = new User(); // Create an instance of the User class
        $matchedUserIds = $user->getMatches($userId); // Call the getMatches method of the User class

        // var_dump($matchedUserIds)

        if (!empty($matchedUserIds)) {
            echo '<div class="matchesDiv">';
            foreach ($matchedUserIds as $matchedUser) {
                $matchedUserId = $matchedUser['userId'];
                $matchedUserDetails = $user->matchedUser($matchedUserId);
                if ($matchedUserDetails !== null) {
                    $matchedUserName = $matchedUserDetails[0]['name'];
                    $matchedUserSurName = $matchedUserDetails[0]['surname'];
                    $matchId = $matchedUser['matchId'];
        
                    $url = "chatForm.php?action=chat&matchedUserId=" . urlencode($matchedUserId);

                    echo '<div class="matchedUserList">';
                    echo '<li><a href="' . $url . '">' . $matchedUserName . ' ' . $matchedUserSurName . '</a></li>';
                    echo '<li class="deleteButton"><a href="?delete=' . $matchId . '" onclick="return confirm(\'Are you sure you want to delete this article?\')"><i class="bx bxs-trash"></i></a></li>';
                    echo '</div>';

                    
        
                    if (isset($_GET['delete'])) {
                        $id = $_GET['delete'];
                        $user->deleteMatch($id);
                    }
                }
            }
            echo '</div>';

        } else {
            echo "<div class='noMatches'> No matches yet.</div>";
        }

    ?>
    <div id="messagePHP"><?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message']; // Output the stored message from the session
            unset($_SESSION['message']); // Remove the message from the session
        }
    ?>
    
    <div class="redirect">
                <a href="swipe.php"><i class='bx bxs-hot'>Swipe here</i></a>
            </div>

    <!-- </div> -->
    </div>
</div>  
<?php require 'includes/footer.php'?> <!-- Include the footer.php file -->


</body>
</html>