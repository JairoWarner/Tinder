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
<div class="chatContainer">

        <?php 
            require 'Classes/User.php';
            require 'Classes/Chat.php';
            $email = $_SESSION['email']; // Retrieve the email from the session
            $userId = $_SESSION['userId'];
            $user1 = new User();
            $matchedUserId = $_GET['matchedUserId'];

            $matchedUser = $user1->matchedUser($matchedUserId);
            if ($matchedUser !== null) {
                $matchedUserName = $matchedUser[0]['name'];
                echo '<div class="headerName"><a href="UserInfo.php?action=chat&matchedUserId=' . $matchedUserId . '">' . $matchedUserName . '</a></div>';
            }
            ?>
    <div class="chatForm">

            <?php
            

            $searchMatchId = $user1->searchMatchId($userId, $matchedUserId);
            $matchId = $searchMatchId[0];

            $chat1 = new Chat($matchId, $userId, $matchedUserId, $matchedUserName);
            $chat1->readMessage($matchId, $userId, $matchedUserId, $matchedUserName);

        ?>
        <div class="sendMessage">
            <form action="send_message.php" method="post">
            <input type="hidden" name="matchId" value="<?php echo $matchId; ?>">
                <input type="hidden" name="senderId" value="<?php echo $userId; ?>">
                <input type="hidden" name="receiverId" value="<?php echo $matchedUserId; ?>">
                <textarea name="message" placeholder="Enter your message" required></textarea>
                <button type="submit">Send</button>
            </form>
        </div>


    </div>
        </div>
    <div id="messagePHP"><?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
    <script>
        var chatForm = document.querySelector('.chatForm');
chatForm.scrollTop = chatForm.scrollHeight;

        </script>
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
    form{
        display: flex;
        flex-direction: row;
        width: 100%;
    }
        </style>

    
<?php require 'includes/footer.php'?>
</body>
</html>