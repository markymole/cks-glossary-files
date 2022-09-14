<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="English to Kapampangan Glossary">
        <meta name="keywords" content="Kapampangan Glossary, English to Kapampangan, cks, Center for Kapampangan Studies, Kapampangan Translator">
        <meta name="author" content="Center for Kapampangan Studies">
        <title>CKS Glossary</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
        <link rel="stylesheet" href="css/indexe.css">
    </head>
    <script>
        $(document).ready(function(){
            $('.spinner').fadeOut();
            $('.fluid-container').css('display', 'block');
            $('.container-s').hide();
            $("#search-bar").keyup(function(e) {
                $('.container-s').hide();
                $("#card").html("");
                var search_query = $(this).val();
                if (search_query != "") {
                    $.ajax({
                        url: "search.php",
                        type: "POST",
                        data: {
                            search: search_query
                        },
                        success: function($data) {
                            $("#list").fadeIn('fast').html($data);
                        }
                    });
                } else {
                    $("#list").fadeOut();
                }
            });

            $(document).on("click", "#list li", function() {
                $("#search-bar").val($(this).text());
                $("#list").fadeOut();
            });

            $("#submit").on("click", function(e) {
                e.preventDefault();
                $('.spinner').show();
                $('#list').hide();
                $(".container-s").fadeIn();
               
                $("#card").html("");
                var search_query = $('#search-bar').val();
            
                $.ajax({
                    url: "postsearch.php",
                    type: "POST",
                    data: {
                        search: search_query
                    },
                    success: function($data) {
                        $('.spinner').fadeOut('fast');
                        $("#card").fadeIn('fast').html($data);
                        
                    }
                });
                $("#search-bar").val("");
            });

            $('#contribute-link').click(function(){
                $('.header').css("filter","blur(2px)");
            });

            
            $('#header-search input').on('keyup', function() {
                let empty = false;

                $('#header-search input').each(function() {
                empty = $(this).val().length == 0;
                });

                if (empty)
                $('#submit').attr('disabled', 'disabled');
                else
                $('#submit').attr('disabled', false);
            });
        });
    </script>
    <body >
        <div class="fluid-container header">
            <div class="header-container">
                <p>Center for Kapampangan Studies</p>
                <h4>English to Kapampangan Glossary</h4>
            </div>
        </div>
        <div class="fluid-container">
            <div class="header-search">
                <h5>Search Word</h5>
                <div class="input-group mb-3" id="header-search" style='display: flex;'>
                    <input autocomplete="off" id='search-bar' name="search" type="text" class="form-control" placeholder="Enter word" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="submit" disabled>Search <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
                    </div>
                </div>
            </div>
            <div id="list"></div>
        </div>
        <div class="fluid-container searched-container">
            <div class="col-6 container-s">
                <div id="card"></div>
            </div>
        </div>
        <div class="text-center spinner">
            <div class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>
        </div>
    </body>
    
</html>