<?php
session_start();
$cID=$_SESSION['customerID'];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");		
  mysqli_query($con,"DELETE FROM temppurchase WHERE customerID ='$cID'");
   mysqli_query($con,"DELETE FROM temppurchaserecord WHERE customerID ='$cID'");
    echo '<script type="text/javascript">alert("Okay,Your cart is empty,keep shopping !!"); location="customerprovider.php";</script>';
?>
