<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"mainstay")or
    mysqli_query($con,"CREATE DATABASE mainstay");
	session_start();
	$cID=$_SESSION["customerID"];
	$i15=mysqli_query($con,"SELECT * FROM temppurchaserecord WHERE customerID='$cID' ");
	$i16= mysqli_fetch_array($i15);
	$totalamount=$i16['totalamount'];
	$providerID=$i16['providerID'];
	$tags='';
	$availableoffer=mysqli_query($con,"SELECT * FROM offerlist WHERE providerID='$providerID' AND ( productID=0 AND minorder <='$totalamount' )");
	while($offern=mysqli_fetch_array($availableoffer))
	{
		$offercode=$offern['code'];
		$tags.="$offercode,";
	}
	//echo "tag";
	//echo $tags;
	//echo "aa";
	//tag result is correct but its not reflecting in autocomplete !
?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

input {
  border: 0.5px solid white;
  background-color: red;
  padding: 11px;
  font-size:15px;
}

input[type=text] {
  background-color:black;
  color:white;
  width:40%;
  cursor:text;
}

.autocomplete-items {
  position: relative;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
width:40%;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
::placeholder {
	font-family: Courier New,Courier, monospace;
	font-size:2em;
	color:white;
	text-align:center;
	font-variant: small-caps;
}
body, html {
    height:100%;
    margin: 0;
}
div.offerstoshow {
	background-color:black;
	width:80%;
	margin:120px 00px 70px 10%;
	overflow:auto;
    white-space: nowrap;
	}
div.offerstoshow a {
  display: inline-block;

  color: white;
  padding: 14px 14px 00px 14px;
  text-decoration: none;
}

div.offerstoshow a:hover {
  background-color: #777;
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
.ordertitle
{
	margin-top:50px;
	font-size:40px;
	font-weight:900;
	color:#587058;
	font-family:cursive;
}
.hiddenbutton {

  background-color:Transparent;
  position:relative;
  margin-left:15px;
  border:none;
  width:300px;
}
.hiddenbutton .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 10px 10px;
  font-size:15px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>
<body>
<div class="offerstoshow">

<div style="margin-left:37%;padding:10px;font-family:Courier New,Courier, monospace;font-variant:small-caps;color:white;font-size:40px;font-weight:900;position:absolute;">Offers</div>
<br>
<br>
<br>
<br>
<?php
$offerresult=mysqli_query($con,"SELECT * FROM offerlist where providerID='$providerID' AND productID=0 ");
$offernum=mysqli_num_rows($offerresult);
if($offernum==0)
	{
?>
	<p style="margin:00px 00px 50px 00px;text-align:center;font-weight:900;font-size:40px;font-family:cursive;font-variant: small-caps;color:white;">No Offers</p>
<?php
	}
	$indexnum=1;
	while($offerrow = mysqli_fetch_array( $offerresult ) )
	{
		$offerdiscount=$offerrow['discount'];
		$offerID=$offerrow['offerID'];
		if(floor($offerdiscount/10)==0)
		{
			$offerdiscount="0".$offerdiscount;
		}
			$offerupto=$offerrow["upto"];
			$offerminorder=$offerrow['minorder'];
			$offercode=$offerrow['code'];
			
			
			?>
			<a >
			<button class="hiddenbutton">
			<div>
			<center><img src="image/order.png" alt="OrderOffer" style="width:240px;height:270px;"></center>
			</div>
			<div style="margin-top:30px;width:250px;" >
			<font style="font-weight:900;margin:00px 00px 00px 32px;font-size:20px;font-family:cursive;color:white;">Upto: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offerupto"?> Rs.</font>
			</div>
			<div style="margin-top:15px;width:250px;" >
			<font style="margin:00px 00px 00px 32px;font-weight:900;font-size:20px;font-family:cursive;color:white;">Minorder: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offerminorder"?> Rs.</font>
			</div>
			<div style="margin-top:15px;">
			<font style="margin:00px 00px 00px 32px;font-weight:900;font-size:20px;font-family:cursive;color:white;">Code: </font><font style="color:white;font-size:20px;font-family:cursive;"><?php echo "$offercode"?></font>
			</div>
			<span class="badge"><?php echo $offerdiscount;?></span>
			</a>
	<?php
	}
	?>		
</div>
<br>
<br>
<center><p class="ordertitle">Your Orders !</p></center>
<a href="tempordercancel.php" style="margin:00px 00px 00px 50px;position:sticky;top:0;font-size:50px;color:black;"><i class="fa fa-trash"></i></a>
<?php
	$i17=mysqli_query($con,"SELECT * FROM provider WHERE providerID='$providerID'");
	$i18= mysqli_fetch_array($i17);
?>
	<font style="margin-left:15%;font-family:Comic Sans MS;font-size:25px;"><b>Shop Name:</b> <?php echo $i18['name']?></font>
	<font style="margin-left:15%;font-family:Comic Sans MS;font-size:25px;"><b>E-mail:</b> <?php echo $i18['email']?></font>
	<table cellpadding="10" bgcolor="#c4c4c4">
	<tr><th width="2%"></th><th width="10%">Product Name </th><th width="5%">Product Price </th><th width="3%">Quantity</th></tr>
<?php
	$i19=mysqli_query($con,"SELECT * FROM temppurchase WHERE customerID='$cID' ");
	while($i20=mysqli_fetch_array($i19))
	{ 
?>
		<tr><td><form method="POST" action="deleteproductfromtemporder.php"><input type="hidden" name="quantity" value="<?php echo $i20['quantity'] ?>"><input type="hidden" name="tempbuyingID" value="<?php echo $i20['tempbuyingID']; ?>"><input type="hidden" name="temppurchaseID" value="<?php echo $i20['temppurchaseID']; ?>"><input type="hidden" name="productprice" value="<?php echo $i20['productprice']; ?>"><button name="deleteitem" style="cursor:pointer;position:relative;top:12px;background-color:Transparent;border:none;font-size:35px;color:red;"><i class="fa fa-trash"></i></button></form></td><td><center><?php echo $i20['productname']?></center></td><td><center><?php echo $i20['productprice']?> </center></td><td><center><form method="POST" action="deleteproductfromtemporder.php"><input type="hidden" name="quantity" value="<?php echo $i20['quantity'] ?>"><input type="hidden" name="tempbuyingID" value="<?php echo $i20['tempbuyingID']; ?>"><input type="hidden" name="temppurchaseID" value="<?php echo $i20['temppurchaseID']; ?>"><input type="hidden" name="productprice" value="<?php echo $i20['productprice']; ?>"><button name="minitem" style="cursor:pointer;margin:00px 15px 00px 00px;background-color:Transparent;border:none;font-size:40px;font-weight:900;color:red;position:relative;top:3px;">-</button><?php echo $i20['quantity']?><button name="plusitem" style="position:relative;top:6px;cursor:pointer;margin:00px 00px 00px 13px;background-color:Transparent;border:none;font-size:40px;font-weight:900;color:red;">+</button></form></center></td></tr>	
					
<?php
	
	}
?>
</table>
<p style="margin-top:15px;margin-left:15%;font-size:30px;font-family:Courier New, Courier, monospace;font-variant: small-caps;"><b>Total amount: </b><?php echo $totalamount?> Rs.</p>
<div  class="autocomplete" style="width:100%;">
<br>
<br>
<form autocomplete="off" action="customerproviderproduct100.php"  method="POST">
<center><button  name="confirm" style="position:relative;top:3px;width:40%;color:white;background-color:black;border:none;font-family:Courier New,Courier, monospace;font-variant:small-caps;font-size:2em;padding:5px;"  type="submit">Confirm</button></center>
<!--<hr style="width:40%;color:white;align:center;">-->
<center><div id="validornot" style="position:relative;height:30px;"></div></center>
<center><input id="myInput" type="text"  name="appliedcode" placeholder="Code.." oninput="codecheck()"></center>
<input type="hidden" name="providerID" value="<?php echo $providerID; ?>">
<br>
<br>
<br>
</form></div>
<script>
var interval1 = setInterval(codecheck,500);
function codecheck(){
	var y = document.getElementById("myInput").value;
	var x = y.toUpperCase();
	var flag=0;
	<?php
	$availableoffer=mysqli_query($con,"SELECT * FROM offerlist WHERE providerID='$providerID' AND ( productID=0 AND minorder <='$totalamount' )");
	while($offern=mysqli_fetch_array($availableoffer))
	{
		$offercode=$offern['code'];
		?>
		var offercode="<?php echo $offercode ?>";
		if(offercode==x)
		{
			flag=1;
		}
		<?php
	}
	?>
	if(flag==0)
	{
		 var n = x.length;
		if(n===0)
		{
			 document.getElementById("validornot").innerHTML = "";
		}
		else
		{
			document.getElementById("validornot").innerHTML = "<font style=\"font-family:cursive;font-size:20px;font-weight:900;\">Not applicable</font>";
		}
	}
	else
	{
		 document.getElementById("validornot").innerHTML ="";
	}
}
var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  event.preventDefault();
  if (event.keyCode === 13) {
    document.getElementById("confirm").click();
	//it works even if we dont write this code
  }
});
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries ="<?php echo $tags;?>".split(',');

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

</body>
</html>