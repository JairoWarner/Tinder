<?php
class Chat {
    public $matchId;
    public $senderId;
    public $receiverId;
    public $message;
    public $timestamp = NULL;


    public function __construct($matchId= NULL, $senderId= NULL, $receiverId= NULL, $message= NULL) {
        $this->matchId = $matchId;
        $this->senderId = $senderId;
        $this->receiverId = $receiverId;
        $this->message = $message;
    }

    // Create a new chat message
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

    // Read chat messages
    public function readMessage($matchId, $userId, $matchedUserId, $matchedUserName) {
        // Code to retrieve and display messages
        require 'database/database.php';
        
        $statement = $conn->prepare("SELECT senderId, message, chatId, timestamp FROM chats WHERE matchId = :matchId ORDER BY timestamp ASC");
        $statement->bindValue(':matchId', $matchId);
        $statement->execute();
    
        $previousDate = null; // Variable to store the previous date

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $sender = $row['senderId'];
            $messageText = $row['message'];
            $timestamp = $row['timestamp'];
            $chatId = $row['chatId'];
            
            // Create a DateTime object from the timestamp
            $date = new DateTime($timestamp);
            $currentDate = $date->format('d/m/Y');

            // Format the DateTime object to display only the time
            $time = $date->format('H:i'); // 'H' represents 24-hour format, 'i' represents minutes, 's' represents seconds
            
            echo "<div class='messageContent'>";
            // Echo the date header if the current date is different from the previous date
            if ($currentDate !== $previousDate) {
                echo '<div class="date-header">' . $currentDate . '</div>';
                $previousDate = $currentDate;
            }
            echo '<div class="message">';
            
            if ($sender == $userId) {
                echo '<div class="your-message">'; 
                echo '<div class="messageText">';
                echo '<span class="sender">You:</span><br>';
                echo '<div class="text" id="message-text-' . $chatId . '">' . $messageText . '</div>';
                echo '</div>';
                echo '<div class="infoDiv">';
                echo "<a href='chatDelete.php?action=delete&chatId=" . $chatId . "&matchedUserId=" . $matchedUserId . "' class='deleteButton' onclick=\"return confirm('Are you sure you want to delete this artikel?')\"><i class='bx bxs-trash'></i></a>";
                // echo onclick="editMessage()""<a href='chatUpdate.php?action=update&chatId=" . $chatId . "&matchedUserId=" . $matchedUserId . "' class='deleteButton' onclick=\"return confirm('Are you sure you want to delete this artikel?')\"><i class='bx bxs-edit-alt'></i></a>";
                echo '<button class="noStyle" onclick="editMessage(' . $chatId . ')"><i class="bx bxs-edit-alt"></i></button>';

                echo '<span class="timestamp">' . $time . '</span>';
                echo '</div>';
                echo '</div>';
            } else if ($sender == $matchedUserId) {
                echo '<div class="other-message">';
                echo '<div class="messageText">';
                echo '<span class="sender">' . $matchedUserName . ': </span><br>';
                echo '<div class="text">' . $messageText . '</div>';
                echo '</div>';
                echo '<div class="infoDiv">';
                echo '<span class="timestamp">' . $time . '</span>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
        echo '<div id="bottom"> </div>';
    }
    //Update Chat
    public function updateChat($chatId, $editedMessage, $matchedUserId) {
        // Include the necessary files
        require 'database/database.php';
        
        // Prepare the SQL statement
        $sql = $conn->prepare('UPDATE chats SET message = :editedMessage WHERE chatId = :chatId');
        
        // Bind parameters with values
        $sql->bindParam(':editedMessage', $editedMessage);
        $sql->bindParam(':chatId', $chatId);
        
        // Execute the SQL statement
        if ($sql->execute()) {
          // Update successful
          $_SESSION['message'] = 'Chat message updated successfully';
          header("Location: chatForm.php?action=chat&matchedUserId=" . $matchedUserId);

        } else {
          // Update failed
          $_SESSION['message'] = 'Failed to update chat message';
          header("Location: chatForm.php?action=chat&matchedUserId=" . $matchedUserId);

        }
      }
      

    // Delete a chat message using chat ID
    public function deleteChat($chatId, $matchedUserId) {
        require 'database/database.php';
        $sql = $conn->prepare('DELETE FROM chats WHERE chatId = :chatId');
        $sql->bindParam(':chatId', $chatId);
        $sql->execute();
    
        // Melding
        $_SESSION['message'] = 'De chat ' . $chatId . ' is verwijderd. <br>';
        header("Location: chatForm.php?action=chat&matchedUserId=" . $matchedUserId);
    }
}
?>
