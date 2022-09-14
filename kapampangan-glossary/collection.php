<?php 
include 'authentication.php'
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CKS Glossary</title>
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/collectione.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <script>
       $(document).ready(function(){
            $('.update-btn').on('click', function(){
                $('#updateModal').modal('show');

                    $tr = $(this).closest('tr');
                    
                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#update_id').val(data[0]);
                    $('#update_eword').val(data[1]);
                    $('#update_kword').val(data[2]);
                    $('#update_author').val(data[3]);
                    $('#update_email').val(data[4]);
            });

            $('.delete-btn').on('click', function(){
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');
                    
                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#delete_id').val(data[0]);
                    $('#delete_eword').val(data[1]);
                    $('#delete_kword').val(data[2]);
                    $('#delete_author').val(data[3]);
            });

            $("#search-bar").keyup(function(){
                var search = $(this).val();
                $.ajax({
                    url: 'search.php',
                    method: 'post',
                    data:{query:search},

                    success:function(response){
                        $("#table-data").html(response);
                    }
                });
            });

            $('#e-input input').on('keyup', function() {
                let empty = false;

                $('#e-input input').each(function() {
                empty = $(this).val().length == 0;
                });

                if (empty)
                $('#new-btn').attr('disabled', 'disabled');
                else
                $('#new-btn').attr('disabled', false);
            });
       });
    </script>
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
                    <a href="/kapampangan-glossary/dashboard" class='nav-link' id='odd'><span class="material-symbols-outlined">
                    space_dashboard
                    </span> Dashboard</a>
                    <!-- <div style="border-top: 1px solid white; width: 90%; margin: auto;"></div> -->
                    <a href="/kapampangan-glossary/collection" class='nav-link active' id='even' style="color: #222222;"><span class="material-symbols-outlined">
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
            <div class="top-part">
                <h3>Glossary Table</h3>
                <Button type='button' class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="display: flex; align-items: center;">  Add New Record<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></Button>
            </div>
            <div style="border-top: 2px solid #333333; margin-bottom: 20px; margin-top: 20px; width: 100%;"></div>
            <div class="overview-container">
                <div class="container" style="background-image: linear-gradient(to right, #205375 , #0275d8); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">
                    <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
                    </svg></h1>
                    <?php 
                                          
                            $count_query3 = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `approved_posts`");
                            $row3 = mysqli_fetch_array($count_query3);
                            $count3 = $row3['count'];
                    ?>
                    <?php 
                            
                            $count_query4 = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `pending_posts`");
                            $row4 = mysqli_fetch_array($count_query4);
                            $count4 = $row4['count'];
                    ?>
                    <?php 
                                include 'connect.php';

                                // $count_query = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `tbl_glossary`");
                                // $row = mysqli_fetch_array($count_query);
                                $count = $count3 + $count4;

                    ?>
                    <div class="container-details">
                        <h2><?php echo $count?></h2>
                        <h4>Total Words</h4>
                    </div>
                </div>

                <div class="container" style="background-image: linear-gradient(to right, #6ABAB6 , #ADEADC); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                    </svg></h1>
                    <div class="container-details">
                        <h2><?php echo $count3 ?></h2>
                        <h4>Approved Posts</h4>
                    </div>
                </div>

                <div class="container" style="background-image: linear-gradient(to right, #DEBE5C , #FCDC95); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                        <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
                    </svg></h1>
                    <div class="container-details">
                        <h2><?php echo $count4?></h2>
                        <h4>Pending Approval</h4>
                    </div>
                </div>
                <?php 
                                          
                        $count_query2 = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `approved_posts` WHERE kapampangan = ''");
                        $row2 = mysqli_fetch_array($count_query2);
                        $count2 = $row2['count'];

                        $count5 = $count3 - $count2;
                ?>
                <div class="container" style="background-image: linear-gradient(to right, #31ACBA , #6BC3AA); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                    <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg></h1>
                    <div class="container-details">
                        <h2><?php echo $count2 ?></h2>
                        <h4>Approved Posts (w/o K)</h4>
                    </div>
                </div>
                <div class="container" style="background-image: linear-gradient(to right, #6BC3AA , #A5DFBC); color: white;">
                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="3vw" height="3vw" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg></h1>
                    <div class="container-details">
                        <h2><?php echo $count5 ?></h2>
                        <h4>Approved Posts (w/ K)</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style='margin-top: 40px;'>
                    <h4>Search Word</h4>
                    <div class="input-group mb-3" style='display: flex;'>
                        <input id='search-bar' name="search" type="text" class="form-control" placeholder="Search Word" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
            </div>
            <!-- <table class="" id="table-data-2">
                    <thead class="row">
                        <tr>
                        <th class="col-lg-2">Word</th>
                        <th class="col-lg-8">Kapampangan</th>
                        <th class="col-lg-1">Post Author</th>
                        <th class="col-lg-2">Email</th>
                        <th class="col-lg-2">Action</th>
                        </tr>
                    </thead>
            </table> -->
            <div class="container-fluid" id='glossary-table'>
            <?php 
                $query_stmt = $connection -> prepare("SELECT * FROM approved_posts ORDER BY word ASC LIMIT 300");

                $query_stmt -> execute();
                $result = $query_stmt -> get_result();
            ?>
        
            <div class="table-responsive">
                <table class="table table-hover" id="table-data">
                    <thead >
                        <tr>
                        <th scope="col" hidden="hidden">#</th>
                        <th scope="col">Word</th>
                        <th scope="col">Kapampangan</th>
                        <th scope="col">Post Author</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                        while($row = $result -> fetch_assoc()){
                    ?>
                    <tbody>
                        <tr>
                        <td scope="row" hidden="hidden"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['word']; ?></td>
                        <td><?php echo $row['kapampangan']; ?></td>
                        <td><?php echo $row['post_author']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <button class="btn btn-warning update-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg></button>
                            <button class="btn btn-danger delete-btn" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg></button>
                        </td>
                        </tr>
                    </tbody>
                    <?php }?>
                </table>
            </div>


             <?php 
                include 'connect.php';

                $post_author = $_SESSION['username'];
                $email_query = mysqli_query($connection, "SELECT * FROM tbl_admin WHERE username='$post_author'");
                if (mysqli_num_rows($email_query) > 0) {
                    while($row = mysqli_fetch_assoc($email_query)) {
                      $email = $row["email"];
                    }
                  } else {
                    $email = 'adminemail2@hau.edu.ph';
                  }

                $count_query = mysqli_query($connection, "SELECT * FROM approved_posts");
                $count_rows = mysqli_num_rows($count_query);
                if($count_rows > 0)
                {   
                    $prev = $count_rows;
                }else{
                    $prev = 0;
                }
 
                $id = 1 + $prev;

                if(isset($_POST['submit']))
                {

                    $e_word = trim(ucfirst($_POST['english_input']));
                    $k_word = trim(ucfirst($_POST['k_input']));
                    $status = $_POST['status_input'];

                    // if(empty($e_word))
                    // {
                    //     echo "<script> alert('Mayghad its empty!')</script>";
                    // }
                    $count_query5 = mysqli_query($connection, "SELECT * FROM approved_posts WHERE word='$e_word'");
                    if(mysqli_num_rows($count_query5) > 0){
                        echo "<script> alert('Word Already Registered!')</script>";
                    }else{
                        if($status == "Approved"){
                            $insert_query = mysqli_query($connection, "INSERT INTO approved_posts(id, word, kapampangan, post_author, email) VALUES('$id', '$e_word', '$k_word', '$post_author', '$email')");

                            if($insert_query) {
                                echo "<script> alert('Approved Word Record Successfully!')</script>";
                                echo "<script> document.location='/kapampangan-glossary/collection'</script>";
                            }
                            else{
                                echo "<script> alert('Error Recording Data! Try Again!')</script>";
                            }
                        }
                        else if($status == "Pending"){
                            $insert_query = mysqli_query($connection, "INSERT INTO pending_posts(id, word, kapampangan, post_author, email) VALUES('$id', '$e_word', '$k_word', '$post_author', '$email')");

                            if($insert_query) {
                                echo "<script> alert('Pending Word Record Successfully!')</script>";
                                echo "<script> document.location='/kapampangan-glossary/collection'</script>";
                            }
                            else{
                                echo "<script> alert('Error Recording Data! Try Again!')</script>";
                            }
                        }
                        
                    }               
                } 
            ?>


