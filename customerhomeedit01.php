<?php
$name=$_POST['name'];
$password=$_POST['password'];
$add=$_POST['add'];
$pincode=$_POST['pincode'];$area=$_POST['area'];
$city=$_POST['city'];$state=$_POST['state'];
$contact=$_POST['contactnumber'];
session_start();
		$_SESSION["NAME"]=$name;
		$_SESSION["PASSWORD"]=$password;
		$email=$_SESSION["EMAIL"];
		$_SESSION["ADDRESS"]=$add;
		$_SESSION["PINCODE"]=$pincode;
		$_SESSION["AREA"]=$area;
		$_SESSION["CITY"]=$city;
		$_SESSION["STATE"]=$state;
		$_SESSION["CONTACTNUMBER"]=$contact;

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");

	   if($name!=NULL){
$qry = "UPDATE customer SET name='$name',password='$password',address='$add',pincode='$pincode',area='$area',city='$city',state='$state',contactnumber='$contact' WHERE email='$email'";
#echo $qry;
if(mysqli_query($con,$qry))
{
   echo '<script>alert("Successfully Updated!!!");location="customerhome.php"</script>';
  }
else{
		echo '<script>alert("Error Please Try Again!!!");location="customerhomeedit.php";</script>';
	}	
}
?>
