<?php
session_start();
$ID=$_SESSION["providerID"];
$id1="provider".$ID;
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");
		
	$result=mysqli_query($con,"SELECT * FROM $id1 ");
	$ka=1;
	while($row = mysqli_fetch_array( $result ) )
	{
		$productID=$row['productID'];
			if( empty($_POST["$productID"]) )
			{
		
			}
			else 
			{
				$qry1= "DELETE FROM $id1 WHERE productID='$productID'";
				if(mysqli_query($con,$qry1))
				{
		
				}
				else
				{
				echo '<script>alert("Sorry,Product with ID $productID can not deleted!!");</script>';
				$ka=0;
				}
			}
	}

	
	
	if($ka)
	{
		echo '<script>alert("Selected products are deleted!!");location="provider_list.php";</script>';
	}
	else
	{
		echo '<script>alert("Rest of the Products are deleted successfully !!");location="provider_list.php";</script>';
	}
?>