<!-- ###################################### DELETE MODAL  ############################################## -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Confirm Deletion</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="delete.php" method="POST">
            <div class="form-group" style="margin-top: 10px;">
                <label for="exampleInputPassword1">ID</label>
                <input type="text" class="form-control" name="delete_id" id='delete_id' readonly>
            </div>
            <div class="form-group" style="margin-top: 10px;">
                <label for="exampleInputPassword1">Word</label>
                <input type="text" class="form-control" name="delete_eword" id='delete_eword' readonly>
            </div>
            <div class="form-group" style="margin-top: 10px;">
                <label for="exampleInputPassword1">Kapampangan</label>
                <input type="text" class="form-control" name="delete_kword" id='delete_kword' readonly>
            </div>
            <div class="form-group" style="margin-top: 10px;">
                <label for="exampleInputPassword1">Author</label>
                <input type="text" class="form-control" name="delete_author" id='delete_author' readonly>
            </div>
            <div style='display: flex; justify-content: space-between; margin-top: 20px;'>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="delete" class="btn btn-danger">Yes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ######################################  UPDATE RECORD MODAL  ############################################## -->
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Post</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="update.php" method="POST">
                            <div class="form-group"  style="margin-top: 10px;">
                                <label for="exampleInputPassword1">ID</label>
                                <input type="text" class="form-control" name="update_id" id='update_id' readonly>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">English</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="update_eword" id='update_eword'>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Kapampangan</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="update_kword" id='update_kword'>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Post Author</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="update_author" id='update_author'>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="update_email" id='update_email'>
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="update_status">
                                    <option selected>Approved</option>
                                    <option>Pending</option>
                                </select>
                            </div> -->
                            <div style='display: flex; justify-content: space-between; margin-top: 20px;'>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-success">Save</button>
                            </div>
                        </form>
                        
                    </div>
                
                    </div>
                </div>
            </div>

            

<!-- ######################################  ADD NEW RECORD MODAL  ############################################## -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add Post Form</h3>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group" style='margin-top: 10px;' id='e-input'>
                                <label for="exampleInputPassword1">English</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="english_input" id="word-input">
                            </div>
                            <div class="form-group" style='margin-top: 10px;'>
                                <label for="exampleInputPassword1">Kapampangan</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="k_input">
                            </div>
                            <div class="form-group" style='margin-top: 10px;'>
                                <label for="inputState">Status</label>
                                <select id="inputState" class="form-control" name="status_input">
                                    <option selected>Approved</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                            <div style='display: flex; justify-content: space-between; margin-top: 20px;'>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-success" id="new-btn" disabled>Submit</button>
                            </div>
                        </form>
                        
                    </div>
                
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>