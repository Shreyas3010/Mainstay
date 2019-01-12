<?php
session_start();
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");			
		$type=$_POST["type"];
		$providerID=$_POST["providerID"];
		$pID="provider".$providerID;
		$cID=$_SESSION['customerID'];
		$store1="SELECT * FROM provider where providerID='$providerID'";
		$store1=mysqli_query($con,$store1);
		$store1= mysqli_fetch_array($store1);
		$result12=mysqli_query($con,"SELECT * FROM temppurchaserecord where customerID=$cID ");
		$numoftemp12=mysqli_num_rows($result12);
		if($numoftemp12!=0)
		{
				while($row12= mysqli_fetch_array($result12))
						{
							$searchedproviderID=$row12['providerID'];
						}
						if($searchedproviderID!=$providerID)
						{
							//echo $searchedproviderID;
							//echo $providerID;
							
							echo '<script type="text/javascript">alert("You already have something in the cart !!");location="customerproviderproduct99.php";</script>';
						}
						else if($searchedproviderID==$providerID && $_SESSION['flagforshop1']==0)
						{
							$_SESSION['flagforshop1']=1;
							echo '<script type="text/javascript">alert("You already have something in the cart from this Shop only !!");</script>';
						}	
		}
?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.button {
  border-radius:5px;
  background-color: #003366;
  border: none;
  color: #CCCC99;
  text-align: center;
  font-size: 40px;
  font-weight:900;
  padding: 5px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  font-family:"Courier New", Courier, monospace;
  font-variant: small-caps;
  
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}


.bt{
    background-color:transparent;
	height:50px;
	width:50px;
    border: none;
    cursor: pointer;
	margin-left:1430px;
	
}

.dropdown {
    position: relative;
    display: inline-block;
	width:60px;
	
}

.dropdown-content {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	margin-left:1350px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    border-style:solid;
    border-width:1.5px;
	border-color:red;
	background-color:black;
	color:white;
	opacity:0.2;
    filter: alpha(opacity=20);
	
	}

.dropdown:hover .dropdown-content {
    display: block;
	 background-color:#f9f9f9;
	opacity:1.0;
    filter: alpha(opacity=100);

}

.bt:hover{
	border-style:solid;
    border-width:1.5px;
	border-color:#0d3d0d;
	background-color:transparent;
}
.a{
float:left;
background-color:transparent;
width:100%;
height:60px;
}
img:hover {
  animation: shake 2.5s;
  animation-iteration-count: infinite;

}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}

.ab0{
	float:left;
	witdh:19%;
	margin-left:10%;
	height:25%;
	margin-top:350px;
}

.ab1{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:350px;
}

.ab2{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:350px;
}

.ab3{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:350px;
}
.ab10{
	float:left;
	witdh:19%;
	margin-left:10%;
	height:25%;
	margin-top:100px;
}

.ab11{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:100px;
}

.ab12{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:100px;
}

.ab13{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:100px;
}
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color:#ff4d4d;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.storetitle
{
	margin-top:50px;
	font-size:30px;
	font-weight:900;
	color:#587058;
	font-family:cursive;
}
</style>
<body style='background-color:white;'>
<center><p class="storetitle">Selling items in the <?php echo $store1['name'] ?></p></center>
<!--<button style="margin-left:98%;" onclick="location.href='customerproviderproductcancel.php'" ><i class="fa fa-close"></i></button>-->
<form  method="post" enctype="multipart/form-data" >
<center><button name="buy" class="button" type="submit"><span>Buy </span></button></center>
<input type="hidden" name="type" value=<?php echo "$type"?>>
<input type="hidden" name="providerID" value=<?php echo "$providerID"?>>
<?php
						$res1="SELECT * FROM $pID";
						//echo $res1;
						$result1=mysqli_query($con,$res1);
						//$no=mysqli_num_rows($result1);
						//echo $no;
						$no=0;
						$di=4;
						while($row2= mysqli_fetch_array( $result1))
						{
							$mo=$no%$di;
							if($no<4)
							{
								$abc="ab1".$mo;
							}
							else
							{
								$abc="ab".$mo;
							}
							$na=$row2['productname'];
							$pri=$row2['productprice'];
							$imagetmp=$row2['productimagetmp'];
							$imagename=$row2['productimagename'];
							$productID=$row2['productID'];
							$offercount=mysqli_query($con,"SELECT * FROM offerlist WHERE providerID='$providerID' AND productID='$productID'");
							$offercount1=mysqli_num_rows($offercount);
							if($offercount1!=0)
							{
								$offerresult= mysqli_fetch_array($offercount);
								$discount=$offerresult['discount'];
								$newprice=(100-$discount)*$pri/100;
								?>
							<div class=<?php echo "$abc"?>>
							<label class="container">
							<input type="checkbox" id="<?php echo "$no"?>" name="<?php echo "$no"?>"	>
							<span class="checkmark"></span>
							</label>
							<div style="width:240px;height:270px;">
							<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='240px' height='270px' >";?></center>
							<?php 
							//$lm1="pic".$no;
							$lm2="name".$no;
							$lm3="price".$no;
							
							$lm5="prod".$no;
							//$lm6="picname".$no;
							//$_SESSION["$lm1"]=$imagetmp;
							//$_SESSION["$lm6"]=$imagename;
							$_SESSION["$lm2"]=$na;
							$_SESSION["$lm3"]=$newprice;
							//$_SESSION["$lm4"]=$proid;
							$_SESSION["$lm5"]=$row2['productID'];
							$lm7="qun".$no;
							
							?>
							</div >
							<div style="margin-top:30px;width:250px;" >
							<center><font style="font-weight:900;font-size:25px;">Name: </font><font style="font-size:25px;"><?php echo "$na"?></font></center>
							</div>
							<div style="margin-top:15px;">
							<center><font style="font-weight:900;font-size:25px;">Price: </font><font style="font-size:25px;"><strike><?php echo "$pri"?></strike> <?php echo "$newprice"?> Rs.</font></center>
							</div>
							<div style="margin-top:15px;">
							<center><font style="font-weight:900;font-size:25px;">Quantity: </font><input size="3" type="digit" name="<?php echo "$lm7" ?>" value="1"></center>
							</div>
							</div>
							<?php
							}
							else
							{
								?>
							<div class=<?php echo "$abc"?>>
							<label class="container">
							<input type="checkbox" id="<?php echo "$no"?>" name="<?php echo "$no"?>"	>
							<span class="checkmark"></span>
							</label>
							<div style="width:240px;height:270px;">
							<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='240px' height='270px' >";?></center>
							<?php 
							//$lm1="pic".$no;
							$lm2="name".$no;
							$lm3="price".$no;
							
							$lm5="prod".$no;
							//$lm6="picname".$no;
							//$_SESSION["$lm1"]=$imagetmp;
							//$_SESSION["$lm6"]=$imagename;
							$_SESSION["$lm2"]=$na;
							$_SESSION["$lm3"]=$pri;
							//$_SESSION["$lm4"]=$proid;
							$_SESSION["$lm5"]=$row2['productID'];
							$lm7="qun".$no;
							
							?>
							</div >
							<div style="margin-top:30px;width:250px;" >
							<center><font style="font-weight:900;font-size:25px;">Name: </font><font style="font-size:25px;"><?php echo "$na"?></font></center>
							</div>
							<div style="margin-top:15px;">
							<center><font style="font-weight:900;font-size:25px;">Price: </font><font style="font-size:25px;"><?php echo "$pri"?> Rs.</font></center>
							</div>
							<div style="margin-top:15px;">
							<center><font style="font-weight:900;font-size:25px;">Quantity: </font><input size="3" type="digit" name="<?php echo "$lm7" ?>" value="1"></center>
							</div>
							
							</div>
							<?php
							}
							?>
							<?php
						$no++;
						}
