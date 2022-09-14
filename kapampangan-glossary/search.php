<?php 
   include "connect.php";

   $output = '';
   if(isset($_POST['query'])){

        $search = $_POST['query'];
        // $query = "SELECT * FROM tbl_glossary WHERE word LIKE '{$search}%'";
        $query_stmt = $connection -> prepare("SELECT * FROM approved_posts WHERE word LIKE CONCAT(?, '%') ORDER BY word asc");
        $query_stmt -> bind_param("s",$search);
   }
   else{
        $query_stmt = $connection -> prepare("SELECT * FROM approved_posts ORDER BY word ASC");
   }
   $query_stmt -> execute();
   $result = $query_stmt->get_result();

   if($result ->num_rows>0){
                $output = "
                <thead >
                <tr>
                <th scope='col' hidden='hidden'>#</th>
                <th scope='col'>Word</th>
                <th scope='col'>Kapampangan</th>
                <th scope='col'>Post Author</th>
                <th scope='col'>Email</th>
                <th scope='col'>Action</th>
                </tr>
            </thead>
            <tbody>";
            while($row = $result -> fetch_assoc()){
                $output .="
                    <tr>
                        <td hidden='hidden'>".$row['id']."</td>
                        <td>".$row['word']."</td>
                        <td>".$row['kapampangan']."</td>
                        <td>".$row['post_author']."</td>
                        <td>".$row['email']."</td>
                        <td>
                            <button class='btn btn-warning update-btn'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                          </svg></button>
                            <button class='btn btn-danger delete-btn'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                            <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                        </svg></button>
                        </td>
                    </tr>
                ";
            }
            $output .= "</tbody>";
            echo $output;
    }
    else{
        echo "<h3>No Record Found </h3>";
    }
?>
<html>
    <head>
        <title>CKS Glossary</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/collectiones.css" />
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

        });
    </script>
    <body>
        
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
            <div class="form-group">
                <label for="exampleInputPassword1">ID</label>
                <input type="text" class="form-control" name="delete_id" id='delete_id' readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Word</label>
                <input type="text" class="form-control" name="delete_eword" id='delete_eword' readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kapampangan</label>
                <input type="text" class="form-control" name="delete_kword" id='delete_kword' readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Author</label>
                <input type="text" class="form-control" name="delete_author" id='delete_author' readonly>
            </div>
            <div style='display: flex; justify-content: space-between;'>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
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
                        <h4 class="modal-title">Update Word Form</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="update.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputPassword1">ID</label>
                                <input type="text" class="form-control" name="update_id" id='update_id' readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">English</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="update_eword" id='update_eword'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kapampangan</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="update_kword" id='update_kword'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Post Author</label>
                                <input type="text" class="form-control" placeholder="Enter Word" name="update_author" id='update_author'>
                            </div>
                            <div class="form-group">
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
                            <div style='display: flex; justify-content: space-between;'>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-success">Save</button>
                            </div>
                        </form>
                        
                    </div>
                
                    </div>
                </div>
            </div>

    </body>
</html>