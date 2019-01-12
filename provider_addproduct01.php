<html>
<body>
<?php
session_start();
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");
$j=1;
$no=$_POST['noproduct'];
#echo $no;
$pid='provider'.$_SESSION["providerID"];
#echo $pid;
$flag=1;
for($x=1;$x<=$no;$x++)
{
$productname=$_POST["$j"];
#echo $productname;
$j++;
$productprice=$_POST["$j"];
#echo $productprice;
$j++;
$j1="product".$j;
#echo $j1;
$productimagename=$_FILES["$j1"]['name'];
$productimagetmp=addslashes(file_get_contents($_FILES["$j1"]['tmp_name']));
//$productimagename=$_FILES["$j1"]["name"];
//$productimagetmp=addslashes(file_get_contents($_FILES["$j1"]["tmp_name"]));
//echo $productimagename;
//echo $productimagetmp;
//echo "<img src='data:image/png;base64,".base64_encode($productimagetmp)."' alt='Product' width='240' height='270' >";
$j++;	
$qry = "INSERT INTO $pid (productname,productprice,productimagetmp,productimagename) VALUES('$productname','$productprice','$$productimagetmp','$productimagename')";
#$qry = "INSERT INTO $pid (productname,productprice) VALUES('$productname','$productprice',)";
if(mysqli_query($con,$qry))
{
	
}
else {
		$flag=0;
		echo '<script>alert("Can not be added!!!");</script>';
	}
}
if($flag)
{
		echo '<script>alert("All items are added!!!");</script>';
		#location="provider_product.php";
		}
else
{
	echo '<script>alert("Rest of the items are added!!!");</script>';
	#location="provider_product.php";
	}

?>
</body>
<html>