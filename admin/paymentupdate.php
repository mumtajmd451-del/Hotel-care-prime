<?php
include '../config.php';

$id = $_GET['id'];

$sql = "UPDATE roombook SET payment='Paid' WHERE id='$id'";
mysqli_query($conn,$sql);

header("Location: roombook.php");
?>