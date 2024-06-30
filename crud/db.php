<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "tit_crud";

// Create connection & check connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Connection successful
echo "Connection Success to database: " . $dbname;

?>
