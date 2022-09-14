<?php 
$connection = mysqli_connect("localhost", "root", "", "glossary-database");

if (mysqli_connect_errno()) {
	echo "Connection Failed ".mysqli_connect_error();
}
 ?>