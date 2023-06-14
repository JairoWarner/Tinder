<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
	xmlns:th="http://www.thymeleaf.org">

<head>
	<title>Spring Security Tutorial</title>
	<link rel="stylesheet" type="text/css" th:href="@{/css/login.css}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<form th:action="@{/registration}" method="get">
		<button class="btn btn-md btn-warning btn-block" type="Submit">Go To Registration Page</button>
	</form>	
	
	<div class="container">
		<img th:src="@{/images/login.jpg}" class="img-responsive center-block" width="300" height="300" alt="Logo" />
		<form th:action="@{/login}" method="POST" class="form-signin">
			<h3 class="form-signin-heading" th:text="Welcome"></h3>
			<br/>
			 
			<input type="text" id="email" name="email"  th:placeholder="Email"
				class="form-control" /> <br/> 
			<input type="password"  th:placeholder="Password"
				id="password" name="password" class="form-control" /> <br /> 
				
			<div style="align='center' " th:if="${param.error}">
				<p style="font-size: 20; color: #FF1C19;">Email or Password invalid, please verify</p>
			</div>
			<button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit" th:text="Login"></button>
		</form>
	</div>
</body>
</html>

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

    if (substr($hashed_password, 0, 4) === 'HASH') {
        // Handle passwords hashed using SQL's HASH function
        $sql_hashed_password = "HASH('$password')"; // Use SQL's HASH function to hash the submitted password
        $sql = "SELECT 1 FROM users WHERE username = :username AND password = $sql_hashed_password";
        // Execute the SQL query and check if a matching record is found

        // Rest of your code for handling SQL hashed passwords
    } else {
        // Handle passwords hashed using PHP's password_hash function
        if (password_verify($password, $hashed_password)) {
            // Password verification using PHP's password_verify function
            // Rest of your code for handling PHP hashed passwords
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
