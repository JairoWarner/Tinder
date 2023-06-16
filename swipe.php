<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/main.css">
    <title>Swipe</title>
</head>
<body>
<?php require 'includes/header.php'?>

<!-- The main content section -->
<div class="content">
    <div class="swipe">

        <?php 
            // Require the User class file
            require 'Classes/User.php';

            // Retrieve the email from the session
            $email = $_SESSION['email'];

            // Check if the email is not set in the session
            if (!isset($_SESSION['email'])) {
                // Set a message in the session
                $_SESSION['message'] = "Please log in first.";
                // Redirect the user to the login form
                header("Location: loginForm.php");
                // Stop further script execution
                exit;
            }

            // Create a new User object
            $user1 = new User();

            // Get the user ID based on the email
            $user1->getUserIdSession($email);
            ?>
            <div class="swipeContent">
                <!-- Display a link to the liked.php page if the user ID is present in the session -->
                <?php
                if (isset($_SESSION['userId'])) {
                    // Get the user ID from the session
                    $userId = $_SESSION['userId'];
                    // Get a random user
                    $randomUser = $user1->fetchRandomUser($userId);
                    if (isset($randomUser['message'])) {
                        echo $randomUser['message'];
                    } else {
                        $randomUserId = $randomUser['userId'];
            
                        if ($randomUser) {
                            // Display user information
                            echo "<div class='randomUser'>";
                            echo "<h1>".$randomUser['naam']."</h1>";
                            echo "<p>".$randomUser['bio']."</p>";
                            echo "<p>".$randomUser['geslacht']."</p>";
                            echo "<p> Age: ".$randomUser['leeftijd']."</p>";
                            echo "<p> Proffesion: ".$randomUser['schoolBaan']."</p>";
                            echo "</div>";
                            // echo "<p>".$randomUserId."</p>";
            
                            // Display user count
                            if (isset($randomUser['userCount'])) {
                                echo "<p>Potential matches left: ".$randomUser['userCount']."</p>";
                            }
                        } else {
                            echo "No more users to display.";
                        }
                        ?>
                                 
                <!-- Display a message stored in the session -->
                <div id="messagePHP">
                    <?php
                    if (isset($_SESSION['message'])) {
                        // Output the message
                        echo $_SESSION['message'];
                        // Remove the message from the session
                        unset($_SESSION['message']);
                    }
                    ?>
                </div>
                <?php
                        echo '<div class="swipeButtons">';
                        
                        // Output the skip link
                        echo ' <div class="kruis">';
                        $skipLink = $_SERVER['PHP_SELF'];
            
                        echo '<a href="' . $skipLink . '"><button class="doerustig1" type="submit"><i class="bx bx-x"></i></button></a>';
                        echo '</div>';
                        // Create a link to the liked.php page with the user ID as a parameter
                        $link = "liked.php?userId=" . $userId . "&randomUserId=" . $randomUserId;
                        echo ' <div class="hart">';
                        echo '<a class="link" href=' . $link . '"><button class="doerustig2" type="submit"><i class="bx bx-heart"></i></button></a>';
                        echo '</div>';                 
                        echo '</div>';
                    }
                } else {
                    echo "User ID is not present in the session";
                }
                ?>
            

            <div class="redirect">
                <a href="matches.php"><i class='bx bx-chat'>Matches</i></a>
            </div>
        </div>
        </div>
    </div>




</div>

<?php require 'includes/footer.php'?>
</body>
</html>
