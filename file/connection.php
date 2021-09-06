<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbank";
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8mb4');

$link = mysqli_connect("localhost", "root", "", "bloodbank");
?>