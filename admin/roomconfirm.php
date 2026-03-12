<?php
ob_start();
include '../config.php';

if(!isset($_GET['id'])){
    header("Location: roombook.php");
    exit();
}

$id = $_GET['id'];

$sql ="SELECT * FROM roombook WHERE id='$id'";
$re = mysqli_query($conn,$sql);

if($row=mysqli_fetch_assoc($re))
{
    $Name = $row['Name'];
    $Email = $row['Email'];
    $Country = $row['Country'];
    $Phone = $row['Phone'];
    $RoomType = $row['RoomType'];
    $Bed = $row['Bed'];
    $NoofRoom = $row['NoofRoom'];
    $Meal = $row['Meal'];
    $cin = $row['cin'];
    $cout = $row['cout'];
    $noofday = $row['nodays'];
    $stat = $row['stat'];
}
else{
    header("Location: roombook.php");
    exit();
}

if($stat == "NotConfirm")
{
    $st = "Confirm";
    mysqli_query($conn,"UPDATE roombook SET stat='$st' WHERE id='$id'");

    /* Room price */

    $type_of_room = 0;

    if($RoomType=="Superior Room") $type_of_room = 3000;
    elseif($RoomType=="Deluxe Room") $type_of_room = 2000;
    elseif($RoomType=="Guest House") $type_of_room = 1500;
    elseif($RoomType=="Single Room") $type_of_room = 1000;

    /* Bed price */

    $type_of_bed = 0;

    if($Bed=="Single") $type_of_bed = $type_of_room * 1/100;
    elseif($Bed=="Double") $type_of_bed = $type_of_room * 2/100;
    elseif($Bed=="Triple") $type_of_bed = $type_of_room * 3/100;
    elseif($Bed=="Quad") $type_of_bed = $type_of_room * 4/100;
    elseif($Bed=="None") $type_of_bed = 0;

    /* Meal price */

    $type_of_meal = 0;

    if($Meal=="Room only") $type_of_meal = 0;
    elseif($Meal=="Breakfast") $type_of_meal = $type_of_bed * 2;
    elseif($Meal=="Half Board") $type_of_meal = $type_of_bed * 3;
    elseif($Meal=="Full Board") $type_of_meal = $type_of_bed * 4;

    /* Total */

    $ttot = $type_of_room * $noofday * $NoofRoom;
    $mepr = $type_of_meal * $noofday;
    $btot = $type_of_bed * $noofday;

    $fintot = $ttot + $mepr + $btot;

    /* Insert payment */

    $psql = "INSERT INTO payment
    (id,Name,Email,RoomType,Bed,NoofRoom,cin,cout,noofdays,roomtotal,bedtotal,meal,mealtotal,finaltotal)
    VALUES
    ('$id','$Name','$Email','$RoomType','$Bed','$NoofRoom','$cin','$cout','$noofday','$ttot','$btot','$Meal','$mepr','$fintot')";

    mysqli_query($conn,$psql);
}
header("Location: roombook.php?confirm=1");
exit();

ob_end_flush();
?>