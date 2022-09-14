<?php 
session_start();
if(session_destroy())
{
	header("Location:/kapampangan-glossary/admin");
}

 ?>}
