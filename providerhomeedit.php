<?php
session_start();
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
mysqli_select_db($con,"mainstay")or
 die("Could not select db: " . mysql_error());


    $imagename=$_SESSION["IMAGENAME"];
    $imagetmp=$_SESSION["IMAGECONTENT"];
    $email=$_SESSION["EMAIL"];
      $result=mysqli_query($con,"SELECT * FROM provider WHERE email='$email'");
    $n=mysqli_fetch_array($result);
?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.button {
	   border-radius: 4px;
    position: relative;
    background-color:#9b9595;
    border: none;
    font-size: 20px;
    color: #FFFFFF;
    padding: 20px;
    width:10%;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
	margin-top:50px;
		font-family:cursive;
}

.button:after {
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

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
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
.a{
	font-size:25px;
	font-weight: bold;
	font-family:cursive;
	}
.b{
	font-size:20px;
	margin-left:10px;
	font-family:cursive;
	border:none;
	background-color:#FA8072;
	}
	
.btn {
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 20px;
    cursor: pointer;
	margin-left:97%;
}

/* Darker background on mouse-over */
.btn:hover {
    background-color: RoyalBlue;
}
</style>
<body style="background-color:#FA8072;">
<button class="btn" onclick="location.href='providerhomeeditcancel.php'" ><i class="fa fa-close"></i></button>
<br><br>
<form action = "providerhomeedit01.php" method="post">
<table style="border:none;margin-left:550px;" cellspacing="20">
  <tr>
    <td style="cellpadding:10px;"><font class="a">Store Name :</font></td>
    <td><input type="text" name="name" value="<?php echo $n['name']; ?>" class="b" required></td>
	</tr>
	<tr>
	<td><font class="a">Password :</font></td> 
    <td><input type="password" name="password" value="<?php echo $n['password']; ?>" class="b" required></td>
	</tr>
	<tr>
	<td><font class="a">Address :</font></td>
	<td><TEXTAREA name="add" COLS="30" ROWS="2" class="b" required><?php echo $n['address']; ?></TEXTAREA></td>
	</tr>
	<tr>
    <td><font class="a">Pincode :</font></td>
    <td><input type="digit" name="pincode" value="<?php echo $n['pincode']; ?>" class="b" required pattern="[0-9]{6}"></td>
	</tr>
	<tr>
    <td><font class="a">Locality :</font></td>
    <td><input type="text" name="area" value="<?php echo $n['area']; ?>" class="b" required></td>
	</tr>
	<tr>
    <td><font class="a">City :</font></td>
    <td><input type="text" name="city" value="<?php echo $n['city']; ?>" class="b" required></td>
	</tr>
	<tr>
    <td><font class="a">State :</font></td>
    <td><input type="text" name="state" value="<?php echo $n['state']; ?>" class="b" required></td>
	</tr>
	<tr>
	<td><font class="a">Contact Number :</font></td>
	<td><input type="digit" name="contactnumber" value="<?php echo $n['contactnumber']; ?>" class="b" required pattern="[0-9]{10}"></td>
  </tr>
</table>
<center><button class="button"  type="submit" ><span>Change</span></button></center>
</form>
</body>
</html>