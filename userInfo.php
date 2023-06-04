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
            // $email = $_SESSION['email']; // Retrieve the email from the session
            // $userId = $_SESSION['userId'];
            $user1 = new User();
            $matchedUserId = $_GET['matchedUserId'];

            $matchedUser = $user1->matchedUser($matchedUserId);
            if ($matchedUser !== null) {
                foreach ($matchedUser as $user) {
                    $matchedUserName = $user['name'];
                    $matchedUserEmail = $user['email'];
                    $matchedUserSurname = $user['surname'];
                    $matchedUserDateOfBirth = $user['dateOfBirth'];
                    $matchedUserGender = $user['gender'];
                    $matchedUserLocation = $user['location'];
                    $matchedUserSexualOrientation = $user['sexualOrientation'];
                    $matchedUserSchoolJob = $user['schoolJob'];
                    $matchedUserHobbies = $user['hobbies'];
                    $matchedUserPhotos = $user['photos'];
                    $matchedUserPreference = $user['preference'];
                    $matchedUserAge = $user['age'];
                    $matchedUserAgeRange = $user['ageRange'];
                    $matchedUserBio = $user['bio'];
                
                    // Display the data
                    echo "Name: $matchedUserName<br>";
                    echo "Email: $matchedUserEmail<br>";
                    echo "Surname: $matchedUserSurname<br>";
                    echo "Date of Birth: $matchedUserDateOfBirth<br>";
                    echo "Gender: $matchedUserGender<br>";
                    echo "Location: $matchedUserLocation<br>";
                    echo "Sexual Orientation: $matchedUserSexualOrientation<br>";
                    echo "School/Job: $matchedUserSchoolJob<br>";
                    echo "Hobbies: $matchedUserHobbies<br>";
                    echo "Photos: $matchedUserPhotos<br>";
                    echo "Preference: $matchedUserPreference<br>";
                    echo "Age: $matchedUserAge<br>";
                    echo "Age Range: $matchedUserAgeRange<br>";
                    echo "Bio: $matchedUserBio<br>";
                    echo "<br>";
                }
            }
            
        ?>

    </div>
    <div id="messagePHP"><?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>

    
<?php require 'includes/footer.php'?>
</body>
</html>