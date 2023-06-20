<?php

// Require the header.php file
require "includes/header.php";

// Require the database.php file
require "database/database.php";

// Require the User class file
require 'Classes/User.php';

// Retrieve the userId from the session
$userId = $_SESSION['userId'];

// Create a new User object
$userObj = new User();

// Find the user by userId
$user = $userObj->findUser($userId);
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
    <div class="content">
        <div class="accountPage">     
            <div class="tinderCard">
                <div class="accountItems">
                    <h1>Update</h1>
                    <form method="POST" action="UpdatePost.php">
                        <!-- Hidden input field to store the userId -->
                        <input type="hidden" name="userId" value="<?php echo $user['userId']; ?>">

                        <!-- Input fields for various user details -->
                        <label>Email: <?php echo $user['email']; ?></label><br>

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

                        <label for="showMe">Show Me:</label>
                        <select name="showMe" id="showMe" required>
                            <option value="Both" <?php if ($user['showMe'] === 'Both') echo 'selected'; ?>>Both</option>
                            <option value="Men" <?php if ($user['showMe'] === 'Men') echo 'selected'; ?>>Men</option>
                            <option value="Women" <?php if ($user['showMe'] === 'Women') echo 'selected'; ?>>Women</option>
                        </select><br><br>

                        <label for="leeftijd">Leeftijd:</label>
                        <input type="number" name="leeftijd" id="leeftijd" required value="<?php echo $user['leeftijd']; ?>"><br><br>

                        <label for="ageRange">Age Range:</label>
                        <div id="ageSlider">
                            <input type="range" id="minAge" min="18" max="100" value="18" oninput="updateAgeRange()" />
                            <input type="range" id="maxAge" min="18" max="100" value="100" oninput="updateAgeRange()" />

                            <div id="ageRangeLabel"></div>
                            <input type="hidden" id="ageRange" name="ageRange" value="" />
                        </div>

                        <label for="bio">Bio:</label>
                        <textarea name="bio" id="bio" required><?php echo $user['bio']; ?></textarea><br><br>

                        <div class="formEnd">
                            <input type="submit" value="Submit">
                            <p><a id="cancel" href="account.php">Cancel</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateAgeRange() {
    var minAge = document.getElementById("minAge").value;
    var maxAge = document.getElementById("maxAge").value;
    var ageRangeLabel = document.getElementById("ageRangeLabel");
    ageRangeLabel.textContent = minAge + " - " + maxAge;
    document.getElementById("ageRange").value = minAge + "-" + maxAge;
}
    </script>
</body>
</html>