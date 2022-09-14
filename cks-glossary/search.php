<?php
include "connect.php";
if (!empty($_POST['search'])) {
    $Search_Query = $connection -> real_escape_string($_POST['search']);
    $query = "SELECT distinct(word) FROM approved_posts
    WHERE word LIKE '{$Search_Query}%' LIMIT 7; ";
    $result = $connection -> query($query) or die($connection->error);
    
    $html ='<ul class="list-group" style="width: 100%;">';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<li class='list-group-item'><a>" . $row['word'] . "</a></li>";
            
        }
        
    } 
    else {
        //  $html .= '';
          $html .= '<li class="list-group-item" disabled>Sorry! No record found</li>';
    }
    $html .= "</ul>";
    echo $html;
} 
$connection->close();