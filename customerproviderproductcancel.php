<?php
session_start();
$purchaseID=$_SESSION['purchaseID'];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");		
  $qu1="DELETE FROM purchase WHERE purchaseID ='$purchaseID'";
	//echo $qu1;
  mysqli_query($con,$qu1);
    echo '<script type="text/javascript">alert("Sure, you want to leave shopping!"); location="customerhome.php";</script>';
?>
