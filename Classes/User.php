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
    public function __construct($userId = NULL, $email = NULL, $password = NULL, $naam = NULL, $achternaam = NULL, $geboorteDatum = NULL, $geslacht = NULL, $locatie = NULL, $sexualOri = NULL, $schoolBaan = NULL, $interesses = NULL, $fotos = NULL, $showMe = NULL, $leeftijd = NULL, $ageRange = NULL, $bio = NULL)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
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


    //read
    // public function readUser($email)
    // {
    //     require_once 'database/database.php';
    //     $sql = $conn->prepare('SELECT * FROM users WHERE email = :email');
    //     $sql->execute();

    //     foreach($sql as $student) {
    //         echo '<br>';
    //         echo $student['studentId']. ' - ';
    //         echo $this->naam=$student['naam'].' - ';
    //         echo $this->opleiding=$student['opleiding'].' - ';
    //         echo $this->postcode=$student['postcode'].' - ';
    //         echo $this->telefoonnummer=$student['Telefoonnummer'].' - ';
    //         echo '<br>';


    //     }
    //     global $conn; // Use the $conn variable from database.php
    
    //     $query = "SELECT * FROM users WHERE email = :email";
    //     $statement = $conn->prepare($query);
    //     $email = $this->getEmail(); // Assign the value to a separate variable
    //     $statement->bindParam(':email', $email); // Pass the variable to bindParam
    //     $statement->execute();
    //     $rows = $statement->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows

    //     foreach ($rows as $row) {
    //         $this->setNaam($row['naam']);
    //         $this->setAchternaam($row['achternaam']);
    //         $this->setGeboorteDatum($row['geboorteDatum']);
    //         $this->setGeslacht($row['geslacht']);
    //         $this->setLocatie($row['locatie']);
    
    //         // Display the information here, or you can store it in an array or object for later use
    //         echo "Name: " . $this->getNaam() . "<br>";
    //         echo "Last Name: " . $this->getAchternaam() . "<br>";
    //         echo "Birth Date: " . $this->getGeboorteDatum() . "<br>";
    //         echo "Gender: " . $this->getGeslacht() . "<br>";
    //         echo "Location: " . $this->getLocatie() . "<br>";
    //         echo "<br>";
    //     }
    // }
    public function readUser($email) {
    require_once 'database/database.php';
    $sql = $conn->prepare('SELECT * FROM users WHERE email = :email');
    $sql->bindParam(':email', $email);
    $sql->execute();

        foreach ($sql as $user) {
            echo '<div class="readList">';
            echo '<div class="buttons">';
            echo '<a href="userDelete.php?action=delete&userId=' . $user['userId'] . '" class="deleteButton" onclick="return confirm(\'Are you sure you want to delete your account?\')">Delete</a>';
            echo '<a href="userUpdateForm.php?action=update&userId=' . $user['userId'] . '" class="updateButton">Update</a>';
            echo '</div>';
            echo '<ul>';
            echo '<li>UserID: ' . $user['userId'] . '</li>';
            echo '<li>Email: ' . $user['email'] . '</li>';
            echo '<li>Name: ' . $user['naam'] . '</li>';
            echo '<li>Surname: ' . $user['achternaam'] . '</li>';
            echo '<li>Date of Birth: ' . $user['geboorteDatum'] . '</li>';
            echo '<li>Gender: ' . $user['geslacht'] . '</li>';
            echo '<li>Location: ' . $user['locatie'] . '</li>';
            echo '<li>Sexual Orientation: ' . $user['sexualOri'] . '</li>';
            echo '<li>School/Job: ' . $user['schoolBaan'] . '</li>';
            echo '<li>Hobbies: ' . $user['interesses'] . '</li>';
            echo '<li>Foto\'s: ' . $user['fotos'] . '</li>';
            echo '<li>Preference: ' . $user['showMe'] . '</li>';
            echo '<li>Age: ' . $user['leeftijd'] . '</li>';
            echo '<li>Age Range: ' . $user['ageRange'] . '</li>';
            echo '<li>Bio: ' . $user['bio'] . '</li>';
            echo '</ul>';
            echo '</div>';
            echo '<br>';
        }
    }

    // sent logged in users id and the liked id to the database so a match can be made
    public function userLike($userId) {
        require_once 'database/conn.php';
        // $likedId = rand(1, 5);
        $likedId = 5;
    
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
                    $matchSql = "INSERT INTO matches (user_id_1, user_id_2, match_date)
                                 VALUES (:userId, :likedId, NOW())";
                    $matchStmt = $conn->prepare($matchSql);
                    $matchStmt->bindParam(':userId', $userId);
                    $matchStmt->bindParam(':likedId', $likedId);
                    $matchStmt->execute();

                    if ($matchStmt->execute()) {
                        header("location:swipe.php");
                        $_SESSION['message'] = "It's a match! " . $likedId;
                    } else {
                        echo "Error: Failed to insert into matches table.";
                    }
                }
    
                header("location:swipe.php");
                $_SESSION['message'] = "Liked " . $likedId;
            } else {
                echo "Error: " . $insertStmt->errorInfo()[2];
            }
        } else {
            header("location:swipe.php");
            $_SESSION['message'] = "User already liked this person";
       
        }
    }
    
    
    

    // get userId and put it in a session
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

    public function getMatches($userId) {
        require 'database/database.php';
        $sql = $conn->prepare("SELECT * FROM matches WHERE user_id_1 = :userId OR user_id_2 = :userId");
        $sql->bindParam(':userId', $userId);
        $sql->execute();
    
        $matches = $sql->fetchAll(PDO::FETCH_ASSOC);
        $matchedUserIds = array();
    
        foreach ($matches as $match) {
            $matchedUserId = ($match['user_id_1'] == $userId) ? $match['user_id_2'] : $match['user_id_1'];
            $matchedUserIds[] = $matchedUserId;
        }
    
        return $matchedUserIds;
    }


    // retrieve information about other users using their ID
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
            echo '<li><a href="chat.php?action=chat&userId=' . $user['userId'] . '" >Name: ' . $user['naam'];
            echo ' ' . $user['achternaam'] . '></li>';
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

    
    

}

