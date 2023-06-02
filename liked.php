<?php 
    require 'Classes/User.php';
    // $userId = $_SESSION['userId']; // Retrieve the email from the session
    if (isset($_GET['userId'])) {
        $userId = $_GET['userId'];
        // Use the $userId as needed
        $user1 = new User();
        $user1->userLike($userId);
        } else {
        echo "User ID not found in URL";
    }
 
?>