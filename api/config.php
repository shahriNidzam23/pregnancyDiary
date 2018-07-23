<?php 
// variable declaration
$dbhost = "localhost";
$username = "root";
$password = "";
$db = "pregnancydiary";

// connect to database
$conn = mysqli_connect($dbhost, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>