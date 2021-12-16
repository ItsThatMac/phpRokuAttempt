<?php

// four variables to connect to the database
$host = "localhost";
$username = "root";
$user_pass = "root";
$database_in_use = "jokes";



// creating a database object or instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

?>