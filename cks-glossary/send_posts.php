
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/indexs.css">
    </head>
    <script>
        $(document).ready(function(){
            $('.spinner').fadeOut();
            $('#for-hide').fadeOut();
        });

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, '/cks-glossary/index.php' );
        }
        
    </script>
    <body>
    <div class="text-center spinner">
        <div class="spinner-border" role="status">
            <span class="sr-only"></span>
        </div>
    </div>
<?php 
    include 'connect.php';
    $count_query = mysqli_query($connection, "SELECT * FROM pending_posts");
    $count_rows = mysqli_num_rows($count_query);
    if($count_rows > 0)
    {   
        $prev = $count_rows;
    }else{
        $prev = 0;
    }

    $id = 1 + $prev;

    if(isset($_POST['definition_submit'])){
        $e_word = $_POST['english'];
        $k_word = ucfirst($_POST['kapampangan']);
        $post_author = ucfirst($_POST['name']);
        $email = $_POST['email'];

        $insert_query = mysqli_query($connection, "INSERT INTO pending_posts(id, word, kapampangan, post_author, email) VALUES('$id', '$e_word', '$k_word', '$post_author', '$email')");
        if($insert_query){
            echo "<div class='container success-message'>";
            echo "<h2>Thank you for contributing!</h2>";
            echo "<p>Your response will be reviewed and is pending for approval!</p>";
            echo "<a href='/cks-glossary/index.php'><button class='btn btn-primary'>Go back</button></a>";
            echo "</div>";
        }
        else{
            echo "<div class='container error-message'>";
            echo "<h2>Error Recording Data</h2>";
            echo "<p>Try again!</p>";
            echo "</div>";
        }
    }

    if(isset($_POST['word_submit'])){

        $e_word = ucfirst($_POST['english']);
        $post_author = ucfirst($_POST['name']);
        $email = $_POST['email'];

        $search_query = mysqli_query($connection, "SELECT * FROM pending_posts WHERE word = '$e_word'");
        $count_rows = mysqli_num_rows($search_query);

        $search_query3 = mysqli_query($connection, "SELECT * FROM approved_posts WHERE word = '$e_word'");
        $count_rows3 = mysqli_num_rows($search_query3);
        if($count_rows > 0 or $count_rows3 > 0)
        {   
            echo "<div class='container error-message'>";
            echo "<h2>Word Already Registered!</h2>";
            echo "<p>The word is already registered, we'll update the record asap!</p>";
            echo "<a href='/cks-glossary/index.php'><button class='btn btn-primary'>Go back</button></a>";
            echo "</div>";

        }else{
            
            if(empty($_POST['kapampangan'])){
                $insert_query = mysqli_query($connection, "INSERT INTO pending_posts(id, word, post_author, email) VALUES('$id', '$e_word', '$post_author', '$email')");
                if($insert_query){
                    echo "<div class='container success-message'>";
                    echo "<h2>Thank you for contributing!</h2>";
                    echo "<p>Your response will be reviewed and is pending for approval!</p>";
                    echo "<a href='/cks-glossary/index.php'><button class='btn btn-primary'>Go back</button></a>";
                    echo "</div>";
                }
                else{
                    echo "<div class='container error-message'>";
                    echo "<h2>Error Recording Data</h2>";
                    echo "<p>Try again!</p>";
                    echo "</div>";
                }
            }
            else{
                $k_word = $_POST['kapampangan'];
                $insert_query = mysqli_query($connection, "INSERT INTO pending_posts(id, word, kapampangan, post_author, email) VALUES('$id', '$e_word', '$k_word', '$post_author', '$email')");
                if($insert_query){
                    echo "<div class='container success-message'>";
                    echo "<h2>Thank you for contributing!</h2>";
                    echo "<p>Your response will be reviewed and is pending for approval!</p>";
                    echo "<a href='/cks-glossary/index.php'><button class='btn btn-primary'>Go back</button></a>";
                    echo "</div>";
                }
                else{
                    echo "<div class='container error-message'>";
                    echo "<h2>Error Recording Data</h2>";
                    echo "<p>Try again!</p>";
                    echo "</div>";
                }
            }

        }

       
       
        
    }

?>

</body>
</html>