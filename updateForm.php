<?php



require "includes/header.php";
require "database/database.php";
require 'Classes/User.php';

// Retrieve the userId from the session
$userId = $_SESSION['userId'];
var_dump($userId);
$userObj = new User();
$user = $userObj->findUser($userId);

//if (!$user) {
//
//    echo "User not found.";
//    exit();
//
//}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form method="POST" action="UpdatePost.php">
    <input type="hidden" name="userId" value="<?php echo $user['userId']; ?>">

    <label>Naam:</label>
    <input type="text" name="naam" value="<?php echo $user['naam']; ?>"><br>

    <label>Achternaam:</label>
    <input type="text" name="achternaam" value="<?php echo $user['achternaam']; ?>"><br>

    <label>Geboortedatum:</label>
    <input type="text" name="geboorteDatum" value="<?php echo $user['geboorteDatum']; ?>"><br>

    <label>Geslacht:</label>
    <input type="text" name="geslacht" value="<?php echo $user['geslacht']; ?>"><br>

    <label>Locatie:</label>
    <input type="text" name="locatie" value="<?php echo $user['locatie']; ?>"><br>

    <label>Sexuele oriëntatie:</label>
    <input type="text" name="sexualOri" value="<?php echo $user['sexualOri']; ?>"><br>

    <label>School/Baan:</label>
    <input type="text" name="schoolBaan" value="<?php echo $user['schoolBaan']; ?>"><br>

    <label>Interesses:</label>
    <input type="text" name="interesses" value="<?php echo $user['interesses']; ?>"><br>

    <label>Foto's:</label>
    <input type="text" name="fotos" value="<?php echo $user['fotos']; ?>"><br>

    <label>Show me:</label>
    <input type="text" name="showMe" value="<?php echo $user['showMe']; ?>"><br>

    <label>Leeftijd:</label>
    <input type="text" name="leeftijd" value="<?php echo $user['leeftijd']; ?>"><br>

    <label>Leeftijdsbereik:</label>
    <input type="text" name="ageRange" value="<?php echo $user['ageRange']; ?>"><br>

    <label>Bio:</label>
    <input type="text" name="bio" value="<?php echo $user['bio']; ?>"><br>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>

    <label>Wachtwoord:</label>
    <input type="password" name="password" value="<?php echo $user['password']; ?>"><br>


    <div class="formEnd">
        <input type="submit" value="Submit">
        <p><a id="cancel" href="account.php">Cancel</a></p>
    </div>
</form>
</body>
</html>