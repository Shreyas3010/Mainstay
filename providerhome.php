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
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
	margin-left:1380px;
	border-radius: 10px;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
	font-family:cursive;
}

.button1:hover {
    background-color: #f44336;
    color: white;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

.avatar {
    width:50%;
    border-radius:50%;
}
.a{
	margin-left:550px;
	font-size:25px;
	font-weight: bold;
	font-family:cursive;
	}
.b{
	font-size:25px;
	font-family:cursive;
	
}
.c{
	font-size:25px;
	margin-left:660px;
	font-family:cursive;
}

</style>
<body style="background-color:white;">
<a href="providerhomeedit.php"><button class="button button1">Edit</button><a>
	<?php
	echo "<div class='imgcontainer'>
    <img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Profile Picture' class='avatar' >
  </div>";
  ?>
  <br>
  <br>
  <br>
<p><font class="a">Store Name :</font><font class="b">  <?php echo $n['name']; ?></font></p>
<p><font class="a">Email :</font><font class="b">  <?php echo $n['email']; ?></font></p>
<p><font class="a">Address :</font><font class="b">  <?php echo $n['address']; ?>,</font></p>
<p><font class="c"> Near <?php echo $n['area']; ?>,</font><font class="b">  <?php echo $n['city']; ?>,</font><font class="b">  <?php echo $n['state']; ?> - </font><font class="b">  <?php echo $n['pincode']; ?></font></p>
<p><font class="a">Contact Number :</font><font class="b">  <?php echo $n['contactnumber']; ?></font></p>


<!--
<table style="border:none;">
  <tr>
    <td><font class="a">Name :</font></td>
    <td><font class="b">  <?php echo $name; ?></font></td>
	</tr>
	<tr>
	<td><font class="a">Email :</font></td> 
    <td><font class="b">  <?php echo $email; ?></font></td>
	</tr>
	<tr>
	<td><font class="a">Address :</font></td>
	<td><font class="b">  <?php echo $address; ?>,</font><font class="b">  <?php echo $city; ?>,</font><font class="b">  <?php echo $state; ?> - </font><font class="b">  <?php echo $pincode; ?></font></td>
	</tr>
	<tr>
	<td><font class="a">Contact Number :</font></td>
	<td><font class="b">  <?php echo $contactnumber; ?></font></td>
  </tr>
</table>-->
</body>
</html>