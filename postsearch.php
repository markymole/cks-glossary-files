<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="css/indexsna.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <script>
        $('.custom-modal').hide();
        $('.comment-modal').hide();
        $('.contribute-modal').hide();
        $('.custom-modal-2').hide();
        $('.contribute-modal-2').hide();
        $('#op-kapampangan').hide();
        $('.delayed-modal').hide();
        $('.about-us').hide();
        $(document).ready(function(){
            $(".delayed-modal").delay(4000).fadeIn(400);
            var temp = $('#e-word').text();
            // var temp2 = $('#k-word').text();
            $('#english-word').val(temp);
            // $('#kapampangan-word').val(temp2);
            $('#contribute-link').click(function(){
                $('.custom-modal').slideDown();
                $('.delayed-modal').fadeOut();
                $('#card-out').fadeOut('fast');
                $('.header').css("filter","blur(5px)");
                $('.searched-contaier').css("filter","blur(5px)");
            });

            $('#contribute-link-2').click(function(){
                $('.custom-modal-2').slideDown();
                $('.delayed-modal').fadeOut();
                $('#card-out').fadeOut('fast');
                $('.header').css("filter","blur(5px)");
                $('.searched-contaier').css("filter","blur(5px)");
            });

            $('#close-card').click(function(){
                $('.custom-modal').hide();
                $('#card-out').fadeIn('fast');
                $('.header').css("filter","blur(0px)");
            });

            $('#close-card-2').click(function(){
                $('.custom-modal-2').hide();
                $('#card-out').fadeIn('fast');
                $('.header').css("filter","blur(0px)");
            });

            $('#accept-button').click(function(){
                $('.contribute-modal').fadeIn(400);
                $('.custom-modal').hide();
                $('.header-search').hide();
                // $('.header-container').hide();
            });

            $('#accept-button-2').click(function(){
                $('.contribute-modal-2').fadeIn(400);
                $('.custom-modal-2').hide();
                $('.header-search').hide();
                // $('.header-container').hide();
            });

            $('#cancel-submit').click(function(){
                $('.header').css("filter","blur(0px)");
                $('.contribute-modal').hide();
                $('.header-search').fadeIn('fast');
                $('#card-out').fadeIn('fast');
            });

            $('#cancel-submit-2').click(function(){
                $('.header').css("filter","blur(0px)");
                $('.contribute-modal-2').hide();
                $('.header-search').fadeIn('fast');
                $('#card-out').fadeIn('fast');
            });

            $('#cancel-submit-3').click(function(){
                $('.header').css("filter","blur(0px)");
                $('.header-search').css("filter","blur(0px)");
                $('.comment-modal').hide();
                $('.header-search').fadeIn('fast');
                $('#card-out').fadeIn('fast');
            });


            $('#defaultCheck1').click(function(){
                $('#op-kapampangan').toggle();
            });

            $('#defaultCheck2').click(function(){
                $("#accept-button").removeAttr("disabled");
            });

            // $('#defaultCheck2').mouseup(function(){
            //     $("#accept-button").attr("disabled", true);
            // });

            $('#defaultCheck3').mousedown(function(){
                $("#accept-button-2").removeAttr("disabled");
            });

            $('#word-contri input').on('keyup', function() {
                let empty = false;

                $('#word-contri input').each(function() {
                empty = $(this).val().length == 0;
                });

                if (empty)
                $('#submit-btn').attr('disabled', 'disabled');
                else
                $('#submit-btn').attr('disabled', false);
            });

            $('#comment-link').click(function(){
                $('.comment-modal').slideDown();
                $('.delayed-modal').fadeOut();
                $('#card-out').fadeOut('fast');
                $('.header').css("filter","blur(5px)");
                $('.header-search').css("filter","blur(5px)");
            });

            $('#about-link').click(function(){
                $('.about-us').slideDown();
                $('.delayed-modal').fadeOut();
                $('#card-out').fadeOut('fast');
                $('.header').css("filter","blur(5px)");
                $('.header-search').css("filter","blur(5px)");
            });

            $('#close').click(function(){
                $('.delayed-modal').fadeOut();
            });

            $('#close-about').click(function(){
                $('.about-us').hide();
                $('#card-out').fadeIn('fast');
                $('.header').css("filter","blur(0px)");
                $('.header-search').css("filter","blur(0px)");
            })

            $('#close-team').click(function(){
                $('.about-us').hide();
                $('#card-out').fadeIn('fast');
                $('.header').css("filter","blur(0px)");
                $('.header-search').css("filter","blur(0px)");
            })

        });
    </script>
    <body>
        <div class="card custom-modal">
            <div class='card-head'>
                <h5>Privacy Concern</h5>
                <svg id="close-card" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                </svg>
            </div>
            <div class='privacy-text'>
                <p>By using the Center for Kapampangan Studies platform and submitting personal information,
                    the user expressly consents to the collection, use and disclosure of his/her personal
                    information. The Center for Kapampangan Studies recognizes its obligation under the Data Privacy
                    Act of 2012 and is commited to use the information consistent with provisions of the Act,
                    it's implementing rules and regulations, and relevant issuances of the National Privacy Commission.
                </p>
                <p>By Clicking the button bellow, you accept the use of your information for the cause of Center for Kapampangan Studies</p>
            </div>
            <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck1">
                        I have read the Privacy and Concern
                    </label>
            </div>
            <button class="btn btn-success" id='accept-button' disabled>Accept</button>
        </div>

        <div class="card custom-modal-2">
            <div class='card-head'>
                <h5>Privacy Concern</h5>
                <svg id="close-card-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                </svg>
            </div>

            <div class='privacy-text'>
                <p>By using the Center for Kapampangan Studies platform and submitting personal information,
                    the user expressly consents to the collection, use and disclosure of his/her personal
                    information. The Center for Kapampangan Studies recognizes its obligation under the Data Privacy
                    Act of 2012 and is commited to use the information consistent with provisions of the Act,
                    it's implementing rules and regulations, and relevant issuances of the National Privacy Commission.
                </p>
                <p>By Clicking the button bellow, you accept the use of your information for the cause of Center for Kapampangan Studies</p>
            </div>
            <div class="form-check my-3">
                    <input required class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                    <label class="form-check-label" for="defaultCheck1">
                        I have read the Privacy and Concern
                    </label>
            </div>
            <button class="btn btn-success" id='accept-button-2' disabled>Accept</button>
        </div>

        <div class="card delayed-modal">
            <div class="card-row">
                <span class="material-symbols-outlined">
                    contact_support
                </span>
                <span class="material-symbols-outlined" id="close">
                    close
                </span>
            </div>
            <b>We'd love your feedback!</b>
            <p>If you have any comment or suggestion, feel free to reach us by clicking the button below</p>
            <div class="buttons">
                <button class="btn btn-primary" id="comment-link">Contact Us!</button>
            </div>

        </div>

        <div class='card about-us'>
            <div class="card-row">
                <span class="material-symbols-outlined">
                    contact_support
                </span>
                <span class="material-symbols-outlined" id="close-about">
                    close
                </span>
            </div>
            <h5>ABOUT CKS GLOSSARY</h5>
            <p>CKS Glossary is an advocacy project of Center for Kapampangan Studies to promote our rich kapampangan literacy. The project was developed by 4th year Web Development
                students from Holy Angel University in completion of their intership in the office.</p>
            <hr>
            <div class='the-team'>
                <h5>CKS Developers</h5>
                <div class='name-row'>
                    <div class="row">
                        <p><b>Malig, Chaen Leemuel</b><br>
                        Developer & Researcher    
                    </p>
    
                    </div>
                    <div class="row">
                        <p><b>Nuguid, Mark Raphael</b><br>
                        Team Leader, Designer & Developer
                    </p>
       
                    </div>
                    <div class="row">
                        <p><b>Tumali, Marzen Alexis</b><br>
                        Developer & Researcher
                    </p>
                    </div>
                </div>
                <button class='btn btn-secondary' id='close-team'>Close</button>
            </div>

           
        </div>

