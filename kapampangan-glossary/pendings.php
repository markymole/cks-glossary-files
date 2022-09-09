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
        <link rel="stylesheet" type="text/css" href="css/pending-poste.css" />
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

            $('.approve-btn').on('click', function(){
                $('#approveModal').modal('show');

                $tr = $(this).closest('tr');
                    
                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#approve_id').val(data[0]);
                    $('#approve_eword').val(data[1]);
                    $('#approve_kword').val(data[2]);
                    $('#approve_author').val(data[3]);
                    $('#approve_email').val(data[4]);
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
                    <a href="/kapampangan-glossary/pending-posts" class='nav-link active' id='odd'  style="color: #222222;"><span class="material-symbols-outlined">
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
            <h3>Pending Posts</h3>
            <div style="border-top: 2px solid #333333; margin-bottom: 20px; margin-top: 30px; width: 96%;"></div>
            <div class="right-mid">
                
                <div class="pending-container">
                    <div class="container-fluid" id='glossary-table'>
                        <?php 
                            include "connect.php";
                            $pending_query = mysqli_query($connection, "SELECT * FROM pending_posts WHERE kapampangan != '' ORDER BY word ASC");
                        ?>
                        <h5>Defintion Contribution</h5>
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
                                    if ($pending_query ) {    
                                        foreach($pending_query as $row){
                                ?>
                                <tbody>
                                    <tr>
                                    <td scope="row" hidden="hidden"><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['word']; ?></td>
                                    <td><?php echo $row['kapampangan']; ?></td>
                                    <td><?php echo $row['post_author']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td>
                                        <button class="btn btn-danger delete-btn" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg></button>
                                        <button class="btn btn-warning update-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></button>
                                        <button class="btn btn-success approve-btn">Approve</button>
                                    </td>
                                    </tr>
                                </tbody>
                                <?php }
                            }?>
                            </table>
                        </div>
                    </div>
                </div>  
                <hr>
                <div class="pending-container">
                    <div class="container-fluid" id='glossary-table'>
                        <?php 
                            $pending_query2 = mysqli_query($connection, "SELECT * FROM pending_posts WHERE kapampangan = '' ORDER BY word ASC");
                        ?>
                        <h5>Word Contribution</h5>
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
                                    if ($pending_query2 ) {    
                                        foreach($pending_query2 as $row2){
                                ?>
                                <tbody>
                                    <tr>
                                    <td scope="row" hidden="hidden"><?php echo $row2['id']; ?></td>
                                    <td><?php echo $row2['word']; ?></td>
                                    <td><?php echo $row2['kapampangan']; ?></td>
                                    <td><?php echo $row2['post_author']; ?></td>
                                    <td><?php echo $row2['email']; ?></td>
                                    <td>
                                        <button class="btn btn-danger delete-btn" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg></button>
                                        <button class="btn btn-warning update-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg></button>
                                        <button class="btn btn-success approve-btn">Approve</button>
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
        <form action="" method="POST">
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
                        <form action="" method="POST">
                            <div class="form-group" style="margin-top: 10px;">
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
                                <input readonly type="text" class="form-control" placeholder="Enter Word" name="update_author" id='update_author'>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Email</label>
                                <input readonly type="text" class="form-control" placeholder="Enter Word" name="update_email" id='update_email'>
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

<!-- ######################################  APPROVE RECORD MODAL  ############################################## -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm Approve Post</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">ID</label>
                                <input type="text" class="form-control" name="approve_id" id='approve_id' readonly>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">English</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="approve_eword" id='approve_eword' readonly>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Kapampangan</label>
                                <input  type="text" class="form-control" placeholder="Enter Word" name="approve_kword" id='approve_kword' readonly>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Post Author</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="approve_author" id='approve_author' readonly>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="approve_email" id='approve_email' readonly>
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputState">Status</label>
                                <select disabled id="inputState" class="form-control" name="approve_status">
                                    <option>Pending</option>
                                </select>
                            </div> -->
                            <div style='display: flex; justify-content: space-between; margin-top: 20px;'>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="approve" class="btn btn-success">Approve</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <?php 
            
                if(isset($_POST['approve'])){
                    $id = $_POST['approve_id'];
                    $e_word = $_POST['approve_eword'];
                    $k_word = $_POST['approve_kword'];
                    $post_author = $_POST['approve_author'];
                    $email = $_POST['approve_email'];

                    $count_query = mysqli_query($connection, "SELECT * FROM approved_posts");
                    $count_rows = mysqli_num_rows($count_query);
                    if($count_rows > 0)
                    {   
                        $prev = $count_rows;
                    }else{
                        $prev = 0;
                    }
     
                    $id = 1 + $prev;

                    //Word insert only
                    if(empty($k_word)){
                        $result = mysqli_query($connection, "INSERT INTO approved_posts(id, word, post_author, email) VALUES('$id', '$e_word', '$post_author', '$email')");
                        if($result)
                        {
                            $delSql = mysqli_query($connection, "DELETE FROM pending_posts WHERE word='$e_word'");
                            echo "<script> alert('Post Approved!');</script>";
                            echo "<script> window.location.href = '/kapampangan-glossary/pending-posts'</script>";
                        }
                        else{
                            echo "<script> alert('Post Approval Failed!');</script>";
                        }
                    }
                     //Word Definition insert only
                    else{
                        $check_query = mysqli_query($connection, "SELECT * FROM approved_posts WHERE word = '$e_word'");
                        $check_rows = mysqli_num_rows($check_query);
                        if($check_rows > 0)
                        {   
                            while($row = $check_query -> fetch_assoc()){
                                $k = $row['kapampangan'];
                                $p = $row['post_author'];
                                $e = $row['email'];
                                if(empty($k)){
                                    $out1 = $k_word;
                                }
                                else{
                                    $out1 = ', ' . $k_word;
                                }

                                if(empty($p)){
                                    $out2 = $post_author;
                                }
                                else{
                                    $out2 = ', ' . $post_author;
                                }

                                if(empty($e)){
                                    $out3 = $email;
                                }
                                else{
                                    $out3 = ', ' . $email;
                                }
                            }
                            $result = mysqli_query($connection, "UPDATE approved_posts SET kapampangan=CONCAT(kapampangan , '$out1'), post_author=CONCAT(post_author , '$out2'), email=CONCAT(email , '$out3') WHERE word = '$e_word'");
                            if($result)
                            {
                                $delSql = mysqli_query($connection, "DELETE FROM pending_posts WHERE word='$e_word'");
                                echo "<script> alert('Post Approved!');</script>";
                                echo "<script> window.location.href = '/kapampangan-glossary/pending-posts'</script>";
                            }
                            else{
                                echo "<script> alert('Post Approval Failed!');</script>";
                            }
                        }
                        else{
                            $result = mysqli_query($connection, "INSERT INTO approved_posts(id, word, kapampangan, post_author, email) VALUES('$id', '$e_word', '$k_word', '$post_author', '$email')");
                            if($result)
                            {
                                $delSql = mysqli_query($connection, "DELETE FROM pending_posts WHERE word='$e_word'");
                                echo "<script> alert('Post Approved!');</script>";
                                echo "<script> window.location.href = '/kapampangan-glossary/pending-posts'</script>";
                            }
                            else{
                                echo "<script> alert('Post Approval Failed!');</script>";
                            }
                        }

                       
                    }

                    // $result = mysqli_query($connection, "INSERT INTO approved_posts(id, word, kapampangan, post_author, email) VALUES('$id', '$e_word', '$k_word', '$post_author', '$email')");
                    // // $result = mysqli_query($connection, $query);
                    // if($result)
                    // {
                    //     $delSql = mysqli_query($connection, "DELETE FROM pending_posts WHERE word='$e_word'");
                    //     echo "<script> alert('Post Approved!');</script>";
                    //     echo "<script> window.location.href = '/kapampangan-glossary/pending-posts'</script>";
                    // }
                    // else{
                    //     echo "<script> alert('Post Approval Failed!');</script>";
                    // }
                }
            ?>

            <?php 

            if(isset($_POST['delete'])){
                $id = $_POST['delete_id'];

                $delSql = mysqli_query($connection, "DELETE FROM pending_posts WHERE id='$id'");
                if($delSql){
                    $update = mysqli_query($connection, "UPDATE pending_posts SET id = id - 1 WHERE id > '$id' ");
                    if($update){
                        echo "<script> alert('Data Record Deleted and Sorted');</script>";
                        echo "<script> window.location.href = '/kapampangan-glossary/pending-posts'</script>";
                    }
                    else{
                        echo "<script> alert('Not Sorted');</script>";
                    }
                }
                else{
                    echo "<script> alert('Data was not deleted!');</script>";
                }
            }
            ?>

            <?php 

            if(isset($_POST['update'])){
                $id = $_POST['update_id'];

                $eword = trim(ucfirst($_POST['update_eword']));
                $kword = trim(ucfirst($_POST['update_kword']));
                $post_author = trim($_POST['update_author']);
                $email = trim($_POST['update_email']);
                
                $query = "UPDATE pending_posts SET word='$eword', kapampangan='$kword', post_author='$post_author', email='$email' WHERE id = '$id'";

                $result = mysqli_query($connection, $query);

                if($result)
                {
                    echo "<script> alert('Data Record Updated!');</script>";
                    echo "<script> window.location.href = '/kapampangan-glossary/pending-posts'</script>";
                }
                else{
                    echo "<script> alert('Data Update Failed!');</script>";
                }
            }
            ?>
    </body>
</html>