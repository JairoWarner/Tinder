<header>
    <?php require 'database/conn.php'; ?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <nav>
        <div class="left">
            <div class="img_container">
                <img href="index.php" src="includes/Tinder-Logo.png" alt="Tinder Logo" style="width: 100px; ">
            </div>
        </div>
        <div class="text_logo"><p></p></div>
        <div class="accountDiv">
            <?php if(isset($_SESSION['email'])): ?>
                <!-- If the 'email' key is set in the session, display username and account-related links -->
                <div class="username"><?php echo $_SESSION['email']; ?></div>
                <li><a href="account.php">Account</a></li>
                <li><a id="logoutBtn" href="includes/logout.php"><i class='bx bx-log-out'></i>Logout</a></li>
            <?php else: ?>
                <!-- If the 'email' key is not set, display login and register links -->
                <li><a href="loginForm.php">Login</a></li>
                <li><a href="registerForm.php">Register</a></li>
                <p id="logoutBtn"></p>
            <?php endif; ?>
        </div>
    </nav>
</header>
