<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	session_start();
//Select Database
mysqli_select_db($con,"mainstay")or
 die("Could not select db: " . mysql_error());


  $email=$_POST['email'];
  $password=$_POST['password'];
  if($password!=NULL && $email!=NULL)
  {
    $result=mysqli_query($con,"SELECT * FROM customer WHERE email='$email' AND password='$password' ");
    $i=mysqli_num_rows($result);
    if($i)
    {
		
		$n=mysqli_fetch_array($result);
		$_SESSION["IMAGENAME"]=$n["imagename"];
		$_SESSION["IMAGECONTENT"]=$n["imagetmp"];
		$_SESSION["PASSWORD"] = $password;
		$_SESSION["EMAIL"] = $email;
		$_SESSION["customerID"]=$n["customerID"];
		header("Location:customer.php")or
		die("Could not select db: " . mysql_error());
    }
    else {
      echo '<script type="text/javascript">alert("Invalid Username or Password!!!"); location="customer_login.php";</script>';

    }
  }
?>
