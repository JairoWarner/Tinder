<?php

require 'Classes/User.php';
if(isset($_GET['action']) && isset($_GET['userId'])) {
    $userid = $_GET['userId'];
    if($_GET['action'] == 'delete') {
        // call the deleteuser function here with the $userId parameter
        $user = new User();
        $user->deleteUser($userid);
    }
}