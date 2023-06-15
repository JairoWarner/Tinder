<?php

class User
{
    public $userId;
    public $email;
    public $password;
    public $naam;
    public $achternaam;
    public $geboorteDatum;
    public $geslacht;
    public $locatie;
    public $sexualOri;
    public $schoolBaan;
    public $interesses;
    public $fotos;
    public $showMe;
    public $leeftijd;
    public $ageRange;
    public $bio;



// methoden - functies -------------------
// constructor
    public function __construct($userId = NULL, $naam = NULL, $achternaam = NULL, $geboorteDatum = NULL, $geslacht = NULL, $locatie = NULL, $sexualOri = NULL, $schoolBaan = NULL, $interesses = NULL, $fotos = NULL, $showMe = NULL, $leeftijd = NULL, $ageRange = NULL, $bio = NULL)
    {
        $this->userId = $userId;
        $this->naam = $naam;
        $this->achternaam = $achternaam;
        $this->geboorteDatum = $geboorteDatum;
        $this->geslacht = $geslacht;
        $this->locatie = $locatie;
        $this->sexualOri = $sexualOri;
        $this->schoolBaan = $schoolBaan;
        $this->interesses = $interesses;
        $this->fotos = $fotos;
        $this->showMe = $showMe;
        $this->leeftijd = $leeftijd;
        $this->ageRange = $ageRange;
        $this->bio = $bio;

    }

// getters
public function setUserId($userId)
{
    $this->userId = $userId;
}

public function getUserId()
{
    return $this->userId;
}

public function setNaam($naam)
{
    $this->naam = $naam;
}

public function getNaam()
{
    return $this->naam;
}

public function setAchternaam($achternaam)
{
    $this->achternaam = $achternaam;
}

public function getAchternaam()
{
    return $this->achternaam;
}

public function setGeboorteDatum($geboorteDatum)
{
    $this->geboorteDatum = $geboorteDatum;
}

public function getGeboorteDatum()
{
    return $this->geboorteDatum;
}

public function setGeslacht($geslacht)
{
    $this->geslacht = $geslacht;
}

public function getGeslacht()
{
    return $this->geslacht;
}

public function setLocatie($locatie)
{
    $this->locatie = $locatie;
}

public function getLocatie()
{
    return $this->locatie;
}

public function getBio()
{
    return $this->bio;
}

//setters

public function setSexualOri($sexualOri)
{
    $this->sexualOri = $sexualOri;
}

public function getSexualOri()
{
    return $this->sexualOri;
}

public function setSchool($school)
{
    $this->school = $school;
}

public function getSchool()
{
    return $this->school;
}

public function setInteresses($interesses)
{
    $this->interesses = $interesses;
}

public function getInteresses()
{
    return $this->interesses;
}

public function setFotos($fotos)
{
    $this->fotos = $fotos;
}

public function getFotos()
{
    return $this->fotos;
}

public function setShowMe($showMe)
{
    $this->showMe = $showMe;
}

public function getShowMe()
{
    return $this->showMe;
}

public function setLeeftijd($leeftijd)
{
    $this->leeftijd = $leeftijd;
}

public function getLeeftijd()
{
    return $this->leeftijd;
}

public function setAgeRange($ageRange)
{
    $this->ageRange = $ageRange;
}

public function getAgeRange()
{
    return $this->ageRange;
}
public function setBio($bio)
{
    $this->bio = $bio;
}
public function setEmail($email) {
    $this->email = $email;
}
public function getEmail() {
    return $this->email;
}



    public function afdrukken()
    {
        echo $this->get_userId();
        echo "<br/>";
        echo $this->get_naam();
        echo "<br/>";
        echo $this->get_achternaam();
        echo "<br/>";
        echo $this->get_gender();
        echo "<br/>";
        echo $this->get_locatie();
        echo "<br/>";
        echo $this->get_interesses();
        echo "<br/>";
        echo $this->get_leeftijd();
        echo "<br/>";
    }

    //create


