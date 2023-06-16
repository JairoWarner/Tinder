<?php
require 'database/conn.php';

// Check if the user is trying to register a new account
if (isset($_POST['register'])) {
    // Get the submitted form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $naam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];
    $geboorteDatum = $_POST['geboorteDatum'];
    $geslacht = $_POST['geslacht'];
    // $locatie = $_POST['locatie'];
    $sexualOri = $_POST['sexualOri'];
    $schoolBaan = $_POST['schoolBaan'];
    // $interesses = $_POST['interesses'];
    $showMe = $_POST['showMe'];
    $leeftijd = $_POST['leeftijd'];
    $ageRange = $_POST['ageRange'];
    $bio = $_POST['bio'];

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

    // Check for inappropriate words in the email
    $inappropriate_words = array("fuck, shit, bitch");
    foreach ($inappropriate_words as $word) {
        if (strpos($email, $word) !== false) {
            echo "Sorry, inappropriate word found in the email.";
        }
    }

    // If all validation checks pass, insert the new user into the database
    if ($check_email->rowCount() == 0 && $password == $confirm_password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $conn->prepare("INSERT INTO users (email, password, naam, achternaam, geboorteDatum, geslacht, sexualOri, schoolBaan, showMe, leeftijd, ageRange, bio) VALUES (:email, :password, :naam, :achternaam, :geboorteDatum, :geslacht, :sexualOri, :schoolBaan, :showMe, :leeftijd, :ageRange, :bio)");
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':naam', $naam);
        $query->bindParam(':achternaam', $achternaam);
        $query->bindParam(':geboorteDatum', $geboorteDatum);
        $query->bindParam(':geslacht', $geslacht);
        // $query->bindParam(':locatie', $locatie);
        $query->bindParam(':sexualOri', $sexualOri);
        $query->bindParam(':schoolBaan', $schoolBaan);
        // $query->bindParam(':interesses', $interesses);
        $query->bindParam(':showMe', $showMe);
        $query->bindParam(':leeftijd', $leeftijd);
        $query->bindParam(':ageRange', $ageRange);
        $query->bindParam(':bio', $bio);
        $query->execute();

        // Get the newly created user's ID
        $user_id = $conn->lastInsertId();

        // // Upload the image file and insert the filename into the images table
        // if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        //     $filename = $_FILES['image']['name'];
        //     $filedata = file_get_contents($_FILES['image']['tmp_name']);

        //     $stmt = $conn->prepare("INSERT INTO images (id, filename, filedata) VALUES (?, ?, ?)");
        //     $stmt->bindParam(1, $user_id);
        //     $stmt->bindParam(2, $filename);
        //     $stmt->bindParam(3, $filedata, PDO::PARAM_LOB);
        //     $stmt->execute();
        // }

        if ($query->rowCount() > 0) {
            $_SESSION['message'] = 'Account created successfully!';
            header("Location: loginForm.php");
        } else {
            $_SESSION['message'] = 'An error occurred while creating your account.';
            header("Location: loginForm.php");
        }
    }
} else {
    echo 'error';
}
?>
