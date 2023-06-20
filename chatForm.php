<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Chat</title>
</head>
<body>
<?php require 'includes/header.php'?> <!-- Include the header.php file -->
<div class="chatContainer">
<div class="redirect">
        <a href="matches.php"><i class='bx bx-chat'>Go back</i></a>
    </div>
    <div class="chatBox">

        <?php 
            require 'Classes/User.php'; // Include the User.php file
            require 'Classes/Chat.php'; // Include the Chat.php file

            $email = $_SESSION['email']; // Retrieve the email from the session

            if (!isset($_SESSION['email'])) {
                $_SESSION['message'] = "Please log in first.";
                header("Location: loginForm.php"); // Redirect to the login form page
                exit;
            }

            $userId = $_SESSION['userId']; // Retrieve the userId from the session

            $user1 = new User(); // Create a new instance of the User class

            $matchedUserId = $_GET['matchedUserId']; // Retrieve the matchedUserId from the URL
            
            // Check if matchedUserId is null or empty
            if (empty($matchedUserId)) {
                echo 'Match not found';
                exit;
            }
            //add the matchedUserId to javascript for the update function
            echo '<script>';
            echo 'var matchedUserId = ' . json_encode($matchedUserId) . ';';
            echo '</script>';

            $matchedUser = $user1->matchedUser($matchedUserId); // Get the matched user's information
            
            if (!empty($matchedUser)) { // Check if the matched user exists
                $matchedUserName = $matchedUser[0]['name']; // Get the matched user's name
                $matchedUserSurName = $matchedUser[0]['surname']; // Get the matched user's surname
                echo '<a class="headerName" href="UserInfo.php?action=chat&matchedUserId=' . $matchedUserId . '">' . $matchedUserName . " ". $matchedUserSurName. '</a>'; // Output the matched user's name with a link

            } else {
                // Match not found
                echo 'User does not exist';
            }
        ?>

        <div class="chatForm">
            <div class="messageContent">
                
                <?php
                
                    $searchMatchId = $user1->searchMatchId($userId, $matchedUserId); // Search for the matchId based on userId and matchedUserId
                    if (!empty($searchMatchId)) { // Check if the matchId exists
                        $matchId = $searchMatchId[0]; // Get the matchId
                
                        $chat1 = new Chat($matchId, $userId, $matchedUserId, $matchedUserName); // Create a new instance of the Chat class
                        $chat1->readMessage($matchId, $userId, $matchedUserId, $matchedUserName); // Read the messages for the conversation
                    } else {
                        // Match not found
                        echo 'Match not found';
                    }
             
                ?>
                
            </div>

        </div>
        <a href="#bottom" class="bottomButton"><i class='bx bxs-chevrons-down'></i></a>

        <div class="sendMessage">
                    <form action="send_message.php" method="post" id="messageForm">
                        <input type="hidden" name="matchId" value="<?php echo $matchId; ?>">
                        <input type="hidden" name="senderId" value="<?php echo $userId; ?>">
                        <input type="hidden" name="receiverId" value="<?php echo $matchedUserId; ?>">
                        <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
                        <span id="charCount"></span>
                        <button type="submit">Send</button>
                    </form>
                </div>
    </div>
</div>

<div id="messagePHP">
    <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message']; // Display any session message
            unset($_SESSION['message']); // Remove the session message
        }
    ?>
</div>

<script>
    //cancel edit button
    function cancelEdit(chatId) {
        var messageText = document.getElementById('message-text-' + chatId);
        var currentText = document.getElementById('edit-input-' + chatId).value;
        
        messageText.innerHTML = currentText;
    }

    //edit message button
    function editMessage(chatId) {
        var messageText = document.getElementById('message-text-' + chatId);
        var currentText = messageText.innerHTML.trim();
        
        var inputField = document.createElement('input');
        inputField.type = 'text';
        inputField.value = currentText;
        inputField.id = 'edit-input-' + chatId;
        
        var submitButton = document.createElement('button');
        submitButton.type = 'button';
        submitButton.onclick = function() { submitUpdateMessage(chatId, matchedUserId); };
        submitButton.innerHTML = '<i class="bx bx-check">edit message</i>';

        var cancelButton = document.createElement('button');
        cancelButton.type = 'button';
        cancelButton.onclick = function() { cancelEdit(chatId); };
        cancelButton.innerHTML = "<i class='bx bx-x'></i>";
        cancelButton.classList.add('cancel-button');

        
        messageText.innerHTML = '';
        messageText.appendChild(inputField);
        messageText.appendChild(submitButton);
        messageText.appendChild(cancelButton);
    }

    //submit update message
    function submitUpdateMessage(chatId, matchedUserId) {

        var editedText = document.getElementById('edit-input-' + chatId).value.trim();
        
        // Create a hidden form dynamically
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = 'updateChat.php?matchedUserId=' + encodeURIComponent(matchedUserId);
        
        // Create hidden input fields for chatId and editedMessage
        var chatIdInput = document.createElement('input');
        chatIdInput.type = 'hidden';
        chatIdInput.name = 'chatId';
        chatIdInput.value = chatId;
        
        var editedMessageInput = document.createElement('input');
        editedMessageInput.type = 'hidden';
        editedMessageInput.name = 'editedMessage';
        editedMessageInput.value = editedText;
        
        // Append the input fields to the form
        form.appendChild(chatIdInput);
        form.appendChild(editedMessageInput);
        
        // Append the form to the document body and submit it
        document.body.appendChild(form);
        
        // Submit the form
        form.submit();
    }
    //automatic scroll to bottomw
    var chatForm = document.querySelector('.chatForm');
    chatForm.scrollTop = chatForm.scrollHeight;
    
</script>

<style>
    form {
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .bxs-trash, .bxs-edit-alt {
    color: rgb(222, 217, 217);
}

.bxs-trash:hover {
    color: red;
    font-size: x-large;
}
.bxs-edit-alt:hover {
    color: blue;
    font-size: large;

}
.bx-x {
    font-size: x-large;
    color: red;

}
.bx-x:hover {
    font-weight: bolder;
}
.bx-check:hover {
    color: green;
    font-weight: bold;
}
</style>

    
<?php 
// require 'includes/footer.php'?> 
<!-- Include the footer.php file -->
</body>
</html>
