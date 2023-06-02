<?php

require 'Classes/Chat.php';

// Get the message from the request
$matchId = $_POST['matchId'];
$senderId = $_POST['senderId'];
$receiverId = $_POST['receiverId'];
$message = $_POST['message'];

// Create an instance of the Chat class and pass the required arguments
$chat = new Chat($matchId, $senderId, $receiverId, $message);

// Create a new chat message
$chat->sendMessage();

// Send a success response
// http_response_code(200);


?>
