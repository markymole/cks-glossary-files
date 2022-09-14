<?php 
        include 'connect.php';
        session_start();
        
        if(isset($_POST['username']))
        {
            $username = stripcslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($connection, $username);
            $password = stripcslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($connection, $password);

            $query = "SELECT * FROM tbl_admin WHERE username='$username' AND password='".md5($password)."'";
            $res = mysqli_query($connection, $query) or die(mysql_error());

            $user = (mysqli_num_rows($res));
            if($user==1)
            {
                $_SESSION['username'] = $username;
                header("Location:/kapampangan-glossary/dashboard");
            }
            else
            {
                echo "<script>alert('Username/Password incorrect')</script>";
                echo "<script>window.location.href = 'login.php'</script>";
            }
        }
    ?>