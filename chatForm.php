<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <title>Chat</title>
</head>
<body>
<?php require 'includes/header.php'?>
<div class="divRead">
    <p>Chat:</p>
    <div class="read">
        <?php 
            require 'User/User.php';
            $email = $_SESSION['email']; // Retrieve the email from the session

            $user1 = new User();
            $user1->readUser($email);
        ?>
        <div id="chatbox"></div>
        <input type="text" id="userInput" placeholder="Enter your message">
        <input type="button" value="Send" onclick="sendMessage()">
    </div>
    <div id="messagePHP"><?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
<script>
//     function sendMessage() {
//         var message = document.getElementById("userInput").value;
//         var xhttp = new XMLHttpRequest();
//         xhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 // Code to update chat conversation with the response
//             }
//         };
//         xhttp.open("GET", "chat.php?message=" + message, true);
//         xhttp.send();

//     }

//     xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//         var response = this.responseText;
//         var chatbox = document.getElementById("chatbox");
//         chatbox.innerHTML += "<p>" + response + "</p>";
//         // Clear the user input field
//         document.getElementById("userInput").value = "";
//     }
// };

</script>

    
<?php require 'includes/footer.php'?>
</body>
</html>