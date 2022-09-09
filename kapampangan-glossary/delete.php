<?php 

include 'connect.php';

if(isset($_POST['delete'])){
    $id = $_POST['delete_id'];

    $delSql = mysqli_query($connection, "DELETE FROM approved_posts WHERE id='$id'");
	if($delSql){
        $update = mysqli_query($connection, "UPDATE approved_posts SET id = id - 1 WHERE id > '$id' ");
        if($update){
            echo "<script> alert('Data Record Deleted and Sorted');</script>";
            echo "<script> window.location.href = '/kapampangan-glossary/collection'</script>";
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