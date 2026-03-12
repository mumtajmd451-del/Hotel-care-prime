<?php
include 'config.php';
session_start();

$id = $_GET['id'] ?? '';

$sql = "UPDATE roombook SET payment='Paid' WHERE id='$id'";
mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Payment Success</title>
</head>

<body style="text-align:center;margin-top:100px;">

<h1 style="color:green;">Payment Successful</h1>

<p>Your room booking is confirmed.</p>

<a href="home.php">
<button>Go Home</button>
</a>

</body>
</html>