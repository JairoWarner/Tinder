<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>UserInfo</title>
</head>
<body>
<?php require 'includes/header.php'?>
<div class="divRead">
    <div class="read">
        <?php 
            require 'Classes/User.php';
            // Create an instance of the User class
            $user1 = new User();

            // Get the matchedUserId from the query parameters
            $matchedUserId = $_GET['matchedUserId'];
            // Check if 'matchedUserId' parameter is not set in the $_GET array
            if (!isset($_GET['matchedUserId'])) {
                // Set the 'message' session variable to 'The user was not found'
                $_SESSION['message'] = 'The user was not found';
                
                // Redirect back to 'matches.php'
                header('Location: matches.php');
                
                // Stop further script execution
                exit();
            }

            // Retrieve information about the matched user
            $matchedUser = $user1->matchedUser($matchedUserId);

            // Check if a matched user exists
            if ($matchedUser !== null) {
                foreach ($matchedUser as $user) {
                    // Extract the matched user's information
                    $matchedUserName = $user['name'];
                    $matchedUserEmail = $user['email'];
                    $matchedUserSurname = $user['surname'];
                    $matchedUserDateOfBirth = $user['dateOfBirth'];
                    $matchedUserGender = $user['gender'];
                    $matchedUserLocation = $user['location'];
                    $matchedUserSexualOrientation = $user['sexualOrientation'];
                    $matchedUserSchoolJob = $user['schoolJob'];
                    $matchedUserHobbies = $user['hobbies'];
                    $matchedUserPreference = $user['preference'];
                    $matchedUserAge = $user['age'];
                    $matchedUserAgeRange = $user['ageRange'];
                    $matchedUserBio = $user['bio'];
                
                    // Display the matched user's data
                    echo '<div class="readList">'; // Output a div element with the class "readList"
                    // Output the content in two columns
                    echo '<div class="columns">';
                            
                    echo '<div class="column">'; // Open the first column
                    echo '<ul>'; // Output an unordered list element
                    // Output individual list items with user information
                    echo '<li><div class="label">Name:</div><div class="value">' . $matchedUserName . '</div></li>';
                    echo '<li><div class="label">Email:</div><div class="value">' . $matchedUserEmail . '</div></li>';
                    echo '<li><div class="label">Surname:</div><div class="value">' . $matchedUserSurname . '</div></li>';
                    echo '<li><div class="label">Date of Birth:</div><div class="value">' . $matchedUserDateOfBirth . '</div></li>';
                    echo '<li><div class="label">Gender:</div><div class="value">' . $matchedUserGender . '</div></li>';
                    echo '<li><div class="label">Location:</div><div class="value">' . $matchedUserLocation . '</div></li>';
                    echo '<li><div class="label">Sexual Orientation:</div><div class="value">' . $matchedUserSexualOrientation . '</div></li>';
                    echo '</ul>'; // Close the first list
                    echo '</div>'; // Close the first column
                    
                    echo '<div class="column">'; // Open the second column
                    echo '<ul>'; // Open the second list
                    echo '<li><div class="label">School/Job:</div><div class="value">' . $matchedUserSchoolJob . '</div></li>';
                    echo '<li><div class="label">Hobbies:</div><div class="value">' . $matchedUserHobbies . '</div></li>';
                    echo '<li><div class="label">Preference:</div><div class="value">' . $matchedUserPreference . '</div></li>';
                    echo '<li><div class="label">Age:</div><div class="value">' . $matchedUserAge . '</div></li>';
                    echo '<li><div class="label">Age Range:</div><div class="value">' . $matchedUserAgeRange . '</div></li>';
                    echo '<li><div class="label">Bio:</div><div class="value">' . $matchedUserBio . '</div></li>';
                    echo '</ul>';
                    
                    echo '</div>'; // Close the "readList" div element
                    echo '<br>'; // Output a line break
                    
                }
            }
        ?>

    </div>
    <div id="messagePHP">
        <?php
        // Check if a message is set in the session
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
    </div>
</div>
<?php require 'includes/footer.php'?>
</body>
</html>
