<header>
<?php require 'database/conn.php'; ?>

    <nav>
        <div class="left">
            <div class="img_container">
                <img href="index.php" src="includes/Tinder-Logo.png" alt="Tinder Logo" style="width: 100px; ">
            </div>



        </div>

        <!-- <div class="dropdown">
            <button class="dropbtn">Klant
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../Klant/create_klant_form.php">Create Klant</a>
                <a href="#">Read Klant</a>
                <a href="#">Search klant</a>
            </div>
        </div> -->

        <div class="text_logo"><p></p></div>
        <div class="accountDiv">
        <?php if(isset($_SESSION['email'])): ?>
            <div class="username"><?php echo $_SESSION['email']; ?></div>
                <li><a href="account.php">Account</a></li>
                <li><a id="logoutBtn" href="includes/logout.php"><i class='bx bx-log-out'></i>Logout</a></li>
                       <?php else: ?>                <li><a href="loginForm.php">Login</a></li>
                <li><a href="registerForm.php">Register</a></li>
                <p id="logoutBtn"></p>
            <?php endif; ?>
            </div>


    </nav>

    <style>
        /* .accountDiv {
             margin: 5px;
            padding: 10px;
            text-decoration: none;

        } */
        /* .accountDiv li {
            margin: 5px;
            padding: 10px;

        }
        .accountDiv a {
            margin: 5px;
            text-decoration: none;
        }
        li {
            text-decoration: none;
            font-size: 16px;
        } */
        
        /* #logoutBtn {
            background: none;
            display: flex;
            margin: 0;
            padding: 0;
            margin-left: 10px;

            flex-direction: column;
            justify-content: space-around;
            justify-items: center;
        } */
        #logoutBtn i {
            /* margin: 10px; */
            /* font-size: 30px; */
            /* margin-left:5px; */
            /* justify-items: center; */
        }

        /* .accountDiv li:hover {
            transition: .5s;
            background: rgba(255, 255, 255, .1);
            border-radius: 5px;
        } */
    </style>
</header>