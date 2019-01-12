<?php
session_start();
$cID=$_SESSION["customerID"];
$email=$_SESSION["EMAIL"];

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
mysqli_select_db($con,"mainstay")or
 die("Could not select db: " . mysql_error());
	
	$result=mysqli_query($con,"SELECT * FROM customer WHERE email='$email'");
	$n=mysqli_fetch_array($result);
	$pincode=$n['pincode'];
	$city=$n['city'];
	$type=$_POST['typest'];
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.flip-card {
  background-color: transparent;
  width: 400px;
  height: 400px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: transparent;
  color: black;
  z-index: 2;
}

.flip-card-back {
  background-color: black;
  color: white;
  transform: rotateY(180deg);
  z-index: 1;
}
.bt{

	width:100%;
	height:100%;
	background-color: transparent;
	border: none;

}
.a{
float:left;
background-color:transparent;
width:100%;
height:60px;
}

.ab0{
	float:left;
	witdh:390px;
	margin-left:70px;
	height:500px;
	margin-top:40px;
}

.ab1{
	
	float:left;
	witdh:390px;
	margin-left:60px;
	height:500px;
	margin-top:40px;
}

.ab2{
	
	float:left;
	witdh:390px;
	margin-left:60px;
	height:500px;
	margin-top:40px;
}
.ab10{
	float:left;
	witdh:390px;
	margin-left:70px;
	height:500px;
	margin-top:30px;
}

.ab11{
	
	float:left;
	witdh:390px;
	margin-left:60px;
	height:500px;
	margin-top:30px;
}

.ab12{
	
	float:left;
	witdh:390px;
	margin-left:60px;
	height:500px;
	margin-top:30px;
}
.dot {
  height: 10px;
  width: 10px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  margin-left:100px;
}
.inblockback{
	
	font-family:"Comic Sans MS", cursive, sans-serif;
}
.inblockfront{
	
	font-family:"Courier New", Courier, monospace;
	font-weight:900;
}
.ti{
	margin-top:10px;
	font-size:30px;
	font-weight:900;
	color:#998877;
	font-family:cursive;
}
.stt{
background-color:black;color:white;border:none;font-family:'Courier New', Courier, monospace;
}

.dropdown {
    position: absolute;
    display: inline-block;
	background-color:black;
	margin-left:10px;
}

.dropdown-content {
    display: none;
    position: absolute;
	font-size: 17px;
    background-color:black;
    min-width: 78px;
	width:200px;
 
}

.dropdown-content form {
    color: white;
    text-decoration: none;
    
}

