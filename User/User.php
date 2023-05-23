<?php

class User
{
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
    public function readUser($email)
{
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

}