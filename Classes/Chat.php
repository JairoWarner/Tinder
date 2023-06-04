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

    //read 
    public function readMessage($matchId, $userId, $matchedUserId, $matchedUserName) {
        // Code to show messages
        require 'database/database.php';
        
        $statement = $conn->prepare("SELECT senderId, message, timestamp FROM chats WHERE matchId = :matchId ORDER BY timestamp ASC");
        $statement->bindValue(':matchId', $matchId);
        $statement->execute();
    
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $sender = $row['senderId'];
            $messageText = $row['message'];
            $timestamp = $row['timestamp'];
            // Create a DateTime object from the timestamp
            $date = new DateTime($timestamp);

            // Format the DateTime object to display only the time
            $time = $date->format('H:i'); // 'H' represents 24-hour format, 'i' represents minutes, 's' represents seconds
            echo "<div class='messageContent'>";
            echo '<div class="message">';
            if ($sender == $userId) {
                echo '<div class="your-message">'; 
                echo '<span class="sender">You:</span><br>';
                echo '<div class="text">' . $messageText . '</div>';
                echo '<span class="timestamp">' . $time . '</span>';
                echo '</div>';
            } else if ($sender == $matchedUserId) {
                echo '<div class="other-message">';
                echo '<span class="sender">' . $matchedUserName . ': </span><br>';
                echo '<div class="text">' . $messageText . '</div>';
                echo '<span class="timestamp">' . $time . '</span>';
            echo '</div>';

            }
            echo '</div>';
            echo '</div>';

        }
    }
    
}
    



?>
