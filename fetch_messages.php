<?php
// Assuming you have a Chat class with a readMessagesByMatchId method

// Create an instance of the Chat class
$chat = new Chat();

// Fetch chat messages by matchId
$messages = $chat->readMessage($matchedUserId);

// Return the chat messages as JSON
header('Content-Type: application/json');
echo json_encode($messages);
?>
