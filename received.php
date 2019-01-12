
<?php
$con=mysqli_connect("127.0.0.1","root","")or
die("Could not connect: " . mysql_error());
mysqli_select_db($con,"mainstay")or
mysqli_query($con,"CREATE DATABASE mainstay");
session_start();
$cID=$_SESSION["customerID"];
$cusID="customer".$cID;
$purchaseID=$_POST['purchaseID'];
mysqli_query($con,"UPDATE purchase SET arrived=1 WHERE purchaseID='$purchaseID'");
mysqli_query($con,"UPDATE $cusID SET arrived=1 WHERE purchaseID='$purchaseID'");
//echo "UPDATE $cusID SET arrived=1 WHERE purchaseID='$purchaseID'";
echo '<script>alert("Okay,We got your message !!");location="customerorder.php"</script>';				
?>