<?php


$servername = "localhost";
$dbname = "Tinder";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "connectie gelukt";
} catch (PDOException $e) {
    echo "Connectie mislukt: " . $e->getMessage();
}
try {
    $con = mysqli_connect($servername, $username, $password, $dbname);
//w    echo "connectie gelukt";

} catch (PDOException $e) {
    echo "Connectie mislukt: " . $e->getMessage();
}
