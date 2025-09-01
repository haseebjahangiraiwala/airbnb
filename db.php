<?php
$host = "localhost";
$user = "uulevslgtrnau";   // from your info
$pass = "ld4dy42tkorz";
$db   = "dbkb8wri3krh52";
 
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
 
