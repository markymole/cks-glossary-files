<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
    if(isset($_POST['comment_submit'])){
            
        // if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $messageSubject = 'Comment/Suggestion';

        $to = 'nmark.raphael07@gmail.com';
        $body = "";

        $body .= "From: ".$fname. "\r\n";
        $body .= "Email: ".$email. "\r\n";
        $body .= "Comment/Suggestion: ".$comment. "\r\n";

        mail($to, $messageSubject, $body);
        $message_sent = true;
    }

    if($message_sent){
        

        echo "<div class='container success-message'>";
        echo "<h3>Thank you for contributing!</h3>";
        echo "<p>We'll get in touch with you shortly!</p>";
        echo "<a href='/cks-glossary/index.php'><button class='btn btn-primary'>Go back</button></a>";
        echo "</div>";
    }
    else{
        echo "<div class='container error-message'>";
        echo "<h3>Somethign went wrong</h3>";
        echo "<p>Try again!</p>";
        echo "<a href='/cks-glossary/index.php'><button class='btn btn-primary'>Go back</button></a>";
        echo "</div>";
    }
?>

<style>
    .success-message, .error-message{
    width: 30%;
    position: absolute;
    text-align: center;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
    padding: 50px 30px;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
}

@media screen and (max-device-width: 600px) {
    .success-message, .error-message{
        width: 80%;
    }
}

</style>