<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container" style="margin-top:100px; text-align:center;">

<h2>Complete Your Payment</h2>
<br>

<p>Room Booking Payment</p>

<form action="payment_success.php" method="POST">

<input type="hidden" name="amount" value="2000">

<button class="btn btn-success">Pay ₹2000</button>

</form>

<br>

<a href="payment_failed.php">
<button class="btn btn-danger">Cancel Payment</button>
</a>

</div>

</body>
</html>