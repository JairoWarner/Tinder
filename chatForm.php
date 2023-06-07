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

        $matchedUser = $user1->matchedUser($matchedUserId); // Get the matched user's information
        
        if ($matchedUser !== null) { // Check if the matched user exists
            $matchedUserName = $matchedUser[0]['name']; // Get the matched user's name

            echo '<div class="headerName"><a href="UserInfo.php?action=chat&matchedUserId=' . $matchedUserId . '">' . $matchedUserName . '</a></div>'; // Output the matched user's name with a link
        }
    ?>

    <div class="chatForm">
        <div class="messageContent">
            <?php
                $searchMatchId = $user1->searchMatchId($userId, $matchedUserId); // Search for the matchId based on userId and matchedUserId
                $matchId = $searchMatchId[0]; // Get the matchId

                $chat1 = new Chat($matchId, $userId, $matchedUserId, $matchedUserName); // Create a new instance of the Chat class
                $chat1->readMessage($matchId, $userId, $matchedUserId, $matchedUserName); // Read the messages for the conversation
            ?>
            
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
    const messageInput = document.getElementById('message');
    const charCount = document.getElementById('charCount');
    const messageForm = document.getElementById('messageForm');

    messageInput.addEventListener('input', function () {
        const messageLength = messageInput.value.length;
        charCount.innerText = `${messageLength}/2000`;

        if (messageLength > 2000) {
            charCount.style.color = 'red';
            messageForm.onsubmit = function(event) {
                event.preventDefault();
            };
        } else {
            charCount.style.color = 'black';
            messageForm.onsubmit = null;
        }
    });

    var chatForm = document.querySelector('.chatForm');
    chatForm.scrollTop = chatForm.scrollHeight;
</script>

<style>
    form {
        display: flex;
        flex-direction: row;
        width: 100%;
    }
</style>

    
<?php require 'includes/footer.php'?> <!-- Include the footer.php file -->
</body>
</html>