?>
<input type="hidden" name="totalproduct" value="<?php echo $no;?>">
</form>
</body>
</html>
<?php
	if(isset($_POST['buy']))
	{
		$flag=0;
		$noofpro=$_POST['totalproduct'];
		$cID=$_SESSION["customerID"];
		$providerID=$_POST['providerID']; //input
		$type=$_POST['type']; //input
		$no=0;
		$result1=mysqli_query($con,"SELECT * FROM temppurchaserecord where customerID=$cID and providerID='$providerID'");
		$numoftemp=mysqli_num_rows($result1);
		if($numoftemp==0)
		{
			$temppurchaseID="INSERT INTO temppurchaserecord (customerID,providerID,type)VALUES ('$cID','$providerID','$type')";
		    mysqli_query($con,$temppurchaseID);
		}
		else
		{
			$flag=1;
		}
		$i15=mysqli_query($con,"SELECT * FROM temppurchaserecord WHERE customerID='$cID' and providerID='$providerID'");
		
		
		while($tmppurID=mysqli_fetch_array($i15))
		{
				$temppurchaseID=$tmppurID['temppurchaseID'];
				$totalamount=$tmppurID['totalamount'];
		}
		while($no<$noofpro)
		{ 
	    if(!empty($_POST["$no"]))
		{
		$flag=1;
		$lm2="name".$no;
		$lm3="price".$no;
		$lm5="prod".$no;
		$pname=$_SESSION["$lm2"];
	    $price=$_SESSION["$lm3"];
		$productID=$_SESSION["$lm5"];
		$lm7="qun".$no;
		$qun=$_POST["$lm7"];
		$totalamount=$totalamount+$price*$qun;
		$i25=mysqli_query($con,"SELECT * FROM temppurchase WHERE customerID='$cID' and productID='$productID'");
		$i26=mysqli_fetch_array($i25);
		if($i26['quantity']==0)
		{
			$qu1="INSERT INTO temppurchase (temppurchaseID,customerID,providerID, productID, productname,productprice,quantity)VALUES ('$temppurchaseID','$cID','$providerID', '$productID','$pname','$price','$qun')";
			mysqli_query($con,$qu1);
		}
		else
		{
			$qun=$qun+$i26['quantity'];
			mysqli_query($con,"UPDATE temppurchase SET quantity='$qun' WHERE customerID='$cID' and productID='$productID'");
		}
		}
			$no++;
		}
		if($flag==0)
		{
			mysqli_query($con,"DELETE FROM temppurchaserecord WHERE temppurchaseID='$temppurchaseID'");
			echo '<script type="text/javascript">alert("Please, select atleast one item !");</script>';
		}
		else
		{
			mysqli_query($con,"UPDATE temppurchaserecord SET totalamount='$totalamount' WHERE temppurchaseID='$temppurchaseID'");
			echo '<script type="text/javascript">alert("Okay,this is your order. See if any code is aplicable !");location="customerproviderproduct99.php";</script>';
		}
	}
	
?>