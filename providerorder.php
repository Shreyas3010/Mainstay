<html>
<style>
.ordertitle
{
	margin-top:50px;
	font-size:40px;
	font-weight:900;
	color:#587058;
	font-family:cursive;
}
table, td, th {  
	
	border: 2px solid;
	text-align: center;
	font-size:30px;
	font-family:Courier New, Courier, monospace;
	font-variant: small-caps;
}
table{
	margin-left:15%;
	margin-top:30px;
	margin-right:10%;
}
th, td {
  padding: 15px;
}
</style>
<body>
<center><p class="ordertitle">Your Orders !</p></center>
<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");
				session_start();
				$pID=$_SESSION["providerID"];
				$var1="SELECT * FROM purchase where providerID=$pID and arrived=0";
				$result1=mysqli_query($con,$var1);
				$i=mysqli_num_rows($result1);
				if($i)
				{
				 while($row1= mysqli_fetch_array($result1))
				 {
					$purID=$row1['purchaseID'];
					$cID=$row1['customerID'];
					//echo $purID;
					$tmp=mysqli_query($con,"SELECT * from customer where customerID='$cID'");
					$tmp1=mysqli_fetch_array($tmp);
					$cusID="customer".$cID;
					?>
					<font style="margin-top:10px;margin-left:15%;font-family:Comic Sans MS;font-size:25px;"><b>Order No:</b> <?php echo $purID?></font>
					<br>
					<br>
					<font style="margin-left:15%;font-family:Comic Sans MS;font-size:25px;"><b>Customer Name:</b> <?php echo $tmp1['name']?></font>
					<font style="margin-left:15%;font-family:Comic Sans MS;font-size:25px;"><b>E-mail:</b> <?php echo $tmp1['email']?></font>
					<?php
					$var2="SELECT * FROM $cusID WHERE purchaseID='$purID'";
				    $result2=mysqli_query($con,$var2);
				    ?>
					<table cellpadding="10" bgcolor="#c4c4c4">
					<tr><th width="10%">Product Name </th><th width="5%">Product Price </th><th width="3%">Quantity</th></tr>
					<?php
					$totalmoney=0;
					while($row2= mysqli_fetch_array($result2))
				    {?>
					<tr><td><center><?php echo $row2['productname']?></center></td><td><center><?php echo $row2['productprice']?> </center></td><td><center><?php echo $row2['quantity']?></center></td></tr>	
					
					<?php
					$totalmoney=$totalmoney+$row2['productprice']*$row2['quantity'];
					}
					?>
					<tr><td><center>G.S.T.</center></td><td><?php echo $row1['gst']; ?></td><td><center></center></td></tr>
					<tr><td><center>S.S.T.</center></td><td><?php echo $row1['gst']; ?></td><td><center></center></td></tr>
					<tr><td><center>Delivery charge</center></td><td><?php echo $row1['deliverycharge']?></td><td><center></center></td></tr>
					
					</table>
					<?php
					$offerID=$row1['offerID'];
					$appliedoffer1=mysqli_query($con,"SELECT * FROM offerlist WHERE offerID='$offerID'");
					$appliedoffer=mysqli_fetch_array($appliedoffer1);
					$code=$appliedoffer['code'];
					$discount=$appliedoffer['discount'];
					if($offerID!=0)
					{
						
					?>
					<p><font style="margin-top:15px;margin-left:15%;font-size:30px;font-family:Courier New, Courier, monospace;font-variant: small-caps;"><b>Code: </b><?php echo $code?></font>
					<?php
						$totalmoney1=$totalmoney+$row1['gst']+$row1['gst']+$row1['deliverycharge'];
						$beforediscount=round($totalmoney1);
						//echo $discount;
						$totalmoney1=$row1['totalamount'];
						$totalmoney=round($totalmoney1);
													?>
													<br>
					<font style="position:relative;top:10px;margin-left:15%;font-size:30px;font-family:Courier New, Courier, monospace;font-variant: small-caps;"><b>Total amount: </b><strike><?php echo $beforediscount?></strike> <?php echo $totalmoney?> Rs.</font></p>
					<br>
					
							<?php
					}
					else
					{
					   
						$totalmoney1=$totalmoney+$row1['gst']+$row1['gst']+$row1['deliverycharge'];
						$totalmoney=round($totalmoney1);
						if(($totalmoney1-$totalmoney)==0)
						{
							?>
							<p style="margin-top:15px;margin-left:15%;font-size:30px;font-family:Courier New, Courier, monospace;font-variant: small-caps;"><b>Total amount: </b><?php echo $totalmoney?> Rs.</p>
							<?php
						}
						else
						{
							?>
							<p style="margin-top:15px;margin-left:15%;font-size:30px;font-family:Courier New, Courier, monospace;font-variant: small-caps;"><b>Total amount: </b><strike><?php echo $totalmoney1?></strike> <?php echo $totalmoney?> Rs.</p>
							<?php
						}
					   
					}
					?>
					<br>
					<br>
					<?php
				 }
				}
				else
				{
					echo '<script type="text/javascript">alert("No order yet!"); location="provider_product.php";</script>';
				}
				?>
</body>
</html>