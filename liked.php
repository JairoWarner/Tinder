<?php 
    require 'Classes/User.php'; // Include the User.php file

    // $userId = $_SESSION['userId']; // Retrieve the email from the session

    if (isset($_GET['userId'])) { // Check if the 'userId' parameter is set in the URL
        $userId = $_GET['userId']; // Retrieve the 'userId' from the URL
        // Use the $userId as needed

        $user1 = new User(); // Create a new instance of the User class
        $user1->userLike($userId); // Call the userLike method on the User instance passing the userId
    } else {
        echo "User ID not found in URL"; // Display a message if the 'userId' parameter is not found in the URL
    }
?>
