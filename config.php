<?php
$server = "db";
$username = "root";
$password = "rootpassword";
$database = "hotelcareprime";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("DB connection failed");
}