<?php
include "connect.php";

if (!empty($_POST['search'])) {
    $Search_Query = $connection -> real_escape_string($_POST['search']);
    $query = "SELECT * FROM approved_posts
    WHERE word = '$Search_Query' LIMIT 1; ";
    $result = $connection -> query($query) or die($connection -> error);
    $html = "";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<div class="card my-4" id="card-out">';
            $html .= ' <h2 class="card-title my-2 mx-3" id="e-word">' . $row['word'] . '</h2>';
            $html .= ' <p class="card-subtitle mx-3" style="margin-top: 20px;"> <i>Kapampangan</i></p>';
            $html .= ' <h6 class="card-subtitle my-2 mx-3" id="k-word">' . $row['kapampangan'] . '</h6>';
            $html .= ' <p class="card-subtitle my-3 mx-3">Have any definition in mind? <a id="contribute-link">Contribute Now! </a></p>';
            $html .= "<hr>";
            $html .= ' <p class="card-subtitle my-3 mx-3">About CKS Glossary <a id="about-link">About us</a></p>';
            $html .= "</div>";
        }
    } else {
        $html .= '<div class="card my-4" id="card-out">';
        $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="4vw" height="4vw" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
        <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z"/>
        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
        </svg>';
        $html .= "<h3 card-title my-4 mx-3>Sorry! No record found</h3>";
        $html .= "<p my-3 mx-3>Did not find what you're looking for?</p>";
        $html .= "<p my-3 mx-3> Try registering the word in our database and we'll process the request!</p>";

        $html .= "<button id='contribute-link-2' type='button' class='btn btn-primary'>
        Contribute Now</button>";
        $html .= "</div>";
    }
    echo $html;
}
$connection -> close();

