<?php 

include 'connect.php';

if(isset($_POST['update'])){
    $id = $_POST['update_id'];

    $eword = trim(ucfirst($_POST['update_eword']));
    $kword = trim(ucfirst($_POST['update_kword']));
    $post_author = trim($_POST['update_author']);
    $email = trim($_POST['update_email']);
    
    $query = "UPDATE approved_posts SET word='$eword', kapampangan='$kword', post_author='$post_author', email='$email' WHERE id = '$id'";

    $result = mysqli_query($connection, $query);

    if($result)
    {
        echo "<script> alert('Data Record Updated!');</script>";
        echo "<script> window.location.href = '/kapampangan-glossary/collection'</script>";
    }
    else{
        echo "<script> alert('Data Update Failed!');</script>";
    }
}
?>