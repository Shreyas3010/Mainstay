<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$add=$_POST['add'];
$type=$_POST['typef'];
	$multi=0;
	$thai=0;
	$parsi=0;
	$italian=0;
	$american=0;
	$chinese=0;
	$indian=0;
	$gujarati=0;
	$rajasthani=0;
	$punjabi=0;
	$south=0;
if( empty($_POST["multi"]) )
{
			if(!empty($_POST["thai"]))
			{
				$thai=1;
			}
			if(!empty($_POST["parsi"]))
			{
				$parsi=1;
			}
			if(!empty($_POST["italian"]))
			{
				$italian=1;
			}
			if(!empty($_POST["american"]))
			{
				$american=1;
			}
			if(!empty($_POST["chinese"]))
			{
				$chinese=1;
			}
			if(!empty($_POST["indian"]))
			{
				$indian=1;
				if(!empty($_POST["gujarati"]))
				{
					$gujarati=1;
				}
				if(!empty($_POST["rajasthani"]))
				{
					$rajasthani=1;
				}
				if(!empty($_POST["punjabi"]))
				{
					$punjabi=1;
				}
				if(!empty($_POST["south"]))
				{
					$south=1;
				}
			}
}
else
{
	$multi=1;
}
//echo $foodtype;
$pincode=$_POST['pincode'];$area=$_POST['area'];
$city=$_POST['city'];$state=$_POST['state'];
$contact=$_POST['contact'];
$imagename=$_FILES['profileimage']['name'];
$imagetmp=addslashes(file_get_contents($_FILES['profileimage']['tmp_name']));
//echo $name;
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");

	   if($name!=NULL){
$qry = "INSERT INTO `provider`(name,email,password,address,pincode,area,city,state,contactnumber,imagetmp,imagename,offer,type,multi,thai,parsi,italian,american,chinese,indian,gujarati,rajasthani,punjabi,south) VALUES('$name','$email','$password','$add','$pincode','$area','$city','$state','$contact','$imagetmp','$imagename',0,'$type','$multi','$thai','$parsi','$italian','$american','$chinese','$indian','$gujarati','$rajasthani','$punjabi','$south')";
//error
//echo $qry;
if(mysqli_query($con,$qry))
{
	echo "done";
		$result=mysqli_query($con,"SELECT providerID  FROM provider WHERE email='$email'");
	$n=mysqli_fetch_array($result);
$tb='provider'.$n['providerID'];
#echo $tb;
  $var="CREATE TABLE $tb (productID BIGINT(200) UNSIGNED AUTO_INCREMENT PRIMARY KEY,productname VARCHAR(300) NOT NULL,productprice BIGINT(6) NOT NULL,productimagetmp LONGBLOB NOT NULL,productimagename VARCHAR(300) NOT NULL)";
	#echo $var;
  if(mysqli_query($con,$var))
{ echo "created";
}else{echo "Not";}
   echo '<script>alert("Successfully signed up!!!");location="provider_login.php";</script>';
  }
else{
	//	echo '<script>alert("Account already exists!!!");location="provider_signup.php";</script>';
	}	
}
?>
