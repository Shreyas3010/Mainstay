
<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
        mysqli_query($con,"CREATE DATABASE mainstay");
				session_start();
				//$noofpro=$_POST['totalproduct'];
				$cID=$_SESSION["customerID"];
				$providerID=$_POST['providerID'];
				$cusID="customer".$cID;
				$a10=mysqli_query($con,"SELECT * FROM temppurchaserecord WHERE customerID='$cID' AND providerID='$providerID' ");
				$a11= mysqli_fetch_array($a10);
				$type=$a11['type'];
				$totalamount=$a11['totalamount'];
				$purchaseID="INSERT INTO purchase (customerID,providerID,type)VALUES ('$cID','$providerID','$type')";
				mysqli_query($con,$purchaseID);
				$i15=mysqli_query($con,"SELECT * FROM purchase WHERE customerID='$cID' and providerID='$providerID'");
				while($i= mysqli_fetch_array($i15))
				{
					$purchaseID=$i['purchaseID'];
				}
				$i16=mysqli_query($con,"SELECT * FROM purchasecount WHERE customerID='$cID' and providerID='$providerID'");
				$numorder= mysqli_fetch_array($i16);
				$i1=mysqli_num_rows($i16);
				//echo "$i1";
				if($i1==0)
				{
					$i17="INSERT INTO purchasecount (customerID,providerID,totalorder)VALUES ('$cID','$providerID',1)";
					mysqli_query($con,$i17);
				}
				else
				{
					$cnt=$numorder['totalorder'];
					$cnt++;
					//echo $cnt;
					$q12="UPDATE purchasecount SET totalorder='$cnt' WHERE WHERE customerID='$cID' and providerID='$providerID'";
					//echo $q12;
					mysqli_query($con,"UPDATE purchasecount SET totalorder='$cnt' WHERE customerID='$cID' and providerID='$providerID'");
				}
				mysqli_query($con,"UPDATE temppurchase SET purchaseID='$purchaseID' WHERE customerID='$cID' and providerID='$providerID'");
				$qu1="INSERT INTO $cusID (purchaseID,providerID, productID, productname,productprice,quantity) SELECT purchaseID, providerID, productID,productname,productprice,quantity FROM temppurchase WHERE  customerID='$cID' and providerID='$providerID'";
				echo $qu1;
				mysqli_query($con,$qu1);
				mysqli_query($con,"DELETE FROM temppurchase WHERE customerID='$cID' and providerID='$providerID'");
				mysqli_query($con,"DELETE FROM temppurchaserecord WHERE customerID='$cID' and providerID='$providerID'");
				$gst=4.5*$totalamount/100;
				$gst=round($gst,2);
				$offerID=0;
				if(!empty($_POST['appliedcode']))
				{
					$code=$_POST['appliedcode'];
					$a13=mysqli_query($con,"SELECT * FROM offerlist WHERE code='$code' AND( providerID='$providerID' AND productID=0 )");
					//echo "SELECT * FROM offerlist WHERE code='$code' AND( providerID='$providerID' AND productID=0 )";
					$a14= mysqli_fetch_array($a13);
					$offerID=$a14['offerID'];
					//echo $offerID;
					$discount=$a14['discount'];
					$upto=$a14['upto'];
					$deductedamout=$discount*$totalamount/100;
					if($deductedamout>$upto)
					{
						$deductedamout=$upto;
					}
					$totalamount=$totalamount-$deductedamout;
				}
				if($totalamount<500)
				{
					$deliverycharge=30;
					$totalamount=$totalamount+30;
				}
				else
				{
					$deliverycharge=0;
				}
				$totalamount=$totalamount+$gst+$gst;
				$totalamount=round($totalamount);
				mysqli_query($con,"UPDATE purchase SET gst='$gst',sst='$gst',deliverycharge='$deliverycharge',totalamount='$totalamount',offerID='$offerID' WHERE purchaseID='$purchaseID'");
				echo '<script type="text/javascript">alert("Your order is confirmed !");location="customerorder.php"; </script>';
?>
