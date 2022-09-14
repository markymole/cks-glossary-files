<?php 
include 'authentication.php'
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>CKS Glossary</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/dashboard.css" />
    </head>
    <script>

    </script>
    <body>
        <header>
            <a href="/kapampangan-glossary/dashboard" class='home-link'>  <div class="header-leftpart">
                <img src='assets/cks-logo.png' alt="CKS LOGO" class='header-logo'>
                <h3>Center for Kapampangan Studies</h3>
            </div></a>
            <div class="header-rightpart">
                <nav>
                    <a href="/kapampangan-glossary/dashboard" class='nav-link'>Dashboard</a>
                    <a href="/kapampangan-glossary/collection" class='nav-link'>Library</a>
                    <a href="/kapampangan-glossary/admin-users" class='nav-link'>Admin</a>
                    <a href="logout.php" class='nav-link' id="logout">Logout</a>
                </nav>
            </div>
        </header>
        <div class='dashboard-container'>
            <h1>Admin Panel Dashboard</h1>
            <div class="dashboard-overview">
                <h3>Overview</h3>
                <div class="overview">
                    <div class="overview-container">
                        <div class="overview-leftpart">
                            <h3>Total Words</h3>
                            <p>Lorem Ipsum Dolor Ipsum</p>
                        </div>
                        <div class="overview-rightpart">
                            <h1>6042</h1>
                        </div>
                    </div>

                    <div class="overview-container">
                        <div class="overview-leftpart">
                            <h3>Pending Word Entries</h3>
                            <p>English and Kapampangan Contribution</p>
                        </div>
                        <div class="overview-rightpart">
                            <h1>5</h1>
                        </div>
                    </div>

                    <div class="overview-container">
                        <div class="overview-leftpart">
                            <h3>Total Registered Admin</h3>
                            <p>Lorem Ipsum Dolor Ipsum</p>
                        </div>
                        <div class="overview-rightpart">
                            <h1>7</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="analytics-container">
                <h1>Analytics or other components</h1>
        </div>
    </body>
</html>