    // Read User
    // This function reads user information from the database based on the provided email.
    public function readUser($email) {
        require_once 'database/database.php'; // Including the database configuration file

        $sql = $conn->prepare('SELECT * FROM users WHERE email = :email'); // Prepare a SQL statement to retrieve user information based on email
        $sql->bindParam(':email', $email); // Bind the email parameter to the prepared statement
        $sql->execute(); // Execute the prepared statement

        foreach ($sql as $user) { // Iterate through the result set
            echo '<div class="readList">'; // Output a div element with the class "readList"
            echo '<div class="buttons">'; // Output a div element with the class "buttons"
            echo '<a href="UpdateForm.php?action=update&userId=' . $user['userId'] . '" class="updateButton"><i class="bx bxs-edit-alt">Update</i></a>'; // Output an anchor element for updating the user with a specific user ID
            echo '<a href="userDelete.php?action=delete&userId=' . $user['userId'] . '" class="deleteButton" onclick="return confirm(\'Are you sure you want to delete your account?\')"><i class= "bx bxs-trash">Delete</i></a>'; // Output an anchor element for deleting the user with a specific user ID, with a confirmation dialog
            echo '</div>'; // Close the "buttons" div element
            
            // Output the content in two columns
            echo '<div class="columns">';
            
            echo '<div class="column">'; // Open the first column
            echo '<ul>'; // Output an unordered list element
            
            // Output individual list items with user information
            echo '<li><div class="label">UserID:</div><div class="value">' . $user['userId'] . '</div></li>';
            echo '<li><div class="label">Email:</div><div class="value">' . $user['email'] . '</div></li>';
            echo '<li><div class="label">Name:</div><div class="value">' . $user['naam'] . '</div></li>';
            echo '<li><div class="label">Surname:</div><div class="value">' . $user['achternaam'] . '</div></li>';
            echo '<li><div class="label">Date of Birth:</div><div class="value">' . $user['geboorteDatum'] . '</div></li>';
            echo '<li><div class="label">Gender:</div><div class="value">' . $user['geslacht'] . '</div></li>';
            echo '<li><div class="label">Location:</div><div class="value">' . $user['locatie'] . '</div></li>';
            echo '<li><div class="label">Sexual Orientation:</div><div class="value">' . $user['sexualOri'] . '</div></li>';

            echo '</ul>'; // Close the first list
            echo '</div>'; // Close the first column
            
            echo '<div class="column">'; // Open the second column
            echo '<ul>'; // Open the second list
            
            echo '<li><div class="label">School/Job:</div><div class="value">' . $user['schoolBaan'] . '</div></li>';
            echo '<li><div class="label">Hobbies:</div><div class="value">' . $user['interesses'] . '</div></li>';
            echo '<li><div class="label">Foto\'s:</div><div class="value">' . $user['fotos'] . '</div></li>';
            echo '<li><div class="label">Preference:</div><div class="value">' . $user['showMe'] . '</div></li>';
            echo '<li><div class="label">Age:</div><div class="value">' . $user['leeftijd'] . '</div></li>';
            echo '<li><div class="label">Age Range:</div><div class="value">' . $user['ageRange'] . '</div></li>';
            echo '<li><div class="label">Bio:</div><div class="value">' . $user['bio'] . '</div></li>';
            
            echo '</ul>'; // Close the second list
            echo '</div>'; // Close the second column
            
            echo '</div>'; // Close the "columns" div element
            
            echo '</div>'; // Close the "readList" div element
            echo '<br>'; // Output a line break
            
        }            
    }


// Update User
// Updates user information in the database
public function updateUser($userId, $naam, $achternaam, $geboorteDatum, $geslacht, $locatie, $sexualOri, $schoolBaan, $interesses, $fotos, $showMe, $leeftijd, $ageRange, $bio) {
    require 'database/conn.php';
    // Prepare the SQL statement
    $sql = $conn->prepare('UPDATE users SET naam = :naam, achternaam = :achternaam, geboorteDatum = :geboorteDatum, geslacht = :geslacht, locatie = :locatie, sexualOri = :sexualOri, schoolBaan = :schoolBaan, interesses = :interesses, fotos = :fotos, showMe = :showMe, leeftijd = :leeftijd, ageRange = :ageRange, bio = :bio WHERE userId = :userId');

    // Bind parameters with values
    $sql->bindParam(':userId', $userId);
    $sql->bindParam(':naam', $naam);
    $sql->bindParam(':achternaam', $achternaam);
    $sql->bindParam(':geboorteDatum', $geboorteDatum);
    $sql->bindParam(':geslacht', $geslacht);
    $sql->bindParam(':locatie', $locatie);
    $sql->bindParam(':sexualOri', $sexualOri);
    $sql->bindParam(':schoolBaan', $schoolBaan);
    $sql->bindParam(':interesses', $interesses);
    $sql->bindParam(':fotos', $fotos);
    $sql->bindParam(':showMe', $showMe);
    $sql->bindParam(':leeftijd', $leeftijd);
    $sql->bindParam(':ageRange', $ageRange);
    $sql->bindParam(':bio', $bio);

    // Execute the SQL statement
    $sql->execute();

    // Set a success message and redirect to account page
    $_SESSION['message'] = 'User ' . $naam . ' is bijgewerkt <br>';
    header("Location: account.php");
}

public function deleteMatch($matchedUserId) {
    require "database/database.php";
    //delete chats first for key constraint valiation
    // Delete chats with matching matchId from chats table
    $sql = $conn->prepare('DELETE FROM chats WHERE matchId = :matchedUserId');
    $sql->bindParam(":matchedUserId", $matchedUserId);
    $sql->execute();

    // Delete match from matches table
    $sql = $conn->prepare('DELETE FROM matches WHERE matchId = :matchedUserId');
    $sql->bindParam(":matchedUserId", $matchedUserId);
    $sql->execute();


}


// User Delete
// Deletes a user and associated records from the database
public function deleteUser($userId) {
    require 'database/database.php';
    
    // Prepare the SQL statements to delete records related to the user
    $sqlDeleteLikes = $conn->prepare('DELETE FROM likes WHERE liker_id = :userId OR liked_id = :userId');
    $sqlDeleteMatches = $conn->prepare('DELETE FROM matches WHERE user_id_1 = :userId OR user_id_2 = :userId');
    $sqlDeleteChats = $conn->prepare('DELETE FROM chats WHERE senderId = :userId OR receiverId = :userId');
    $sqlDeleteUser = $conn->prepare('DELETE FROM users WHERE userId = :userId');
    
    // Bind the parameter
    $sqlDeleteLikes->bindParam(':userId', $userId);
    $sqlDeleteMatches->bindParam(':userId', $userId);
    $sqlDeleteChats->bindParam(':userId', $userId);
    $sqlDeleteUser->bindParam(':userId', $userId);
    
    // Execute the delete statements
    $sqlDeleteLikes->execute();
    $sqlDeleteMatches->execute();
    $sqlDeleteChats->execute();
    $sqlDeleteUser->execute();
    
    // Log out the user by destroying the session
    session_start();
    session_unset();
    session_destroy();
    
    // Redirect to the login or registration page
    header("Location: registerForm.php");
    exit();
}

// Find User
// Fetches and returns user information based on userId
public function findUser($userId) {
    require 'database/database.php';
    $sql = $conn->prepare('SELECT * FROM users WHERE userId = :userId');
    $sql->bindParam(':userId', $userId);
    $sql->execute();
    $user = $sql->fetch();
    return $user;
}

// Fetch Users
// Fetches the userId of all users with the right gender for the logged-in user
// public function fetchRandomUser($userId) {
//     require 'database/database.php';

//     // Fetch the showMe and ageRange values of the logged-in user from the database
//     $stmt = $conn->prepare('SELECT showMe, ageRange FROM users WHERE userId = :userId');
//     $stmt->bindParam(':userId', $userId);
//     $stmt->execute();
//     $userData = $stmt->fetch(PDO::FETCH_ASSOC);
//     $showMe = $userData['showMe'];
//     $ageRange = $userData['ageRange'];



//     // Construct the SQL query dynamically based on the showMe and ageRange values
//     $sql = 'SELECT userId, naam, bio, geslacht, leeftijd
//             FROM users
//             WHERE userId != :userId ';

//     $params = [':userId' => $userId];

//     if ($showMe == 'both') {
//         // Show both genders
//         $sql .= 'AND geslacht IN ("Male", "Female")';
//     } elseif ($showMe == 'Male') {
//         // Show only male users
//         $sql .= 'AND geslacht = "Male"';
//     } elseif ($showMe == 'Female') {
//         // Show only female users
//         $sql .= 'AND geslacht = "Female"';
//     }

//     // Add the ageRange condition to the SQL query
//     if (!empty($ageRange)) {
//         list($minAge, $maxAge) = explode('-', $ageRange);
//         $sql .= ' AND leeftijd >= :minAge AND leeftijd <= :maxAge';
//         $params[':minAge'] = $minAge;
//         $params[':maxAge'] = $maxAge;
//     }

//     // Execute the final query with the constructed SQL and parameters
//     $stmt = $conn->prepare($sql);
//     $stmt->execute($params);
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     if (empty($users)) {
//         return null;
//     }

//     $randomIndex = array_rand($users);
//     return $users[$randomIndex];
// }
public function fetchRandomUser($userId) {
    require 'database/database.php';

    // Fetch the showMe and ageRange values of the logged-in user from the database
    $stmt = $conn->prepare('SELECT showMe, ageRange FROM users WHERE userId = :userId');
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $showMe = $userData['showMe'];
    $ageRange = $userData['ageRange'];

    // Construct the SQL query dynamically based on the showMe and ageRange values
    $sql = 'SELECT userId, naam, bio, geslacht, leeftijd
            FROM users
            WHERE userId != :userId ';

    $params = [':userId' => $userId, ':likerId' => $userId];

    if ($showMe == 'Both') {
        // Show both genders
        $sql .= 'AND geslacht IN ("Male", "Female")';
    } elseif ($showMe == 'Men') {
        // Show only male users
        $sql .= 'AND geslacht = "Male"';
    } elseif ($showMe == 'Women') {
        // Show only female users
        $sql .= 'AND geslacht = "Female"';
    }

    // Add the check for the logged-in user's liked users
    $sql .= ' AND userId NOT IN (
        SELECT liked_id
        FROM likes
        WHERE liker_id = :likerId
    )';

    // Add the ageRange condition to the SQL query
    if (!empty($ageRange)) {
        list($minAge, $maxAge) = explode('-', $ageRange);
        $sql .= ' AND leeftijd >= :minAge AND leeftijd <= :maxAge';
        $params[':minAge'] = $minAge;
        $params[':maxAge'] = $maxAge;
    }

    // Execute the final query with the constructed SQL and parameters
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $userCount = count($users); // Get the count of users

    if ($userCount === 0) {
        return ['message' => 'You have liked every potential match that aligns with your preferences.']; // Return a message when no users are found
    }

    $randomIndex = array_rand($users);
    $randomUser = $users[$randomIndex];
    $randomUser['userCount'] = $userCount; // Add the user count to the random user data

    return $randomUser;
}





// User Like
// Adds a like for the logged-in user and checks for a match
public function userLike($userId, $randomUserId) {
    require_once 'database/conn.php';
    $likedId = $randomUserId;

    // Check if the like already exists
    $checkSql = "SELECT * FROM likes WHERE liker_id = :userId AND liked_id = :likedId";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bindParam(':userId', $userId);
    $checkStmt->bindParam(':likedId', $likedId);
    $checkStmt->execute();

    // If the like doesn't exist, insert it
    if ($checkStmt->rowCount() === 0) {
        $insertSql = "INSERT INTO likes (liker_id, liked_id, like_status, timestamp)
                    VALUES (:userId, :likedId, 'liked', NOW())";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bindParam(':userId', $userId);
        $insertStmt->bindParam(':likedId', $likedId);

        // Execute the SQL statement
        if ($insertStmt->execute()) {
            // Check if the mutual like exists
            $mutualSql = "SELECT * FROM likes WHERE liker_id = :likedId AND liked_id = :userId";
            $mutualStmt = $conn->prepare($mutualSql);
            $mutualStmt->bindParam(':userId', $userId);
            $mutualStmt->bindParam(':likedId', $likedId);
            $mutualStmt->execute();

            // If it's a mutual like, insert into matches table
            if ($mutualStmt->rowCount() > 0) {
                // Check if the match already exists
                $matchExistsSql = "SELECT * FROM matches WHERE (user_id_1 = :userId AND user_id_2 = :likedId)
                                    OR (user_id_1 = :likedId AND user_id_2 = :userId)";
                $matchExistsStmt = $conn->prepare($matchExistsSql);
                $matchExistsStmt->bindParam(':userId', $userId);
                $matchExistsStmt->bindParam(':likedId', $likedId);
                $matchExistsStmt->execute();

                if ($matchExistsStmt->rowCount() === 0) {
                    $matchSql = "INSERT INTO matches (user_id_1, user_id_2, match_date)
                                 VALUES (:userId, :likedId, NOW())";
                    $matchStmt = $conn->prepare($matchSql);
                    $matchStmt->bindParam(':userId', $userId);
                    $matchStmt->bindParam(':likedId', $likedId);
                    $matchStmt->execute();

                    if ($matchStmt->rowCount() > 0) {
                        header("location:swipe.php");
                        $_SESSION['message'] = "It's a match! " . $likedId;
                        return;
                    } else {
                        echo "Error: Failed to insert into matches table.";
                        return;
                    }
                }
            }

            header("location:swipe.php");
            $_SESSION['message'] = "Liked " . $randomUserId;
        } else {
            echo "Error: " . $insertStmt->errorInfo()[2];
        }
    } else {
        header("location:swipe.php");
        $_SESSION['message'] = "You already liked this person";
    }
}

// Get User ID Session
// Retrieves the userId from the database based on the provided email and stores it in a session variable
public function getUserIdSession($email) {
    require_once 'database/database.php';
    $sql = $conn->prepare('SELECT userId FROM users WHERE email = :email');
    $sql->bindParam(':email', $email);
    $sql->execute();
    // Fetch the result of the query
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    // Access the userId from the result
    $userId = $result['userId'];

    // Store the userId in a session variable
    $_SESSION['userId'] = $userId;
    // Return the userId
    return $userId;
}

// Get Matches
// Retrieves the user IDs of matches for a given user
public function getMatches($userId) {
    require 'database/database.php';
    $sql = $conn->prepare("SELECT * FROM matches WHERE user_id_1 = :userId OR user_id_2 = :userId");
    $sql->bindParam(':userId', $userId);
    $sql->execute();

    $matches = $sql->fetchAll(PDO::FETCH_ASSOC);
    $matchedUsers = array();

    foreach ($matches as $match) {
        $matchedUserId = ($match['user_id_1'] == $userId) ? $match['user_id_2'] : $match['user_id_1'];
        $matchedUser = array(
            'matchId' => $match['matchId'],
            'userId' => $matchedUserId
        );
        $matchedUsers[] = $matchedUser;
    }

    return $matchedUsers;
}
// Matched User
// Retrieves information about other users using their ID
public function matchedUser($matchedUserId) {
    require 'database/database.php';
    $sql = $conn->prepare('SELECT * FROM users WHERE userId = :userId');
    $sql->bindParam(':userId', $matchedUserId);
    $sql->execute();

    $users = [];
    foreach ($sql as $user) {
        $userData = [];
        $userData['userId'] = $user['userId'];
        $userData['email'] = $user['email'];
        $userData['name'] = $user['naam'];
        $userData['surname'] = $user['achternaam'];
        $userData['dateOfBirth'] = $user['geboorteDatum'];
        $userData['gender'] = $user['geslacht'];
        $userData['location'] = $user['locatie'];
        $userData['sexualOrientation'] = $user['sexualOri'];
        $userData['schoolJob'] = $user['schoolBaan'];
        $userData['hobbies'] = $user['interesses'];
        $userData['photos'] = $user['fotos'];
        $userData['preference'] = $user['showMe'];
        $userData['age'] = $user['leeftijd'];
        $userData['ageRange'] = $user['ageRange'];
        $userData['bio'] = $user['bio'];

        $users[] = $userData;
    }

    return $users;
}

// Search Match ID
// Searches for the match ID between two users
public function searchMatchId($userId, $matchedUserId) {
    require 'database/database.php';
    $sql = $conn->prepare("SELECT matchId FROM matches WHERE (user_id_1 = :userId AND user_id_2 = :matchedUserId) OR (user_id_1 = :matchedUserId AND user_id_2 = :userId)");
    $sql->bindParam(':userId', $userId);
    $sql->bindParam(':matchedUserId', $matchedUserId);
    $sql->execute();
    $matchId = $sql->fetchAll(PDO::FETCH_COLUMN);
    return $matchId;
}

    

}

