<?php 
include 'authentication.php'
 ?>
<html>
    <head>
        <title>CKS Glossary</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
        <link rel="stylesheet" type="text/css" href="css/indexe.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    </head>
    <body>

        <div class='left-section'>
            <div class="upper-left">
                <a href="/kapampangan-glossary/dashboard" class='home-link'>
                    <img src='assets/cks-logo.png' alt="CKS LOGO" class='header-logo'>
                        <h3 class='header-h3'>Center for <br> Kapampangan <br>Studies</h3>
                </a>
            </div>
            <div class="upper-mid">
                <nav>
                    <a href="/kapampangan-glossary/dashboard" class='nav-link active' id='odd'  style="color: #222222;"><span class="material-symbols-outlined">
                    space_dashboard
                    </span> Dashboard</a>
                    <!-- <div style="border-top: 1px solid white; width: 90%; margin: auto;"></div> -->
                    <a href="/kapampangan-glossary/collection" class='nav-link' id='even'><span class="material-symbols-outlined">
                    view_list
                    </span> Library</a>
                    <!-- <div style="border-top: 1px solid white; width: 90%; margin: auto;"></div> -->
                    <a href="/kapampangan-glossary/pending-posts" class='nav-link' id='odd'><span class="material-symbols-outlined">
                    pending_actions
                    </span> Pending Posts</a>
                    <!-- <div style="border-top: 1px solid white; width: 90%; margin: auto;"></div> -->
                    <a href="/kapampangan-glossary/admin-users" class='nav-link' id='odd'><span class="material-symbols-outlined">
                    admin_panel_settings
                    </span>Admin</a>


                </nav>
            </div>
            <div class="upper-bottom">
                <a href="logout.php" id="logout">Logout</a>
            </div>
        </div>
        <div class='right-section'>
            <h3>Overview</h3>
            <div style="border-top: 2px solid #333333; margin-bottom: 20px; margin-top: 30px; width: 100%;"></div>
            <div class="overview-container">
                <div class="container" style="background-image: linear-gradient(to right, #205375 , #0275d8); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg></h1>
                    <?php 
                                include 'connect.php';

                                $count_query = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `approved_posts`");
                                $row = mysqli_fetch_array($count_query);

                                $count_query32 = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `pending_posts`");
                                $row32 = mysqli_fetch_array($count_query32);
                                $approved_count = $row['count'];
                                $pending_count = $row32['count'];

                                $count = $approved_count + $pending_count;

                                

                    ?>
                    <div class="container-details">
                        <h2><?php echo $count?></h2>
                        <h4>Total Words</h4>
                    </div>
                </div>
                <?php 
                                          
                        $count_query2 = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `approved_posts`");
                        $row2 = mysqli_fetch_array($count_query2);
                        $count2 = $row2['count'];
                ?>
                <div class="container" style="background-image: linear-gradient(to right, #6ABAB6 , #ADEADC); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                    </svg></h1>
                    <div class="container-details">
                        <h2><?php echo $count2 ?></h2>
                        <h4>Total Approved Posts</h4>
                    </div>
                </div>
                <?php   
                        $count_query3 = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `pending_posts`");
                        $row3 = mysqli_fetch_array($count_query3);
                        $count3 = $row3['count'];
                ?>
                <div class="container" style="background-image: linear-gradient(to right, #DEBE5C , #FCDC95); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                    <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
                    </svg></h1>
                    <div class="container-details">
                        <h2><?php echo $count3 ?></h2>
                        <h4>Total Pending Posts</h4>
                    </div>
                </div>
                <?php 
                                          
                        $count_query4 = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `tbl_admin`");
                        $row4 = mysqli_fetch_array($count_query4);
                        $count4 = $row4['count'];
                ?>
                <div class="container" style="background-image: linear-gradient(to right, #31ACBA , #6BC3AA); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                     </svg></h1>
                    <div class="container-details">
                        <h2><?php echo $count4?></h2>
                        <h4>Total Admin Registered</h4>
                    </div>
                </div>
            </div>
            <div class="mid-overview-container">
                <div class='mid-left'>
                    <h2>Posts Overview</h2>
                    <br>
                    <?php 
                        // $total_pword_query = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `tbl_glossary` WHERE status = 'Pending'");
                        // $total_query = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `tbl_glossary`");
                        //  $total_aword_query = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `tbl_glossary` WHERE status = 'Approved'");
                        //  $total_arow= mysqli_fetch_array($total_aword_query);
                        //  $total_aw = $total_arow['count'];

                        //  $total_row= mysqli_fetch_array($total_query);
                        //  $total_w = $total_row['count'];

                        //  $total_pw = $total_w - $total_aw;

                        //  $aw_percentage = ($total_aw * 100) / $total_w;
                        //  $pw_percentage = 100 - $aw_percentage;
                        if($count > 0)
                        {
                            $aw_percentage = ($approved_count * 100) / $count;
                            $pw_percentage = 100 - $aw_percentage;
                        }

                       

                    ?>
                    <h5>Total Registered Words: <b><?php echo $count?></b></h5>
                    <div class="mid-left-upper">
                        <p>Approved Posts: <b><?php echo $approved_count?></b></p>
                        <p>Pending Posts: <b><?php echo $pending_count?></b></p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-sucess" role="progressbar" style="width: <?php echo $aw_percentage ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"><?php echo floor($aw_percentage)?>%</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $pw_percentage  ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"><?php echo floor($pw_percentage )?>%</div>
                    </div>
                    <hr>
                    <h5>Total Approved Posts: <b><?php echo $approved_count?></b></h5>
                    <?php 
                            $wo_query = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `approved_posts` WHERE kapampangan = ''");
                            $total_arow= mysqli_fetch_array($wo_query);
                            $wo_total= $total_arow['count'];

                            $wk_total = $approved_count - $wo_total;

                            if($approved_count > 0)
                            {
                                $wo_percentage = ($wo_total * 100) / $approved_count;
                                $wk_percentage = 100 - $wo_percentage;
                            }

                    ?>
                    <div class="mid-left-upper">
                        <p>Words with Kapampangan: <b><?php echo $wk_total?></b></p>
                        <p>Words without Kapampangan: <b><?php echo $wo_total?></b></p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-sucess" role="progressbar" style="width: <?php echo $wk_percentage?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"><?php echo floor($wk_percentage)?>%</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $wo_percentage?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"><?php echo floor($wo_percentage)?>%</div>
                    </div>
                    <hr>
                    <?php 
                            $pwo_query = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `pending_posts` WHERE kapampangan = ''");
                            $ptotal_arow= mysqli_fetch_array($pwo_query);
                            $wop_total= $ptotal_arow['count'];

                            $wkp_total = $pending_count - $wop_total;

                            if($pending_count > 0)
                            {
                                $wop_percentage = ($wop_total * 100) / $pending_count;
                                $wkp_percentage = 100 - $wop_percentage;
                            }
                            else{
                                $wop_percentage = 0;
                                $wkp_percentage = 0;
                            }

                    ?>
                    <h5>Total Pending Posts: <b><?php echo $pending_count?></b></h5>
                    <div class="mid-left-upper">
                        <p>Words with Kapampangan: <b><?php echo $wkp_total?></b></p>
                        <p>Words without Kapampangan: <b><?php echo $wop_total?></b></p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-sucess" role="progressbar" style="width: <?php echo $wkp_percentage?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"><?php echo floor($wkp_percentage)?>%</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $wop_percentage?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"><?php echo floor($wop_percentage)?>%</div>
                    </div>
                    <a href="/kapampangan-glossary/collection" class="link" style="margin-top: 15px;">View More <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg></a>
                </div>
                <div class='mid-right'>
                    <h2>Recently Received Posts</h2>
                    <br>
                    <div class="container-fluid" id='glossary-table'>
                    <?php 
                        include "connect.php";
                        $pending_query = mysqli_query($connection, "SELECT * FROM pending_posts ORDER BY id DESC limit 7");
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-data">
                            <thead >
                                <tr>
                                <th scope="col" hidden="hidden">#</th>
                                <th scope="col">Word</th>
                                <th scope="col">Kapampangan</th>
                                <th scope="col">Post Author</th>
                                </tr>
                            </thead>
                            <?php
                                if ($pending_query ) {    
                                    foreach($pending_query as $row){
                            ?>
                            <tbody>
                                <tr>
                                <td scope="row" hidden="hidden"><?php echo $row['id']; ?></td>
                                <td><?php echo $row['word']; ?></td>
                                <td><?php echo $row['kapampangan']; ?></td>
                                <td><?php echo $row['post_author']; ?></td>
                                </tr>
                            </tbody>
                            <?php }
                        }?>
                        </table>
                    </div>
                    <a href="/kapampangan-glossary/pending-posts" class="link">See Pending Posts <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg></a>
                </div>
                </div>
              
            </div>
        </div>
    </body>
</html>