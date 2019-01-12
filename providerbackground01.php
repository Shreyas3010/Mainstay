<?php
	session_start();
	$providerID=$_SESSION["providerID"];
	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	//Select Database
	mysqli_select_db($con,"mainstay")or
	die("Could not select db: " . mysql_error());
	
	if(isset($_POST["offer1"]))
	{
		$typef=$_POST['typef'];
		$discount=$_POST["discount"];
		$minorder=0;
		$productID=0;
		$upto=0;
		if($typef=="item")
		{
				$flag=0;
				$provider="provider".$providerID;
				$var1="SELECT * FROM $provider";
				$result1=mysqli_query($con,$var1);
				$productID=$_POST["productID"];
				while($nr1=mysqli_fetch_array($result1))
				{
					if($nr1["productID"]==$productID)
					{
						$flag=1;
					}
				}		
				if($flag==0)
				{
					echo "<script type='text/javascript'>alert('Please check ProductID..');location='providerbackground.php';</script>";
				}
				else
				{
					$offerresult=mysqli_query($con,"SELECT * FROM offerlist where providerID='$providerID' AND productID='$productID' ");
					$offernum=mysqli_num_rows($offerresult);
					if($offernum!=0)
					{
					echo "<script type='text/javascript'>alert('An offer with this product is already existed !!');location='providerbackground.php';</script>";
					}
					else
					{
						$qry = "INSERT INTO offerlist (providerID,productID,discount,upto,minorder) VALUES('$providerID','$productID','$discount','$upto','$minorder')";
						mysqli_query($con,$qry);
					
						$qry1= "UPDATE provider SET offer=1 WHERE providerID='$providerID'";
						mysqli_query($con,$qry1);
						echo "<script type='text/javascript'>alert('the offer is available for the customers..');location='providerbackground.php';</script>";
					}
					
				}
		}
		if($typef=="order")
		{
			$productID=0;	
			$upto=$_POST["upto"];
			$minorder=$_POST["minorder"];
			$tempcode=$_POST["code"];
			$code=strtoupper($tempcode);
			$offerresult=mysqli_query($con,"SELECT * FROM offerlist where providerID='$providerID' AND code='$code' ");
			$offernum=mysqli_num_rows($offerresult);
			if($offernum!=0)
			{
				echo "<script type='text/javascript'>alert('An offer with this code is already existed !!');location='providerbackground.php';</script>";
			}
			else
			{
				$qry = "INSERT INTO offerlist (providerID,productID,discount,upto,minorder,code) VALUES('$providerID','$productID','$discount','$upto','$minorder','$code')";
				mysqli_query($con,$qry);
			
				$qry1= "UPDATE provider SET offer=1 WHERE providerID='$providerID'";
				mysqli_query($con,$qry1);
			
				echo "<script type='text/javascript'>alert('the offer is available for the customers..');location='providerbackground.php';</script>";
			}
		}		
	}
	if(isset($_POST["editbutton"]))
	{
		$type=$_POST["typeoffer"];
		$offerID=$_POST["offerID"];
		$discount=$_POST["discount"];
		if($type=="order")
		{
			$minorder=$_POST["minorder"];
			$code=$_POST["code"];
			$upto=$_POST["upto"];
			$qry1= "UPDATE offerlist SET discount='$discount',minorder='$minorder',upto='$upto',code='$code'  WHERE offerID='$offerID'";
			//echo $qry1;
			if(mysqli_query($con,$qry1))
			{
				echo "<script type='text/javascript'>alert('The offer is updated !!');location='providerbackground.php';</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Error, Sorry !!');location='providerbackground.php';</script>";
			}
			
		}
		else if($type=="item")
		{
			$qry1= "UPDATE offerlist SET discount='$discount'  WHERE offerID='$offerID'";
			if(mysqli_query($con,$qry1))
			{
				echo "<script type='text/javascript'>alert('The offer is updated !!');location='providerbackground.php';</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Error, Sorry !!');location='providerbackground.php';</script>";
			}
			
		}
	}
	if(isset($_POST["cancelbutton"]))
	{
		echo "<script type='text/javascript'>alert('Okay , Return back to the page..');location='providerbackground.php';</script>";
	}
	if(isset($_POST["deletebutton"]))
	{
			$offerID=$_POST["offerID"];
			
			$qry1= "DELETE FROM offerlist WHERE offerID='$offerID';";
			
			if(mysqli_query($con,$qry1))
			{
				$offerresult=mysqli_query($con,"SELECT * FROM offerlist where providerID='$providerID' ");
				$offernum=mysqli_num_rows($offerresult);
				if($offernum==0)
				{
					$qry2= "UPDATE provider SET offer=0  WHERE providerID='$providerID'";
					mysqli_query($con,$qry2);
					echo "<script type='text/javascript'>alert('The offer is deleted and now you have no offer !!');location='providerbackground.php';</script>";

				}
				else
				{
					echo "<script type='text/javascript'>alert('The offer is deleted !!');location='providerbackground.php';</script>";

				}
			}
			else
			{
				echo "<script type='text/javascript'>alert('Error, Sorry !!');location='providerbackground.php';</script>";
			}
			
	}
?>