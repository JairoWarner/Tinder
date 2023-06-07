<?php

// Require the User class file
require 'Classes/User.php';

// Check if 'action' and 'userId' parameters are set in the $_GET array
if(isset($_GET['action']) && isset($_GET['userId'])) {

    // Get the value of 'userId' parameter from $_GET array
    $userid = $_GET['userId'];

    // Check if 'action' parameter is 'delete'
    if($_GET['action'] == 'delete') {

        // Create a new User object
        $user = new User();

        // Call the deleteUser function on the User object with $userId parameter
        $user->deleteUser($userid);

        // Check if the user was not deleted successfully
        if (!$user->wasUserDeleted()) {
            // Set the 'message' session variable to 'Couldn't delete user'
            session_start();
            $_SESSION['message'] = "Couldn't delete user";
            
            // Redirect to account.php
            header('Location: account.php');
            
            // Stop further script execution
            exit();
        }
    }
}
