<?php
// Include the User.php file, which contains the User class
require 'Classes/User.php';

// Check if the form has been submitted via the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the values from the form data
    $userId = $_POST['userId'];
    $naam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];
    $geboorteDatum = $_POST['geboorteDatum'];
    $geslacht = $_POST['geslacht'];
    $locatie = $_POST['locatie'];
    $sexualOri = $_POST['sexualOri'];
    $schoolBaan = $_POST['schoolBaan'];
    $interesses = $_POST['interesses'];
    // $fotos = $_POST['fotos'];
    $showMe = $_POST['showMe'];
    $leeftijd = $_POST['leeftijd'];
    $ageRange = $_POST['ageRange'];
    $bio = $_POST['bio'];

    // Create a new instance of the User class
    $user = new User();

    // Call the updateuser method on the $user object, passing in the form data as arguments
    $user->updateuser(
        $userId,
        $naam,
        $achternaam,
        $geboorteDatum,
        $geslacht,
        $locatie,
        $sexualOri,
        $schoolBaan,
        $interesses,
        // $fotos,
        $showMe,
        $leeftijd,
        $ageRange,
        $bio,
    );
}