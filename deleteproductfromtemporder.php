<?php
session_start();
$con=mysqli_connect("127.0.0.1","root","")or
die("Could not connect: " . mysql_error());
mysqli_select_db($con,"mainstay")or
mysqli_query($con,"CREATE DATABASE mainstay");
$customerID=$_SESSION['customerID'];
$quantity=$_POST['quantity'];
$tempbuyingID=$_POST['tempbuyingID'];
$temppurchaseID=$_POST['temppurchaseID'];
$productprice=$_POST['productprice'];
if(isset($_POST['deleteitem']))
{
	$amounttobesub=$quantity*$productprice;			
    mysqli_query($con,"DELETE FROM temppurchase WHERE tempbuyingID ='$tempbuyingID'");
    $rowcount=mysqli_query($con,"SELECT * FROM temppurchase where customerID='$customerID'");
    if(mysqli_num_rows($rowcount)==0)
   {
	mysqli_query($con,"DELETE FROM temppurchaserecord  WHERE temppurchaseID ='$temppurchaseID'");
	echo '<script type="text/javascript">alert("Okay,Your cart is empty, keep shopping !!"); location="customerprovider.php";</script>';
	}
	else
	{
	mysqli_query($con,"UPDATE temppurchaserecord SET `totalamount` = `totalamount` - '$amounttobesub' WHERE temppurchaseID='$temppurchaseID'");
	 echo '<script type="text/javascript">alert("Okay, Deleting the item from the cart !!"); location="customerproviderproduct99.php";</script>';
	}
} 
if(isset($_POST['minitem']))
{	if($quantity==1)
	{
		mysqli_query($con,"DELETE FROM temppurchase WHERE tempbuyingID ='$tempbuyingID'");
		$rowcount=mysqli_query($con,"SELECT * FROM temppurchase where customerID='$customerID'");
		if(mysqli_num_rows($rowcount)==0)
		{
		mysqli_query($con,"DELETE FROM temppurchaserecord  WHERE temppurchaseID ='$temppurchaseID'");
		echo '<script type="text/javascript">alert("Okay,Your cart is empty, keep shopping !!"); location="customerprovider.php";</script>';
		}
		else
		{
		mysqli_query($con,"UPDATE temppurchaserecord SET `totalamount` = `totalamount` - '$productprice' WHERE temppurchaseID='$temppurchaseID'");
		echo '<script type="text/javascript">alert("Okay, Deleting the item from the cart !!"); location="customerproviderproduct99.php";</script>';
		}
	}
	else
	{
		mysqli_query($con,"UPDATE temppurchase SET `quantity` = `quantity` - 1 WHERE tempbuyingID='$tempbuyingID'");
		mysqli_query($con,"UPDATE temppurchaserecord SET `totalamount` = `totalamount` - '$productprice' WHERE temppurchaseID='$temppurchaseID'");
		echo '<script type="text/javascript">alert("Okay,Quantity is decreased by one in the cart !!"); location="customerproviderproduct99.php";</script>';
	}
    
}
if(isset($_POST['plusitem'])) 
{
	mysqli_query($con,"UPDATE temppurchase SET `quantity` = `quantity` + 1 WHERE tempbuyingID='$tempbuyingID'");
	mysqli_query($con,"UPDATE temppurchaserecord SET `totalamount` = `totalamount` + '$productprice' WHERE temppurchaseID='$temppurchaseID'");
	echo '<script type="text/javascript">alert("Okay,Quantity is increased by one in the cart !!"); location="customerproviderproduct99.php";</script>';
}	
?>
