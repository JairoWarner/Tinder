<?php
$servername = "localhost";
$dbname = "tinder";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "connectie gelukt";
} catch (PDOException $e) {
    echo "Connectie mislukt: " . $e->getMessage();
}
?>
