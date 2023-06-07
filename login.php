<?php
require 'database/conn.php'; // Include the conn.php file for database connection
$email = $_POST['email']; // Retrieve the email from the submitted form
$password = $_POST['password']; // Retrieve the password from the submitted form

// Prepare SQL statement
$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(':email', $email);

// Execute statement
$stmt->execute();

// Fetch the first row
$results = $stmt->fetch();

if (!empty($results)) { // Check if the result is not empty
    $hashed_password = $results['password']; // Retrieve the hashed password from the result

    if (password_verify($password, $hashed_password)) { // Verify the submitted password with the hashed password

        $_SESSION['email'] = $email; // Set the email in the session

        header("Location: loggedIn.php"); // Redirect to the loggedIn.php page
    } else {
        $_SESSION['message'] = 'Invalid log in credentials. Please try again.'; // Set an error message in the session
        header("Location: loginForm.php"); // Redirect to the loginForm.php page
    }
} else {
    $_SESSION['message'] = "Account doesn't exist. Please try again."; // Set an error message in the session
    header("Location: loginForm.php"); // Redirect to the loginForm.php page
}
?>
