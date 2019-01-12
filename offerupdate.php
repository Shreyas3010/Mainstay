<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 40%;
  padding: 20px;
  text-align: center;
}
/* Full-width input fields */
input[type=text], input[type=number] {
  width: 90%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  font-family:cursive;
  font-size:22px;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}
.deletebtn {
  padding: 14px 20px;
  background-color: #ddd;
}
/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .editbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .editbtn .deletebtn{
     width: 100%;
  }
}
</style>
</head>
<body style="background-image:url('Image/bg03.jpg');background-repeat: no-repeat;background-size:cover;">

<?php
	$type=$_POST["typeoffer"];
	$offerID=$_POST["offerID"];
	$discount=$_POST["discount"];
	if($type=="item")
	{
		?>
		<div style=" margin:10px 00px 50px 00px;" class="bg-text">
		<font style="font-size:55px;font-weight:900;font-family:Courier New, Courier, monospace;font-variant: small-caps;">Offer detail</font> 
		<form method="POST" action="providerbackground01.php" style="border:1px solid #ccc">
		<div class="container">
		<hr>
		<button name="deletebutton" style="color:black;" class="deletebtn">Delete</button>
		<hr>
		<label style="font-size:35px;font-weight:900;font-family:Courier New, Courier, monospace;font-variant: small-caps;" for="Discount">Discount</label>
		<input type="number" name="discount" style="font-family:cursive;font-size:17px;font-weight:900;" value="<?php echo $discount;?>" min="0" max="100" step="1" required>
		<input type="hidden" name="offerID" value=<?php echo $offerID;?>>
		<input type="hidden" name="typeoffer" value="item">
		<div class="clearfix">
        <button name="cancelbutton" class="cancelbtn">Cancel</button>
        <button name="editbutton" class="editbtn">Edit</button>
	    </div>
	    </div>
	    </form>
		</div>
		<?php
	}
	else if($type=="order")
	{
			$minorder=$_POST["minorder"];
			$code=$_POST["code"];
			$upto=$_POST["upto"];
		?>
		<div style=" margin:150px 00px 50px 00px;" class="bg-text">
		<font style="font-size:55px;font-weight:900;font-family:Courier New, Courier, monospace;font-variant: small-caps;">Offer detail</font> 
		<form method="POST" action="providerbackground01.php" style="border:1px solid #ccc">
		<div class="container">
		<hr>
		<button name="deletebutton" style="color:black;" class="deletebtn">Delete</button>
		<hr>
		<label style="font-size:35px;font-weight:900;font-family:Courier New, Courier, monospace;font-variant: small-caps;" for="Discount">Discount</label>
		<input type="number" name="discount" style="font-family:cursive;font-size:17px;font-weight:900;" value="<?php echo $discount;?>" min="0" max="100" step="1" required>
		<label style="font-size:35px;font-weight:900;font-family:Courier New, Courier, monospace;font-variant: small-caps;" for="Upto">Up To</label>
		<input type="number" name="upto" style="font-family:cursive;font-size:17px;font-weight:900;" value="<?php echo $upto;?>"  required>
		<label style="font-size:35px;font-weight:900;font-family:Courier New, Courier, monospace;font-variant: small-caps;" for="Mini Order">Mini Order</label>
		<input type="number" style="font-family:cursive;font-size:17px;font-weight:900;" name="minorder" value="<?php echo $minorder;?>"  required>
		<label style="font-size:35px;font-weight:900;font-family:Courier New, Courier, monospace;font-variant: small-caps;" for="Code">Code</label>
		<input type="text" name="code" style="font-family:cursive;font-size:15px;font-weight:900;" value="<?php echo $code;?>"  required>
		<input type="hidden" name="offerID" value=<?php echo $offerID;?>>
		<input type="hidden" name="typeoffer" value="order">
		<div class="clearfix">
        <button name="cancelbutton" class="cancelbtn">Cancel</button>
        <button name="editbutton" class="editbtn">Edit</button>
	    </div>
	    </div>
	    </form>
		</div>
		<?php
	}
  ?>
</body>
</html>