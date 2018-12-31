<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	session_start();
//Select Database
mysqli_select_db($con,"mainstay")or
 die("Could not select db: " . mysql_error());


  $email=$_POST['email'];
  $password=$_POST['password'];
 // setcookie('aname','hum',time()+120,localhost/cookie/view.php);
  if($password!=NULL && $email!=NULL)
  {
    $result=mysqli_query($con,"SELECT * FROM provider WHERE email='$email' AND password='$password' ");
    $i=mysqli_num_rows($result);
    if($i)
    {
		$n=mysqli_fetch_array($result);
		$_SESSION["providerID"]=$n['providerID'];
		$_SESSION["EMAIL"] = $email;
		$_SESSION["IMAGENAME"]=$n["imagename"];
		$_SESSION["providerID"]=$n["providerID"];
		$_SESSION["IMAGECONTENT"]=$n["imagetmp"];
		header("Location:provider.php")or
		die("Could not select db: " . mysql_error());
    }
    else {
      echo '<script type="text/javascript">alert("Invalid Username or Password!!!"); location="provider_login.php";</script>';

    }
  }
?>
