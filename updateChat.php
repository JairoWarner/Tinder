<?php
// updateChat.php

// Include the necessary files and initialize the database connection
require 'database/database.php';
require 'Classes/Chat.php'; // Include the Chats class file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the chatId and editedMessage from the form submission
  $chatId = $_POST['chatId'];
  $editedMessage = $_POST['editedMessage'];
  $matchedUserId = $_GET['matchedUserId'];

  
  // Create an instance of the Chats class
  $chat1 = new Chat();
  
  // Update the chat message in the database
  $chat1->updateChat($chatId, $editedMessage, $matchedUserId);
  
  // Redirect back to the chat page or any other appropriate page
//   header("Location: chatForm.php?action=chat&matchedUserId=" . $matchedUserId);
  exit;
}
?>
