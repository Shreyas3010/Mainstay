<?php 
session_start();
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");
?>
<html>
<style>
.hiddenbutton {

  background-color:Transparent;
  width:500px;
  position:relative;
  margin-left:15px;
  border:none;
}
.hiddenbutton .badge {
  position: absolute;
  top: -10px;
  right: 120px;
  padding: 10px 10px;
  font-size:15px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
div.offerstoshow {
	background-color:black;
	width:80%;
	margin:120px 00px 70px 10%;
	overflow:auto;
    white-space: nowrap;
	}
div.offerstoshow a {
  display: inline-block;

  color: white;
  padding: 14px 14px 00px 14px;
  text-decoration: none;
}

</style>
<body>
<div class="offerstoshow">

<div style="margin-left:37%;padding:10px;font-family:Courier New,Courier, monospace;font-variant:small-caps;color:white;font-size:40px;font-weight:900;position:absolute;">Offers</div>
<br>
<br>
<br>
<br>
<?php
	$customerID=$_SESSION["customerID"];
	$cityresult=mysqli_query($con,"SELECT * FROM customer where customerID='$customerID'");
	$cityrow = mysqli_fetch_array( $cityresult );
	$city=$cityrow['city'];
	//$providerID=$_SESSION["providerID"];
	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	//Select Database
	mysqli_select_db($con,"mainstay")or
	die("Could not select db: " . mysql_error());
	
	
	$offerresult=mysqli_query($con,"SELECT * FROM offerlist where providerID IN (SELECT providerID FROM provider WHERE city='$city' ) ");
	$offernum=mysqli_num_rows($offerresult);
	if($offernum==0)
	{
		?>
		<p style="margin:00px 00px 50px 00px;text-align:center;font-weight:900;font-size:40px;font-family:cursive;font-variant: small-caps;color:white;">No Offers</p>
		<?php
	}
	$indexnum=1;
	while($offerrow = mysqli_fetch_array( $offerresult ) )
	{
		$offerproviderID=$offerrow['providerID'];
		$offerdiscount=$offerrow['discount'];
		$offerID=$offerrow['offerID'];
		$offerresult3=mysqli_query($con,"SELECT * FROM provider WHERE providerID='$offerproviderID'");
		$offerrow3= mysqli_fetch_array( $offerresult3);
		$offershopname=$offerrow3['name'];
		
		if(floor($offerdiscount/10)==0)
		{
			$offerdiscount="0".$offerdiscount;
		}
		if($offerrow["productID"]==0)
		{
			$offerupto=$offerrow["upto"];
			$offerminorder=$offerrow['minorder'];
			$offercode=$offerrow['code'];
			
			
			?>
			<a class="hiddenbutton">
			<div>
			<center><img src="image/order.png" alt="OrderOffer" style="width:240px;height:270px;"><span class="badge"><?php echo $offerdiscount;?></span></center>
			</div>
			<div style="margin-top:30px;width:100%;" >
			<center><font style="font-weight:900;margin:00px 00px 00px 00px;font-size:20px;font-family:cursive;cursive;color:white;">Shop Name: </font><font style="cursive;color:white;font-size:20px;font-family:cursive;"><?php echo "$offershopname"?></font></center>
			</div>
			<div style="margin-top:15px;width:100%;" >
			<center><font style="margin:00px 00px 00px 00px;font-weight:900;font-size:20px;font-family:cursive;color:white;">Minorder: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offerminorder"?> Rs.</font></center>
			</div>
			<div style="margin-top:15px;width:100%;">
			<center><font style="font-weight:900;margin:00px 00px 00px 00px;font-size:20px;font-family:cursive;color:white;">Upto: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offerupto"?> Rs.</font><font style="margin:00px 00px 00px 20px;font-weight:900;font-size:20px;font-family:cursive;color:white;">Code: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offercode"?></font></center>
			</div>
			<br>
			</a>
			<?php
		}
		else
		{
			$offerproductID=$offerrow["productID"];
			$offerproviderID=$offerrow["providerID"];
			$offerprovID="provider".$offerproviderID;
			$offerresult1=mysqli_query($con,"SELECT * FROM $offerprovID WHERE productID='$offerproductID'");
			$offerrow1= mysqli_fetch_array( $offerresult1);
			$offername=$offerrow1['productname'];
			$offerprice=$offerrow1['productprice'];
			$imagetmp1=$offerrow1['productimagetmp'];
			$newprice=$offerprice*(100-$offerdiscount)/100;
			?>
			<a class="hiddenbutton">
			<div>
			<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp1)."' alt='ProductOffer' width='240px' height='270px' >";?></center>
			<span class="badge"><?php echo $offerdiscount;?></span></div>
			
			<div style="margin-top:30px;width:100%;" >
			<center><font style="font-weight:900;margin:00px 00px 00px 32px;font-size:20px;font-family:cursive;cursive;color:white;">Shop Name: </font><font style="cursive;color:white;font-size:20px;font-family:cursive;"><?php echo "$offershopname"?></font></center>
			</div>
			<div style="margin-top:15px;width:100%;" >
			<center><font style="margin:00px 00px 00px 32px;font-weight:900;font-size:20px;font-family:cursive;cursive;color:white;">Name: </font><font style="cursive;color:white;font-size:20px;font-family:cursive;"><?php echo "$offername"?></font></center>
			</div>
			<div style="margin-top:15px;width:100%;">
			<center><font style="margin:00px 00px 00px 32px;font-weight:900;font-size:20px;font-family:cursive;cursive;color:white;">Price: </font><font style="cursive;color:white;font-size:20px;font-family:cursive;"><strike><?php echo "$offerprice"?></strike> / <?php echo "$newprice"?> Rs.</font></center>
			</div>
			<br>
			</a>
			<?php
		}
	}
	
?>
</div>
</body>
</html>