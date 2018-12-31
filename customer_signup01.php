<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$add=$_POST['add'];
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
$qry = "INSERT INTO `customer`(name,email,password,address,pincode,area,city,state,contactnumber,imagetmp,imagename) VALUES('$name','$email','$password','$add','$pincode','$area','$city','$state','$contact','$imagetmp','$imagename')";
if(mysqli_query($con,$qry))
{		echo $email;
		$result=mysqli_query($con,"SELECT customerID  FROM customer WHERE email='$email'");
	$n=mysqli_fetch_array($result);
$tb='customer'.$n['customerID'];
echo $tb;
  $var="CREATE TABLE $tb (buyingID BIGINT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,purchaseID BIGINT(255) NOT NULL,providerID BIGINT(255) NOT NULL,productID BIGINT(255) NOT NULL,productname VARCHAR(300) NOT NULL,productprice BIGINT(6) NOT NULL,quantity BIGINT(6) NOT NULL,arrived INT(10) NOT NULL)";
	//echo $var;
  if(mysqli_query($con,$var))
{ echo "created";
}else{echo "Not";}
  echo '<script>alert("Successfully signed up!!!");location="customer_login.php";</script>';
  }
else {
		echo '<script>alert("Account already exists!!!");location="customer_signup.php";</script>';
	}	
}
?>
