<?php
session_start();
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.btn {
  border-radius: 4px;
  background-color:black;
  border:1px solid white;
  color:white;
  text-align:center;
  font-size:20px;
  padding: 10px;
  width: 130px;
  transition: all 0.5s;
  cursor: pointer;
  font-family:cursive;

}

.btn span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.btn span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.btn:hover span {
  padding-right: 25px;
}

.btn:hover span:after {
  opacity: 1;
  right: 0;
}

.bg {
    background-image: url("Image/bg01.jpg");
    background-repeat: no-repeat;
    background-size:cover;
}
.offerinfotoput
{
	background-color:black;
	width:60%;
	margin:120px 00px 00px 20%;
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

div.offerstoshow a:hover {
  background-color: #777;
}
.b23
{
	font-size:1em;
	font-family:cursive;
	background-color:white;
	color:black;
}
.e
{ 
  margin:00px 00px 00px 50px;
  width:150px;
  padding:20px;
  font-family:cursive;
  background-color:black;
  color:white;
  border:none;
}
::placeholder
{
	font-size:1.3em;
	color:white;
}
.itemtitle
{
	font-size:25px;
	color:white;
	font-family:cursive;
}
.hiddenbutton {

  background-color:Transparent;
  position:relative;
  margin-left:15px;
  border:none;
}
.hiddenbutton .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 10px 10px;
  font-size:15px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
<body class="bg">
<div class="offerinfotoput" >
<br>
<center><font class="itemtitle">Offer</font></center>
<form method="POST" action="providerbackground01.php">
<select class="form-control field-type" id="typef" name="typef" onclick="typeopt()" style="font-family:cursive;width:160px;margin:20px 00px 00px 220px;font-size:1em;height:55px;border:none;background-color:black;color: white;" required>
								<option value="" class="b23">Offer</option>
								<option value="order" class="b23">On an order</option>
								<option value="item" class="b23">On particulr item</option>
								</select>
								<!--<select class="form-control field-type" id="disoroff" name="disoroff" onclick="typeopt1()" style="font-family:cursive;width:160px;margin:20px 00px 00px 60px;font-size:1em;height:55px;border:none;background-color:black;color: white;" required>
								<option value="" class="b23">Discount or Off</option>
								<option value="discount" class="b23">Discount</option>
								<option value="off" class="b23">Off</option></select> -->
								<input type="number" name="discount" style="margin-left:130px;" placeholder="Discount" class="e" min="0" max="100" step="1" required>
								<br>
								<div  id="itemf" style="float:left;"></div>
								<div style="flaot:left;margin:70px 00px 20px 380px;"><button class="btn" name="offer1" id="offer1" type="submit"><span>Confirm</span></button></div>
								<br>
								<script>
									function typeopt()
									{
									//confirm("Press a button!");
									var x=document.getElementById("typef").value;
									if(x=="item")
									{
									var c1=document.getElementById("itemf");
									c1.innerHTML="<input type=\"digit\" name=\"productID\" style=\"margin:00px 00px 00px 220px;color:white;\" placeholder=\"Product ID\" class=\"e\" required>";
									}
									else if(x=="order")
									{
					
									document.getElementById("itemf").innerHTML="<input type=\"digit\" name=\"minorder\" style=\"margin:00px 00px 00px 140px;color:white;\" placeholder=\"Min order\" class=\"e\" required><input type=\"digit\" style=\"margin:00px 00px 00px 100px;color:white;\" name=\"upto\" placeholder=\"Up to\" class=\"e\" required><input style=\"color:white;margin:00px 00px 00px 100px;\" type=\"text\" name=\"code\" placeholder=\"Code\" class=\"e\" required>";
									}
									else
									{
					
									document.getElementById("itemf").innerHTML="<p></p>";
									}
									}
									
									//not for use for this code
									/*function typeopt1()
									//{
									//confirm("Press a button!");
									var x=document.getElementById("disoroff").value;
									if(x=="discount")
									{
									var c1=document.getElementById("doro");
									c1.innerHTML="<input type=\"number\" name=\"discount1\" placeholder=\"Discount\" class=\"e\" min=\"0\" max=\"100\" step=\"1\" required>";
									}
									else if(x=="off")
									{
					
									document.getElementById("doro").innerHTML="<input type=\"digit\" name=\"off1\" placeholder=\"Off\" class=\"e\" required>";
									}
									else
									{
										document.getElementById("doro").innerHTML="<p></p>";
									}
									}*/
									
								</script>
								
</form>
</div>
<br>

<div class="offerstoshow">

<div style="margin-left:37%;padding:10px;font-family:Courier New,Courier, monospace;font-variant:small-caps;color:white;font-size:40px;font-weight:900;position:absolute;">Offers</div>
<br>
<br>
<br>
<br>
<?php
	$providerID=$_SESSION["providerID"];
	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	//Select Database
	mysqli_select_db($con,"mainstay")or
	die("Could not select db: " . mysql_error());
	$provID="provider".$providerID;
	$offerresult=mysqli_query($con,"SELECT * FROM offerlist where providerID='$providerID' ");
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
		$offerdiscount=$offerrow['discount'];
		$offerID=$offerrow['offerID'];
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
			<a><form style="width:300px;" method="POST" action="offerupdate.php">
			<input type="hidden" name="typeoffer" value="order">
			<input type="hidden" name="discount" value="<?php echo $offerdiscount; ?>">
			<input type="hidden" name="offerID" value="<?php echo $offerID; ?>">
			<input type="hidden" name="upto" value="<?php echo $offerupto; ?>">
			<input type="hidden" name="minorder" value="<?php echo $offerminorder; ?>">
			<input type="hidden" name="code" value="<?php echo $offercode; ?>">
			<button class="hiddenbutton">
			<div>
			<center><img src="image/order.png" alt="OrderOffer" style="width:240px;height:270px;"></center>
			</div>
			<div style="margin-top:30px;width:250px;" >
			<font style="font-weight:900;margin:00px 00px 00px 32px;font-size:20px;font-family:cursive;color:white;">Upto: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offerupto"?> Rs.</font>
			</div>
			<div style="margin-top:15px;width:250px;" >
			<font style="margin:00px 00px 00px 32px;font-weight:900;font-size:20px;font-family:cursive;color:white;">Minorder: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offerminorder"?> Rs.</font>
			</div>
			<div style="margin-top:15px;">
			<font style="margin:00px 00px 00px 32px;font-weight:900;font-size:20px;font-family:cursive;color:white;">Code: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offercode"?></font>
			</div>
			<span class="badge"><?php echo $offerdiscount;?></span>
			</button>
			</form></a>
			<?php
		}
		else
		{
			$offerproductID=$offerrow["productID"];
			$offerresult1=mysqli_query($con,"SELECT * FROM $provID WHERE productID='$offerproductID'");
			$offerrow1= mysqli_fetch_array( $offerresult1);
			$offername=$offerrow1['productname'];
			$offerprice=$offerrow1['productprice'];
			$imagetmp1=$offerrow1['productimagetmp'];
			$newprice=$offerprice*(100-$offerdiscount)/100;
			?>
			<a><form style="width:300px;" method="POST" action="offerupdate.php">
			<input type="hidden" name="typeoffer" value="item">
			<input type="hidden" name="discount" value="<?php echo $offerdiscount; ?>">
			<input type="hidden" name="offerID" value="<?php echo $offerID; ?>">
			<button  class="hiddenbutton">
			<div>
			<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp1)."' alt='ProductOffer' width='240px' height='270px' >";?></center>
			</div>
			<div style="margin-top:30px;width:250px;" >
			<font style="font-weight:900;margin:00px 00px 00px 32px;font-size:20px;font-family:cursive;cursive;color:white;">Product ID: </font><font style="cursive;color:white;font-size:20px;font-family:cursive;"><?php echo "$offerproductID"?></font>
			</div>
			<div style="margin-top:15px;width:250px;" >
			<font style="margin:00px 00px 00px 32px;font-weight:900;font-size:20px;font-family:cursive;cursive;color:white;">Name: </font><font style="cursive;color:white;font-size:20px;font-family:cursive;"><?php echo "$offername"?></font>
			</div>
			<div style="margin-top:15px;">
			<font style="margin:00px 00px 00px 32px;font-weight:900;font-size:20px;font-family:cursive;cursive;color:white;">Price: </font><font style="cursive;color:white;font-size:20px;font-family:cursive;"><strike><?php echo "$offerprice"?></strike> / <?php echo "$newprice"?> Rs.</font>
			</div>
			<span class="badge"><?php echo $offerdiscount;?></span>
			</button></form>
			</a>
			<?php
		}
	}
	
?>
</div>
</body>
</html>