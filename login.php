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

if (!empty($results)) {
    $hashed_password = $results['password'];

    if (substr($hashed_password, 0, 1) === '*') {
        // Handle passwords hashed using SQL's PASSWORD function
        $sql_hashed_password = "PASSWORD('$password')"; // Use SQL's PASSWORD function to hash the submitted password
        $sql = "SELECT 1 FROM users WHERE email = :email AND password = $sql_hashed_password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);

        // Execute the SQL query and check if a matching record is found
        $stmt->execute();
        $match = $stmt->fetch();

        if ($match) {
            // Password verification using SQL's PASSWORD function
            $_SESSION['email'] = $email; // Set the email in the session
            header("Location: loggedIn.php"); // Redirect to the loggedIn.php page
        } else {
            // Password verification failed
            $_SESSION['message'] = 'Invalid log in credentials. Please try again.'; // Set an error message in the session
            header("Location: loginForm.php"); // Redirect to the loginForm.php page
        }
    } else {
        // Handle passwords hashed using PHP's password_hash function
        if (password_verify($password, $hashed_password)) {
            // Password verification using PHP's password_verify function
            $_SESSION['email'] = $email; // Set the email in the session
            header("Location: loggedIn.php"); // Redirect to the loggedIn.php page
        } else {
            // Password verification failed
            $_SESSION['message'] = 'Invalid log in credentials. Please try again.'; // Set an error message in the session
            header("Location: loginForm.php"); // Redirect to the loginForm.php page
        }
    }
} else {
    // User not found
    $_SESSION['message'] = "Account doesn't exist. Please try again."; // Set an error message in the session
    header("Location: loginForm.php"); // Redirect to the loginForm.php page
}
?>
