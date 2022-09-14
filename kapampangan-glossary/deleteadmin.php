<?php 

include 'connect.php';

if(isset($_POST['delete'])){
    $id = $_POST['delete_id'];

    $delSql = mysqli_query($connection, "DELETE FROM tbl_admin WHERE id='$id'");
	if($delSql){
        $update = mysqli_query($connection, "UPDATE tbl_admin SET id = id - 1 WHERE id > '$id' ");
        if($update){
            echo "<script> alert('Admin Removed and Sorted');</script>";
            echo "<script> window.location.href = '/kapampangan-glossary/admin-users'</script>";
        }
        else{
            echo "<script> alert('Not Sorted');</script>";
        }
    }
    else{
        echo "<script> alert('Admin was not removed!');</script>";
    }
}
?>