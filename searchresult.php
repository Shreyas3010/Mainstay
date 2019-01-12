<html>
<style>
.storetitle
{
	margin-top:40px;
	color:white;
	font-size:40px;
	font-weight:600;
	font-family:Courier New, Courier, monospace;
	font-variant: small-caps;
}
.detail
{
	font-family:Comic Sans MS;
	color:white;
	font-weight:900;
	margin-left:350px;
	font-size:30px;
	
}
.detail2
{
	font-family:Comic Sans MS;
	color:white;
    font-size:30px;
}
.detail3
{
	margin-top:10px;
	font-family:Comic Sans MS;
	color:white;
    font-size:28px;
	margin-left:370px;
}
.detail4
{
	margin-top:10px;
	font-family:Comic Sans MS;
	color:white;
    font-size:22px;
	margin-left:395px;
}
.bt{
	background-color: transparent;
	border:1px solid white;
	cursor:pointer;
}
</style>
<body style="background-color:black;height:100%;">
<?php
$sres=$_POST["sresult"];
//echo $sres;
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");
		$var1="SELECT * FROM provider where name='$sres'";
				$result1=mysqli_query($con,$var1);
				while($row1= mysqli_fetch_array($result1))
				 {
					$providerID=$row1["providerID"];
					$name=$row1["name"];
					$email=$row1["email"];
					$address=$row1["address"];
					$pincode=$row1["pincode"];
					$area=$row1["area"];
					$city=$row1["city"];
					$state=$row1["state"];
					$contactnumber=$row1["contactnumber"];
					$type=$row1["type"];
					$imagetmp=$row1["imagetmp"]
				 ?>
				 <form action="customerproviderproduct.php" target="target" style="width:100%;" method="POST">
				 <input type="hidden" name="providerID" value=<?php echo "$providerID"?>>
				<input type="hidden" name="type" value=<?php echo "$type"?>>
				<center><p class="storetitle" ><?php echo $name;?></p></center>
				<center><button class="bt" type="submit"><?php echo "<img src='data:image/png;base64,".base64_encode($imagetmp)."' alt='Store' width='800px' height='500px' >";?></button></center>
				 <br>
				 <br>
				 <br>
				 <font class="detail" >Email :</font><font class="detail2"> <?php echo $email;?></font>
				 <br>
				 <br>
				 <font class="detail">Address :</font><font class="detail2"> <?php echo $address;?></font>
				 <p><font style="margin-left:500px;" class="detail2">Near <?php echo $area;?> , <?php echo $city;?> , <?php echo $state;?> - <?php echo $pincode;?></font></p>
				 <details>
				 <summary class="detail">Type</summary>
				 
				 <?php
				 if($type!="Cuisine")
				 { 
				?>
				<ul>
				<li class="detail3"><?php echo  $type?> products</li>
				</ul>  
				<?php
				 }
				 else
				 {
					 if($row1["multi"]==1)
					 {
						 ?>
						 <ul>
						<li class="detail3">Multi Cuisine</li>
						</ul>  
						 <?php
					 }
					 else
					 {

						 ?>
						 <ul>
						 <?php
						 if($row1["thai"]==1)
						{
						 ?>
						<li class="detail3">Thai Cuisine</li>  
						 <?php
						}
						 if($row1["parsi"]==1)
						{
						 ?>
						<li class="detail3">Parsi Cuisine</li>  
						 <?php
						}
						 if($row1["italian"]==1)
						{
						 ?>
						<li class="detail3">Italian Cuisine</li>  
						 <?php
						}
						 if($row1["american"]==1)
						{
						 ?>
						<li class="detail3">American Cuisine</li>  
						 <?php
						}
						 if($row1["chinese"]==1)
						{
						 ?>
						<li class="detail3">Chinese Cuisine</li>  
						 <?php
						}
						 if($row1["indian"]==1)
						{
						 ?>
						<li class="detail3">Indian Cuisine</li> 
							<?php
							if($row1["gujarati"]==1)
							{
									?>
									<li class="detail4">Gujarati Cuisine</li> 
									<?php
							}
						
							if($row1["rajasthani"]==1)
							{
									?>
									<li class="detail4">Rajasthani Cuisine</li> 
									<?php
								
							}
							if($row1["punjabi"]==1)
							{
									?>
									<li class="detail4">Punjabi Cuisine</li> 
									<?php
								
							}
							if($row1["south"]==1)
							{
									?>
									<li class="detail4">South Indian Cuisine</li> 
									<?php
								
							}
							?>
						 <?php
						}
					 ?>
					 </ul>
					 <?php
					 }
					 ?>
					 
					 <?php
				 }
				?>
				 </details>
				 <br>
				 <font class="detail" >Contact number :</font><font class="detail2"> (+ 91) <?php echo $contactnumber;?></font>
				 </form>
				 <br>
				 <br>
				 <hr style="background-color:white;" size="10">
				 <?php
				 }
				 
?>
</body>

</html>