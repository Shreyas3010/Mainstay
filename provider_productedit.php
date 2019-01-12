<?php
session_start();
$ID=$_SESSION["providerID"];
?>
<html>
<style>
.button1 {
	   border-radius: 4px;
    position: relative;
    background-color:#9b9595;
    border: none;
    font-size: 20px;
    color: #FFFFFF;
    padding: 20px;
    width:10%;
	font-family:cursive;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
	margin-left:85%;
	
	}

.button1:after {
    content: "";
    background:#c6c0c0;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button1:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}

.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button1 span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button1:hover span {
  padding-right: 25px;
}

.button1:hover span:after {
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
	width:220;
	height:250;
}

.ab0{
	float:left;
	witdh:19%;
	margin-left:10%;
	height:25%;
	margin-top:300px;
}

.ab1{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:300px;
}

.ab2{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:300px;
}

.ab3{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:300px;
}
.ab10{
	float:left;
	witdh:19%;
	margin-left:10%;
	height:25%;
	margin-top:70px;
}

.ab11{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:70px;
}

.ab12{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:70px;
}

.ab13{
	
	float:left;
	witdh:19%;
	margin-left:5%;
	height:25%;
	margin-top:70px;
}

.itemtitle
{
	margin-top:50px;
	font-size:50px;
	font-weight:900;
	font-family:"Courier New", Courier, monospace;
	font-variant: small-caps;
}
<!--.x{
	width:100%;
	height:30%;
}
.y{
	width:100%;
	height:5%;
}
.z{
	width:100%;
	height:5%;
}-->
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

<center><p class="itemtitle" >List Of The Items Those You Have !</p></center>
<form action = "provider_productedit01.php" method="post">

<button class="button1"  type="submit" ><span>Change</span></button>
<?php
	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"mainstay")or
 die("Could not select db: " . mysql_error());
	$a="provider".$ID;
	$result=mysqli_query($con,"SELECT * FROM $a ");
	$j=0;
	$di=4;
	$sk=0;
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
		$nam="productname".$j;
		$_SESSION["$nam"]=$na;
		$pri=$row['productprice'];
		$pri1="productprice".$j;
		$_SESSION["$pri1"]=$pri;
		$imagetmp=$row['productimagetmp']
	?>
		<form >
		<div class=<?php echo "$abc"?>>
		<div style="width:240px;height:270px;">
		<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='240px' height='270px' >";?></center>
		</div>
		<div style="margin-top:30px;width:250px;" >
		<center><font style="font-weight:900;font-size:25px;font-family:cursive;">Name:</font><input style="border:none;font-size:25px;width:300px;font-family:cursive;" name="<?php echo "$sk"?>" value="<?php echo "$na"?>"></input></center>
		</div>
		<?php $sk++ ?>
		<div style="margin-top:15px;">
		<center><font style="font-weight:900;font-size:25px;font-family:cursive;">Price:</font><input style="border:none;font-size:25px;width:100px;font-family:cursive;" name="<?php echo "$sk"?>" value="<?php echo "$pri"?>"></input><font style="font-size:25px;font-family:cursive;">  Rs.</font></center>
		</div>
		</div>	
	<?php 
		$j++;
		$sk++;
	} 
	$_SESSION['NOPRODUCT']=$j;
	?>	
</form>
</body>
</html>