.dropdown-content form:hover {color:#ba160c}

.dropdown:hover .dropdown-content {
    display: block;
}
.stt:hover, .dropdown:hover .btn {
     background-color:white;
     color: black;
}

</style>
</head>
<body style='background-color:black;'>
 <div class="dropdown">
  <button class="stt">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content">
  <br>
  <form method="POST" action="storetype.php" target="target"><input type="hidden" name="typest" value="Baked"><button type="submit" class="stt">Bakery</button></form>
  <form method="POST" action="storetype.php" target="target"><input type="hidden" name="typest" value="Dairy"><button type="submit" class="stt">Dairy Product</button></form>
  <form method="POST" action="storetype.php" target="target"><input type="hidden" name="typest" value="Stationary"><button type="submit" class="stt">Stationary Store</button></form>
  <form method="POST" action="storetype.php" target="target"><input type="hidden" name="typest" value="Grocery"><button type="submit" class="stt">Grocery Store</button></form>
  <form method="POST" action="storetype.php" target="target"><input type="hidden" name="typest" value="Cuisine"><button type="submit" class="stt">Restaurant</button></form>
  </div>
</div>
<br>
<br>
<br>
<?php
if($type=="Baked")
{
	?>
	<center><p class="ti">Bakery in <?php echo $city?></p></center>
	<?php
}
else if($type=="Cuisine")
{
	?>
	<center><p class="ti">Restaurants in <?php echo $city?></p></center>
<?php
}
else if($type=="Dairy")
{
	?>
	<center><p class="ti"><?php echo $type?> Product Stores in <?php echo $city?></p></center>
	<?php
}
else
{
	?>
	<center><p class="ti"><?php echo $type?> Stores in <?php echo $city?></p></center>
<?php
}
?>
<?php
	//$a="provider".$ID;
	$result=mysqli_query($con,"SELECT * FROM provider WHERE city='$city' and type='$type'");
	$pID=0;
	$di=3;
	$no=mysqli_num_rows($result);
	if($no==0)
	{
		echo '<script>alert("Number of Stores is Zero !");location="customerprovider.php";</script>';
	}
	//echo "<script >alert('$no');</script>";	
	while($row1= mysqli_fetch_array( $result) )
	{
		//echo "<script >alert('$provid');</script>";
		//echo "<script >alert('aa');</script>";			
		//$res1="SELECT * FROM '$prid' ";
		//$res1="SELECT * FROM $prid WHERE 1";
		//$sql= "SELECT * FROM '$prid' ";
		//echo "<script >alert('$res1');</script>";
		//$result1 = $con->query($sql);
		//$result1=mysqli_query($con,$res1);
		//$no2=mysqli_num_rows($result1);
		//$no2=$result1->num_rows;
		//echo "<script >alert('a$no2');</script>";
		//echo $result1;
		$mo=$pID%$di;
		if($pID<3)
		{
			$abc="ab1".$mo;
		}
		else
		{
			$abc="ab".$mo;
		}
		$imagetmp=$row1['imagetmp'];
		$imagename=$row1['imagename'];
		$name=$row1['name'];
		$providerID=$row1['providerID'];
		$type=$row1['type'];
		//echo $type;
		//echo $row1[1];
		if($row1['type']!="Cuisine")
		{
			?>
				<div class=<?php echo "$abc"?>>
				<form action="customerproviderproduct.php" method="POST">
				<button class="bt" type="submit">
				<div class="flip-card">
				<div class="flip-card-inner">
				<div class="flip-card-front">
				<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='100%' height='100%' >";?></center>
				<br><font class="inblockfront" style="font-size:25px;color:#909090;"><?php echo "$name"?></font>
				</div >
		
				<div class="flip-card-back">
				<input type="hidden" name="providerID" value=<?php echo "$providerID"?>>
				<input type="hidden" name="name" value=<?php echo "$name"?>>
				<input type="hidden" name="type" value=<?php echo "$type"?>>
				<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> <?php echo "$type" ?> Products</font></p>
				<font class="inblockback"  style="font-size:20px;margin-top:100px;color:#909090;"><?php echo $row1['address']?>, <?php echo $row1['city']?></font>
				</div>
				</div>
				</div>
				</button>
				</form>
				</div>
			
			
			<?php
		}
		else
		{
			if($row1['multi']==1)
			{
				?>
				<div class=<?php echo "$abc"?>>
				<form action="customerproviderproduct.php" method="POST">
				<button class="bt" type="submit">
				<div class="flip-card">
				<div class="flip-card-inner">
				<div class="flip-card-front">
				<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='100%' height='100%' >";?></center>
				<br><font class="inblockfront" style="font-size:25px;color:#909090;"><?php echo "$name"?></font>
				</div >
				<div class="flip-card-back">
				<input type="hidden" name="providerID" value=<?php echo "$providerID"?>>
				<input type="hidden" name="name" value=<?php echo "$name"?>>
				<input type="hidden" name="type" value=<?php echo "$type"?>>
				<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Multi Cuisine</font></p>
				<font class="inblockback"  style="font-size:20px;margin-top:100px;color:#909090;"><?php echo $row1['address']?>, <?php echo $row1['city']?></font>
				</div>
				</div>
				</div>
				</button>
				</form>
				</div>
				<?php
			}
			else
			{
				if($row1['indian']==1 and $row1['parsi']!=1 and $row1['thai']!=1 and $row1['italian']!=1 and $row1['american']!=1 and $row1['chinese']!=1 )
				{
				?>
				<div class=<?php echo "$abc"?>>
				<form action="customerproviderproduct.php" method="POST">
				<button class="bt" type="submit">
				<div class="flip-card">
				<div class="flip-card-inner">
				<div class="flip-card-front">
				<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='100%' height='100%' >";?></center>
				<br><font class="inblockfront" style="font-size:25px;color:#909090;"><?php echo "$name"?></font>
				</div >
				<div class="flip-card-back">
				<input type="hidden" name="providerID" value=<?php echo "$providerID"?>>
				<input type="hidden" name="type" value=<?php echo "$type"?>>
				<input type="hidden" name="name" value=<?php echo "$name"?>>
				<?php
				if($row1['gujarati']==1)
				{
					?>
				<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Gujarati Cuisine</font></p>
					<?php
					
				}
				if($row1['rajasthani']==1)
				{
					?>
					<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Rajasthani Cuisine</font></p>
					
					<?php
					
				}
				if($row1['punjabi']==1)
				{
					?>
					<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Punjabi Cuisine</font></p>
					<?php
					
				}
				if($row1['south']==1)
				{
					?>
					<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;" > South Indian Cuisine</font></p>
					<?php
					
				}
				?>
				<font class="inblockback"  style="font-size:20px;margin-top:100px;color:#909090;"><?php echo $row1['address']?>, <?php echo $row1['city']?></font>
				</div>
				</div>
				</div>
				</button>
				</form>
				</div>		
				<?php	
				}
				else
				{
					?>
					
					
					<div class=<?php echo "$abc"?>>
				<form action="customerproviderproduct.php" method="POST">
				<button class="bt" type="submit">
				<div class="flip-card">
				<div class="flip-card-inner">
				<div class="flip-card-front">
				<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='100%' height='100%' >";?></center>
				<br><font class="inblockfront" style="font-size:25px;color:#909090;"><?php echo "$name"?></font>
				</div >
				<div class="flip-card-back">
				<input type="hidden" name="providerID" value=<?php echo "$providerID"?>>
				<input type="hidden" name="type" value=<?php echo "$type"?>>
				<input type="hidden" name="name" value=<?php echo "$name"?>>
				<?php
				if($row1['thai']==1)
				{
					?>
					<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Thai Cuisine</font></p>
					<?php
					
				}
				if($row1['parsi']==1)
				{
					?>
					<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Parsi Cuisine</font></p>
					<?php
					
				}
				if($row1['italian']==1)
				{
					?>
					<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Italian Cuisine</font></p>
					<?php
					
				}
				if($row1['indian']==1)
				{
					?>
					<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Indian Cuisine</font></p>
					<?php
					
				}
				if($row1['american']==1)
				{
					?>
				<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> American Cuisine</font></p>
					<?php
					
				}
				if($row1['chinese']==1)
				{
					?>
					<p align="left"><span class="dot"></span><font class="inblockback" style="font-size:25px;"> Chinese Cuisine</font></p>
					<?php
					
				}
				?>
				<font class="inblockback"  style="font-size:20px;margin-top:100px;color:#909090;"><?php echo $row1['address']?>, <?php echo $row1['city']?></font>
				</div>
				</div>
				</div>
				</button>
				</form>
				</div>
					
					<?php
				}
			}
		}
		$pID++;
	} 	
		?>		
</body>
</html>