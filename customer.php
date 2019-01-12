<?php

session_start();
$email=$_SESSION['EMAIL'];

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"mainstay")or
 die("Could not select db: " . mysql_error());
 $result=mysqli_query($con,"SELECT * FROM customer WHERE email='$email'");
$n=mysqli_fetch_array($result);

?>


<!DOCTYPE html>

<html><head>
<title>Customer</title></head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>

.b{
background-color:#f1f1f1;
float:right;
width:100%;
height:711px;
}
#imp{
float:left;
background-color:black;
width:100%;
height:40px;
}
.btn {
   
    width:100px;
	height:40px;
	border:none;
    color:white;
	float:right;
    background:Transparent;
    padding: 3px 00px 00px 00px;
	font-size:17px;
	font-family:"Courier New", Courier, monospace;
}
.bt2{
	padding: 3px 00px 00px 20px;
	background:transparent;
	border: none;
	font-size:25px;
	font-family:"Courier New", Courier, monospace;
	font-variant: small-caps;
}
.btn:hover{
	color:#ba160c;
}
</style>

<body>
<div id="imp"><a href="customerhome.php" target="target"><button class="bt2"><span style="border:none;color:#eee8aa;width:50px;"><?php echo $n['name'];  ?></span></button></a>
<a href="logout.php"><span style="color:#F5F5F5;"><button class="btn" style="margin-right:40px;">LOGOUT</button></span>
<a href="customerorder.php" target="target"><span style="color:#F5F5F5;"><button type="submit" class="btn" >ORDER</button></span></a>
<a href="customerprovider.php" target="target"><span style="color:#F5F5F5;"><button type="submit" class="btn">STORES</button></span></a>
<a  href="customermainpage.php" target="target"><span style="color:#F5F5F5;"><button type="submit" class="btn">HOME</button></span></a>
</div>
<div class="b"><iframe src="customermainpage.php" style="border:none;" width="100%" height="100%"  name="target"></iframe>
</div>
</body>
</html>
