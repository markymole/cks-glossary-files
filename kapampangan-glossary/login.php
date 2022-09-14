<?php
    include 'checksession.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CKS Glossary Admin Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    </head>
    <body>
    <?php 
        include 'connect.php';

        $result = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `tbl_admin`");
        $row = mysqli_fetch_array($result);
        $count = $row['count'];
        if($count == 0)
        {
            $default_admin_username = 'admin';
            $default_admin_password = 'admin';
            $query = "INSERT INTO tbl_admin(username, password) VALUES('$default_admin_username', '".md5($default_admin_password)."')";
            $res = mysqli_query($connection, $query);
        }
    ?>
        <div class='header-container'>
            <div class='header-toppart'>
                <img src="assets/cks-logo.png" alt="CKS LOGO" class='header-logo'>
                <h3>Center for Kapampangan Studies</h3>
                <p>(Kapampangan Glossary)</p>
            </div>
            <form action="loginverification.php" method="post" class="forma">
            <div class='header-form'>
                <p>Sign In to Admin Panel</p>
                <b>Username</b>
                <div class='input'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <input type="text" name="username" placeholder="Username" class="inpu">
                </div>
                <b>Password</b>
                <div class='input'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    <input type="password" name="password" placeholder="Password" class="inpu">
                </div>
                <input type="submit" name="submit" value="Login" class="button-submit">
            </div>
            </form>

        </div>
    </body>
</html>


<!-- colors:

Maroon: #710E1D
Green: #4A503D
Green: #8E9775 -->