?>
    <div class="card contribute-modal">
        <form action="send_posts.php" method="POST">
        <div id="card-out">
            <h2 class="card-title my-4">Contribute Form</h2>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">English</label>
                <input id="english-word" type="text" class="form-control" name="english" id="exampleFormControlInput1" value="" readonly>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Kapampangan</label>
                <textarea required id="kapampangan-word" name="kapampangan" class="form-control" id="exampleFormControlTextarea1" rows="3" value=""></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contributor Name</label>
                <input required type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input required type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class='' style="display: flex; justify-content: space-between;">
                <button id="cancel-submit" type="button" class="btn btn-secondary">Cancel</button>
                <button type="submit" name="definition_submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>   
    </div>


    <div class="card contribute-modal-2">
        <form action="send_posts.php" method="POST">
        <div id="card-out">
            <h2 class="card-title my-4">Contribute Form</h2>
            <div class="mb-3" id="word-contri">
                <label for="exampleFormControlInput1" class="form-label">English</label>
                <input required id="english-word" type="text" class="form-control" name="english" id="exampleFormControlInput1" value="">
            </div>
            <div class="mb-3" id="op-kapampangan">
            <label for="exampleFormControlTextarea1" class="form-label">Kapampangan (Optional)</label>
                <textarea id="kapampangan-word" name="kapampangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Add Kapampangan Definition
                    </label>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contributor Name</label>
                <input required type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input required type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class='' style="display: flex; justify-content: space-between;">
                <button id="cancel-submit-2" type="button" class="btn btn-secondary">Cancel</button>
                <button type="submit" name="word_submit" class="btn btn-primary" id="submit-btn" disabled>Submit</button>
            </div>
        </div>
        </form>   
    </div>

    <div class="card comment-modal">
        <form action="comment.php" method="POST">
        <div id="card-out">
            <h2 class="card-title my-4">Comment/Suggestion Form</h2>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input required id="full-name" type="text" class="form-control" name="fname" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input required type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comment/Suggestion</label>
                <textarea required id="comment-suggestion" name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class='' style="display: flex; justify-content: space-between;">
                <button id="cancel-submit-3" type="button" class="btn btn-secondary">Cancel</button>
                <button type="submit" name="comment_submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>   
    </div>
    </body>
</html>