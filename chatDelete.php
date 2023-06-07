<?php

// Require the Chat class file
require 'Classes/Chat.php';

// Check if the 'action' and 'chatId' parameters are set in the GET request
if(isset($_GET['action']) && isset($_GET['chatId'])) {
    // Retrieve the chatId and matchedUserId from the GET parameters
    $chatId = $_GET['chatId'];
    $matchedUserId = $_GET['matchedUserId'];

    // Check if the 'action' parameter is set to 'delete'
    if($_GET['action'] == 'delete') {
        // Create a new Chat object
        $chat = new Chat();

        // Call the deleteChat method of the Chat object with the chatId and matchedUserId parameters
        $chat->deleteChat($chatId, $matchedUserId);
    }
}
