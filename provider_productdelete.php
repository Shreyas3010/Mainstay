<?php
session_start();
$ID=$_SESSION["providerID"];
?>
<html>
<style>
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  font-family:cursive;
  
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

<center><p class="itemtitle">List Of The Items Those You Have !</p></center>
<form action = "provider_productdelete01.php" method="post">
<center><button class="button" type="submit"><span>Delete</span></button></center>
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
		$imagetmp=$row['productimagetmp'];
		$productID=$row['productID'];
		
	?>
		<div class=<?php echo "$abc";?> >
		<label class="container">
		<input type="checkbox" id="<?php echo "$productID"?>" name="<?php echo "$productID"?>"	>
		<span class="checkmark"></span>
		</label>
		<div style="width:240px;height:270px;">
		<center><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Product' width='240' height='270' >";?></center>
		</div>
		<div style="margin-top:30px;width:250px;" >
		<center><font style="font-weight:900;font-size:25px;font-family:cursive;">Name:</font><font style="font-size:25px;font-family:cursive;"><?php echo "$na"?></font></center>
		</div>
		<div style="margin-top:15px;">
		<center><font style="font-weight:900;font-size:25px;font-family:cursive;">Price:</font><font style="font-size:25px;font-family:cursive;"><?php echo "$pri"?>  Rs.</font></center>
		</div>
		</div>	
	<?php 
		$j++;
	} ?>	
</form>
</body>
</html>
