<?php
class Chat {
    // public $chatId;
    public $matchId;
    public $senderId;
    public $receiverId;
    public $message;
    public $timestamp = NULL;


    public function __construct($matchId, $senderId, $receiverId, $message) {
        // $this->chatId = $chatId;
        $this->matchId = $matchId;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->message = $message;
        // $this->timestamp = $timestamp;
    }

    //Create
    public function sendMessage() {
        // Code to store the message in a file or database
       require 'database/database.php';

        $statement = $conn->prepare("
            INSERT INTO chats (matchId, senderId, receiverId, message) 
            VALUES (:matchId, :senderId, :receiverId, :message)
        ");
        $statement->bindParam(':matchId', $this->matchId);
        $statement->bindParam(':senderId', $this->senderId);
        $statement->bindParam(':receiverId', $this->receiverId);
        $statement->bindParam(':message', $this->message);

        $statement->execute();
        $redirectUrl = "chatForm.php?action=chat&matchedUserId=" . $this->receiverId;
        header("Location: " . $redirectUrl);
        $_SESSION['message'] = "send your message";

    }


    //Read
    public function readMessage() {
        //code to show messages
        require 'database/database.php';
        
        $statement = $conn->prepare("SELECT sender_id, message, timestamp FROM chats WHERE matchId = :matchId ORDER BY timestamp ASC");
        $statement->bindValue(':matchId', $matchId);
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $sender = $row['sender_id'];
            $messageText = $row['message'];
            $timestamp = $row['timestamp'];

            echo '<div class="message">';
            echo '<span class="sender">Sender: ' . $sender . '</span><br>';
            echo $messageText . '<br>';
            echo '<span class="timestamp">Timestamp: ' . $timestamp . '</span>';
            echo '</div>';
        }
    }
}
    



?>
