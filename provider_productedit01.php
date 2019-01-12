<?php
session_start();
$ID=$_SESSION["providerID"];
$id1="provider".$ID;
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");
		$sk=0;
		$produ=$_SESSION['NOPRODUCT'];
	for($i=0;$i<$produ;$i++)
	{	
		$nam="productname".$i;
		$na=$_SESSION["$nam"];
		$pn=$_POST["$sk"];
		$sk++;
		$pp=$_POST["$sk"];
		$sk++;
		$qry = "UPDATE $id1 SET productname='$pn',productprice='$pp' WHERE productname='$na'";
		if(mysqli_query($con,$qry))
		{
		
		}
		else{
			echo '<script>alert("Error Please Try Again!!!");location="provider_productedit.php";</script>';
			}	
	}
	echo '<script>alert("Successfully Updated!!!");location="provider_list.php";</script>';
?>
