<?php 
include 'authentication.php'
 ?>
<html>
    <head>
        <title>CKS Glossary</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/admin-users.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <script>
        $(document).ready(function(){
            $('.hidden-cpassword').hide();
            $('.cancel-update').hide();
            $('.save-update').hide();
            var $editable = false;

                $('.update-button').click(function(event) {
                    event.preventDefault();
                    console.log('The list item has been clicked'); // This console log is successful
                    $editable = true;
                    checkStatus();
                    });

                    function checkStatus(){
                        if($editable) {
                            $(".update-inpu").removeAttr("disabled");
                            $('.hidden-cpassword').fadeIn(500);
                            $('.cancel-update').fadeIn(700);
                            $('.save-update').fadeIn(700);
                            $('.update-button').hide();
                        }
                        else{
                            $(".update-inpu").attr("disabled", "disabled"); 
                        }
                }
                $('.cancel-update').click(function(event) {
                    $('.cancel-update').fadeOut();
                    $('.save-update').fadeOut();
                    $('.hidden-cpassword').fadeOut();
                    $(".update-inpu").attr("disabled", "disabled"); 
                });

                $('.new-user-input').on('keyup', function() {
                    var empty = false;

                    $('.new-user-input').each(function() {
                        if ($(this).val().length == 0) {
                            empty = true;
                        }
                    });
                    if (empty){
                        $('.register').attr('disabled', 'disabled');
                        $('.register').css("background-color", "#333333");
                    }
                    else{
                        $('.register').attr('disabled', false);
                        $('.register').css("background-color", "#710E1D");
                    }
                
                });

                $('.remove-btn').on('click', function(){
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');
                    
                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#delete_id').val(data[0]);
                    $('#delete_username').val(data[1]);
                    $('#delete_email').val(data[2]);
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
                    <a href="/kapampangan-glossary/collection" class='nav-link' id='even'><span class="material-symbols-outlined">
                    view_list
                    </span> Library</a>
                    <!-- <div style="border-top: 1px solid white; width: 90%; margin: auto;"></div> -->
                    <a href="/kapampangan-glossary/pending-posts" class='nav-link' id='odd'><span class="material-symbols-outlined">
                    pending_actions
                    </span> Pending Posts</a>
                    <!-- <div style="border-top: 1px solid white; width: 90%; margin: auto;"></div> -->
                    <a href="/kapampangan-glossary/admin-users" class='nav-link active' id='odd'   style="color: #222222;"><span class="material-symbols-outlined">
                    admin_panel_settings
                    </span>Admin</a>

                </nav>
            </div>
            <div class="upper-bottom">
                <a href="logout.php" id="logout">Logout</a>
            </div>
        </div>
        <div class='right-section'>
            <h3>Admin Panel</h3>
            <div style="border-top: 2px solid #333333; margin-bottom: 20px; margin-top: 20px; width: 96%;"></div>
            <div class="panel-container">
            <?php 
            include 'connect.php';
            if(isset($_REQUEST['username']))
            {
                #username
                $username = stripcslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($connection, $username);
                #password
                $password = stripcslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($connection, $password);

                $aname = stripcslashes($_REQUEST['aname']);
                $aname = mysqli_real_escape_string($connection, $aname);

                $email = stripcslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($connection, $email);

                $cpassword = stripcslashes($_REQUEST['cpassword']);
                $cpassword = mysqli_real_escape_string($connection, $cpassword);

                $check_query = "SELECT username FROM tbl_admin WHERE username ='$username'";
                $check_result = mysqli_query($connection, $check_query);

                if(mysqli_num_rows($check_result) > 0){
                    echo "<script>alert('Username Already Registered!')</script>";
                }
                else{
                    if($password == $cpassword){
                        $query = "INSERT INTO tbl_admin(name, username,email, password) VALUES('$aname', '$username', '$email', '".md5($password)."')";
    
                        $res = mysqli_query($connection, $query);
    
                        if($res){
                        echo "<script>alert('Admin successfully registered!')</script>";
                        echo "<script>window.location.href = 'admin-users'</script>";
                        }
                        else{
                            echo "<script>alert('Error registering user')</script>";
                        }
                    }
                    else{
                        echo "<script>alert('Password does not match')</script>";
                        echo "<script>window.location.href = 'admin-users'</script>";
                    }
                }

                
                
            }
        ?>
         <?php	
            if(isset($_POST['update']))
            {
                $name = $_POST['up-name'];
                $usename = $_POST['up-username'];
                $email = $_POST['up-email'];
                $pass = $_POST['up-password'];
                $cpass = $_POST['up-cpassword'];
                $lenght = strlen($usename);
                $c_user = $_SESSION['username'];
                
                if(empty($cpass)){
                    $updateQe = mysqli_query($connection, "UPDATE tbl_admin SET name='$name', username='$usename', email='$email' where username='$c_user'");
                    if ($updateQe) {
                        echo "<script> alert('Update Successfully!')</script>";
                        echo "<script> document.location='/kapampangan-glossary/admin-users'</script>";
                    }
                    else{
                        echo "<script> alert('Error updating data. Please try again!')</script>";
                    }
                }

                if($pass == $cpass){
                    if($lenght > 0){
                        $usename = $_POST['up-username'];
                    }
                    else{
                        $usename = $_SESSION['username'];
                    }
                    $updateQ = mysqli_query($connection, "UPDATE tbl_admin SET name='$name', username='$usename', email='$email', password='".md5($pass)."' where username='$c_user'");
                    if ($updateQ) {
                        $_SESSION['username'] = $usename;
                        $out = $_SESSION['username'];
                        echo "<script> alert('Update Successfully!')</script>";
                        echo "<script> document.location='/kapampangan-glossary/admin-users'</script>";
                    }
                    else{
                        echo "<script> alert('Error updating data. Please try again!')</script>";
                    }
                }
                else{
                    echo "<script> alert('Password did not match!')</script>";
                }
            }

        ?>
        <div class="users-container">
           
            <div class="users-panel">
                        <div class="users-leftpart">
                            <?php 
                                include 'connect.php';

                                $result = mysqli_query($connection, "SELECT COUNT(*) AS `count` FROM `tbl_admin`");
                                $row = mysqli_fetch_array($result);
                                $count = $row['count'];
                            
                            ?>
                            <div class='users-topleft'>
                                <h1><?php echo $count?> <svg xmlns="http://www.w3.org/2000/svg" width="3.5vw" height="3.5vw" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                </svg></h1>
                                <h4>Total Registered Users</h4>
                                <Button type='button' class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add New Record</Button>
                            </div>
                            <?php 

                                $c_user = $_SESSION['username'];

                                $user_result = mysqli_query($connection, "SELECT * FROM tbl_admin WHERE username ='$c_user'");

                                while ($row = mysqli_fetch_array($user_result)){
                                ?>
                            <form action="" method="post" class="forma">
                                <h4>Admin Information</h4>
                                <div class='update-form'>
                                    <h6 style='margin-top: 10px;'>Admin Name</h6>
                                    <input type="text" name="up-name" value="<?php echo $row['name'] ?>" class="update-inpu" disabled="disabled">
                                    <div style='margin-top: 10px;'>
                                        <h6 style='margin-top: 10px;'>Username</h6>
                                        <input type="text" name="up-username" value="<?php echo $row['username'] ?>" class="update-inpu" disabled="disabled">
                                        <h6 style='margin-top: 10px;'>Email</h6>
                                        <input type="text" name="up-email" value="<?php echo $row['email'] ?>" class="update-inpu" disabled="disabled">
                                    </div>
                                    <div class='passwords' style='margin-top: 10px;'>
                                        <div class="old-password">
                                            <h6>Password</h6>
                                            <input type="password" name="up-password" value="<?php echo $row['password'] ?>" class="update-inpu" disabled="disabled">
                                        </div>
                                        <div class='hidden-cpassword'>
                                            <h6>Confirm New Password</h6>
                                            <input type="password" name="up-cpassword" placeholder="Confirm Password" class="update-inpu">
                                        </div>  
                                    </div>
                                </div>
                          
                                <button class='btn btn-primary update-button'>Update Information</button>
                                <div class="buttons">
                                    <button class='btn btn-warning cancel-update'>Cancel</button>
                                    <button type="update" name="update"class='btn btn-success save-update'>Save</button>
                                </div>
                            </form>
                        </div>
                        <?php }?>
                        <div class="users-rightpart">
                            <div class="container-fluid" id='glossary-table'>
                                    <h2 style='margin-bottom: 40px;'>Registered Admin List</h2>
                                    <?php 
                                        include "connect.php";
                                        $admin_query = mysqli_query($connection, "SELECT * FROM tbl_admin");
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="table-data">
                                            <thead >
                                                <tr>
                                                <th scope="col" hidden="hidden">ID</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                if ($admin_query ) {    
                                                    foreach($admin_query as $row){
                                            ?>
                                            <tbody>
                                                <tr>
                                                <td scope="row" hidden="hidden"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td>
                                                    <!-- <button class="btn btn-warning update-btn" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg></button> -->
                                                    <button class="btn btn-danger remove-btn" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                    <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                                    </svg></button>
                                                </td>
                                                </tr>
                                            </tbody>
                                            <?php }
                                        }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<!-- ######################################  ADD NEW ADMIN MODAL  ############################################## -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add New Admin</h3>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Username</label>
                                <input type="text" class="form-control" placeholder="Enter Username" name="username">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Admin Name</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="aname">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" placeholder="Enter New Password" name="password">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm New Password" name="cpassword">
                            </div>
                            <div style='display: flex; justify-content: space-between; margin-top: 20px;'>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                
                    </div>
                </div>
            </div>
        </div>

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
        <form action="deleteadmin.php" method="POST">
            <div class="form-group" style="margin-top: 10px;">
                <label for="exampleInputPassword1">ID</label>
                <input type="text" class="form-control" name="delete_id" id='delete_id' readonly>
            </div>
            <div class="form-group" style="margin-top: 10px;">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" class="form-control" name="delete_username" id='delete_username' readonly>
            </div>
            <div class="form-group" style="margin-top: 10px;">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="delete_email" id='delete_email' readonly>
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
    </body>
</html>