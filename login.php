<?php
require 'database/conn.php';
$email = $_POST['email'];
$password = $_POST['password'];


    // Set PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);

    // Execute statement
    $stmt->execute();

    // Fetch all rows
    $results = $stmt->fetch();

    if (!empty($results)) {
        $hashed_password = $results['password'];    
        if (password_verify($password, $hashed_password)) {

            $_SESSION['email'] = $email;
            header("Location: loggedIn.php");
        } else {
            $_SESSION['message'] = 'Invalid log in credentials. Please try again.';
            header("Location: loginForm.php");
        }
    } else {
        $_SESSION['message'] = "Account doesn't exist. Please try again.";
        header("Location: loginForm.php");
    };

?>