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
<?php require 'includes/header.php'?>
<div class="divRead">
    <p>Chat:</p>
    <div class="read">
        <?php 
            require 'Classes/User.php';
            require 'Classes/Chat.php';
            $email = $_SESSION['email']; // Retrieve the email from the session
            $userId = $_SESSION['userId'];
            $user1 = new User();
            $chat1 = new Chat();
            $chat1->readMessage();
            $matchedUserId = $_GET['matchedUserId'];

            // $matchedUserId = $user1->matchedUser($userId);
            // $matchedUser = $user1->matchedUser($matched);
            // $matchedUserId = $matchedUser[0]['userId'];
            // $matchedUserIds = $user1->getMatches($userId);
            $searchMatchId = $user1->searchMatchId($userId, $matchedUserId);
            $matchId = $searchMatchId[0];

            // $matchedUserId = $matchedUserIds;
            // $receiverId = $matchedUser[0]['userId'];
        ?>
        <!-- <div id="chatbox"></div>
        <input type="text" id="userInput" placeholder="Enter your message">
        <input type="button" value="Send" onclick="sendMessage()"> -->
        <!-- <form method="post" action="send_message.php" class="form">
            <input for="chatMessage" name="chatMessage" class="chat-input" required>
            <input type="submit" value="send" class="submitClass">
        </form> -->
        <form action="send_message.php" method="post">
        <input type="hidden" name="matchId" value="<?php echo $matchId; ?>">
            <input type="hidden" name="senderId" value="<?php echo $userId; ?>">
            <input type="hidden" name="receiverId" value="<?php echo $matchedUserId; ?>">
            <textarea name="message" placeholder="Enter your message"></textarea>
            <button type="submit">Send</button>
        </form>


    </div>
    <div id="messagePHP"><?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
<!-- <script>
            function loadMessages() {
            // Fetch chat messages from the database using AJAX
            $.ajax({
                url: 'fetch_messages.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Display the chat messages on the page
                    var chatContainer = $('#chat-container');
                    chatContainer.empty();

                    for (var i = 0; i < response.length; i++) {
                        var message = response[i];
                        var sender = message.senderId;
                        var messageText = message.message;
                        var timestamp = message.timestamp;

                        var messageDiv = $('<div class="message">');
                        var senderSpan = $('<span class="sender">').text('Sender: ' + sender);
                        var messageTextDiv = $('<div>').text(messageText);
                        var timestampSpan = $('<span class="timestamp">').text('Timestamp: ' + timestamp);

                        messageDiv.append(senderSpan, messageTextDiv, timestampSpan);
                        chatContainer.append(messageDiv);
                    }

                    // Scroll to the bottom of the chat container
                    chatContainer.scrollTop(chatContainer[0].scrollHeight);
                }
            });
        }

            // Function to send a chat message
            function sendMessage() {
            var messageInput = $('#message-input');
            var chatMessage = messageInput.val();

            // Send the chat message to the database using AJAX
            $.ajax({
                url: 'send_message.php',
                method: 'POST',
                data: { chatMessage: chatMessage },
                success: function() {
                    // Clear the input field and reload messages
                    messageInput.val('');
                    loadMessages();
                }
            });
        }

</script> -->
<style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .message {
            margin-bottom: 10px;
        }

        .sender {
            font-weight: bold;
        }

        .timestamp {
            color: #888;
            font-size: 12px;
        }

        .chat-input {
            display: flex;
        }

        .chat-input input[type="text"] {
            flex: 1;
            padding: 5px;
        }

        .chat-input input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        </style>

    
<?php require 'includes/footer.php'?>
</body>
</html>