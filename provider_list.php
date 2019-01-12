<?php
session_start();
$ID=$_SESSION["providerID"];
?>
<html>
<style>
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
	margin-top:50px;
}

.ab11{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:50px;
}

.ab12{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:50px;
}

.ab13{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:50px;
}
.itemtitle
{
	margin-top:50px;
	font-size:50px;
	font-weight:900;
	font-family:"Courier New", Courier, monospace;
	font-variant: small-caps;
}
</style>
<body style='background-color:white'>
<div class="a">
<div  class="dropdown">
<button class="bt"><img src="image/option.png" alt="Option" style="width:40px;height:40px;"></button>
  <div class="dropdown-content">
    <a href="provider_addproduct.php" style="font-family:cursive;">Add</a>
    <a href="provider_list.php" style="font-family:cursive;">List</a>
	<a href="provider_productedit.php" style="font-family:cursive;">Edit</a>
    <a href="provider_productdelete.php" style="font-family:cursive;">Delete</a>
  </div>
</div>
</div>

<center><p class="itemtitle">List Of The Items Those You Have !</p></center>
<?php
	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
    die("Could not select db: " . mysql_error());
	
	$a="provider".$ID;
	$result=mysqli_query($con,"SELECT * FROM $a ");
	$j=0;
	$di=4;
	while($row = mysqli_fetch_array( $result ) )
	{ 	
		$mo=$j%$di;
		if($j<4)
		{
			$abc="ab1".$mo;
		}
		else
		{
			$abc="ab".$mo;
		}
		$na=$row['productname'];
		$pri=$row['productprice'];
		$imagetmp=$row['productimagetmp'];
		$productID=$row['productID'];
	?>
		<div class=<?php echo "$abc"?>>
		
		<div style="width:240px;height:270px;">
		<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='240' height='270' >";?></center>
		</div>
		<div style="margin-top:30px;width:250px;" >
		<center><font style="font-weight:900;font-size:25px;font-family:cursive;">Product ID:</font><font style="font-size:25px;font-family:cursive;"><?php echo "$productID"?></font></center>
		</div>
		<div style="margin-top:15px;width:250px;" >
		<center><font style="font-weight:900;font-size:25px;font-family:cursive;">Name:</font><font style="font-size:25px;font-family:cursive;"><?php echo "$na"?></font></center>
		</div>
		<div style="margin-top:15px;">
		<center><font style="font-weight:900;font-size:25px;font-family:cursive;">Price:</font><font style="font-size:25px;font-family:cursive;"><?php echo "$pri"?>  Rs.</font></center>
		</div>
		</div>	
	<?php 
		$j++;
	} ?>	



</body>
</html>