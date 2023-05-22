<?php
require 'database/conn.php';
// Check if the user is trying to register a new account
if (isset($_POST['register'])) {

    // Get the submitted form data
    // $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $naam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];
    $geboorteDatum = $_POST['geboorteDatum'];
    $geslacht = $_POST['geslacht'];
    $locatie = $_POST['locatie'];
    $sexualOri = $_POST['sexualOri'];
    $schoolBaan = $_POST['schoolBaan'];
    $interesses = $_POST['interesses'];
    $fotos = $_POST['fotos'];
    $showMe = $_POST['showMe'];
    $leeftijd = $_POST['leeftijd'];
    $ageRange = $_POST['ageRange'];
    $bio = $_POST['bio'];


    // Check if the username is already taken
    // $check_username = $conn->prepare("SELECT * FROM users WHERE username=:username");
    // $check_username->bindParam(':username', $username);
    // $check_username->execute();
    // if ($check_username->rowCount() > 0) {
    //     $_SESSION['message'] = "Sorry, that username is already taken.";
    //     header("Location: registerForm.php");
    // }

    // Check if the email is already in use
    $check_email = $conn->prepare("SELECT * FROM users WHERE email=:email");
    $check_email->bindParam(':email', $email);
    $check_email->execute();
    if ($check_email->rowCount() > 0) {
        $_SESSION['message'] = 'Sorry, that email is already in use.';
        header("Location: registerForm.php");
    }

    // Check if the password and confirm password fields match
    if ($password != $confirm_password) {
        echo "Sorry, the passwords do not match.";
    }

    // check if there is any inapropriate word in the username or the email
    $inapropriate_words = array("fuck", "hell","crap", "damn", "ass", "hoe", "whore", "kanker", "kut", "tering" , "shite", "nigger", "nigga" ,"shit", "bitch");
    foreach($inapropriate_words as $word){
        if (strpos($email, $word) !== false || strpos($email, $word) !== false) {
            echo "Sorry, inapropriate word found.";
            
        }
    }

    // If all validation checks pass, insert the new user into the database
    if ($check_email->rowCount() == 0 && $password == $confirm_password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $conn->prepare("INSERT INTO users (email, password, naam, achternaam, geboorteDatum, geslacht, locatie, sexualOri, schoolBaan, interesses, fotos, showMe, leeftijd, ageRange, bio) VALUES (:email, :password, :naam, :achternaam, :geboorteDatum, :geslacht, :locatie, :sexualOri, :schoolBaan, :interesses, :fotos, :showMe, :leeftijd, :ageRange, :bio)");
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':naam', $naam);
        $query->bindParam(':achternaam', $achternaam);
        $query->bindParam(':geboorteDatum', $geboorteDatum);
        $query->bindParam(':geslacht', $geslacht);
        $query->bindParam(':locatie', $locatie);
        $query->bindParam(':sexualOri', $sexualOri);
        $query->bindParam(':schoolBaan', $schoolBaan);
        $query->bindParam(':interesses', $interesses);
        $query->bindParam(':fotos', $fotos);
        $query->bindParam(':showMe', $showMe);
        $query->bindParam(':leeftijd', $leeftijd);
        $query->bindParam(':ageRange', $ageRange);
        $query->bindParam(':bio', $bio);
        $query->execute();
    
        if ($query->rowCount() > 0) {
            $_SESSION['message'] = 'Account created successfully!';

            header("Location: loginForm.php");
        } else {
            $_SESSION['message'] = 'An error occurred while creating your account.';

            header("Location: loginForm.php");
        }
    }
} else {echo 'error';}


?>
