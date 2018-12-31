<!DOCTYPE HTML>
<html>
<head><title>Provider Sign up</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btnn {
  color: gray;
  background-color: white;
  padding: 8px 20px;
  font-size:14px;
  font-family:Roboto;
  width:500px;
  height:60px;
  margin-left:7px;
  
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

 .button {
	   border-radius: 4px;
    position: relative;
    background-color:#9b9595;
    border: none;
    font-size: 20px;
    color: #FFFFFF;
    padding: 20px;
    width:500px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
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
.aa{
  margin-top:20px;
  text-decoration:none;
}

.b{

  width:500px;
  padding: 20px;
  font-family: "Roboto";  
  outline-color:white;  
  outline-style:groove;
  
}
a:hover
{
	
	color:#4B33DC;
}
input:hover{
	background:#EAEAEA;	
}
TEXTAREA:hover{
	background:#EAEAEA;	
}


.e{
 
  width:250px;
  padding: 20px;
  font-family: "Roboto";  
  outline-color:white;  
  outline-style:groove;
}
.previous {
    background-color: black;
    color: white;
	
	
	
}

.round {
    border-radius:50%;
	margin-left:30px;
	padding: 15px 15px;
}
a:hover {
 
 
	opacity:0.5;
}
.backa
{
	background-color:Transparent;
	border:none;
	color:white;
    font-size:30px;
	cursor:pointer;
}

	.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 1em;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color:#ff4d4d;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

/* for indian cuisine */

	.container1 {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size:1em;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container1 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark1 {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color:#ffff00;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark1 {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container1 input:checked ~ .checkmark1 {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark1:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container1 input:checked ~ .checkmark1:after {
    display: block;
}

/* Style the checkmark/indicator */
.container1 .checkmark1:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.b23{
	font-size:1em;
	font-family: "Roboto";
	}
.b33{
  width:500px;
  outline-color:white;  
  outline-style:groove;
  background-color:white;
  }
  hr { 
    border-width:5px;
	background-color:#505050;
	}
</style></head>
<body background="image/provider_signup1.jpg" style="background-size:cover;background-position:center">
<br>
<a href="homepage.php" class="previous round"><button class="backa">&laquo;</button></a>
<form name="customer_signup" method="POST" class="aa" action="provider_signup01.php" enctype="multipart/form-data"><center>
<h1 style="color:#F8F8F8;">Sign Up</h1>

<div><input type="text" name="name" placeholder="Store Name" class="b" required ></div>

<div><input type="email" name="email" placeholder="E-mail" class="b" required ></div>
<div><input type="password" name="password" placeholder="Password" class="b" required ></div>

<div><input type="password" name="password1" placeholder="Confirm Password" class="b" required ></div>
<div class="b33">

<select class="form-control field-type" id="typef" name="typef" onclick="typeopt()" style="font-size:1em;height:40px;border:none;" required>
								<option value="" class="b23">Type</option>
								<option value="Baked" class="b23">Baked Product</option>
								<option value="Dairy" class="b23">Dairy Product</option>
								<option value="Stationary"class="b23">Stationary Store</option>
								<option value="Grocery" class="b23">Grocery Product</option>
								<option value="Cuisine" class="b23">Cuisine</option>
								</select>
								<div class="form-group col-sm-8" id="cuisineopt" style="margin-top:4px;"></div>
								<!--<div class="form-group col-sm-8" id="temp"></div><br><br>-->
			<div class="form-group col-sm-8" id="indiancuisineopt"></div>
<font style="color:white;">aa</font><script>
	function typeopt()
			{
				//confirm("Press a button!");
				var x=document.getElementById("typef").value;
				
				if(x=="Cuisine")
				{
					
					var c1=document.getElementById("cuisineopt");
					c1.innerHTML="<hr><label class=\"container\"><input  type=\"checkbox\" id=\"multi\" name=\"multi\" onchange=\"checkotherbox()\" value=\"Multi\"> Multi Cuisine<span class=\"checkmark\"></span></label><hr><label class=\"container\"><input type=\"checkbox\" id=\"thai\" onchange=\"checkotherbox()\" name=\"thai\" value=\"Thai\"> Thai Cuisine<span class=\"checkmark\"></span></label><hr><label class=\"container\"><input type=\"checkbox\" id=\"parsi\" name=\"parsi\" onchange=\"checkotherbox()\" value=\"Parsi\"> Parsi Cuisine<span class=\"checkmark\"></span></label><hr><label class=\"container\"><input type=\"checkbox\" id=\"italian\" name=\"italian\" onchange=\"checkotherbox()\" value=\"Italian\"> Italian Cuisine<span class=\"checkmark\"></span></label><hr><label class=\"container\"><input type=\"checkbox\" id=\"american\" onchange=\"checkotherbox()\" name=\"american\" value=\"American\"> American Cuisine<span class=\"checkmark\"></span></label><hr><label class=\"container\"><input type=\"checkbox\" onchange=\"checkotherbox()\" id=\"chinese\" name=\"chinese\" value=\"Chinese\"> Chinese Cuisine<span class=\"checkmark\"></span></label><hr><label class=\"container\"><input type=\"checkbox\" id=\"indian\" onchange=\"checkotherbox()\" name=\"indian\" value=\"Indian\"> Indian Cuisine <span class=\"checkmark\"></span></label><hr>";
				}
				else
				{
					
					document.getElementById("cuisineopt").innerHTML="<p></p>";
					document.getElementById("indiancuisineopt").innerHTML="<p></p>";
				}
			}
	function checkotherbox()
	{
		if(document.getElementById("multi").checked)
		{
				//document.getElementById("temp").innerHTML="<p>okay</p>";
				document.getElementById("thai").checked=false;
				document.getElementById("parsi").checked=false;
				document.getElementById("italian").checked=false;
				document.getElementById("american").checked=false;
				document.getElementById("chinese").checked=false;
				document.getElementById("indian").checked=false;
				document.getElementById("indiancuisineopt").innerHTML="<p></p>";
		}
		else 
		{ 
			if(document.getElementById("indian").checked)
			{
					var c2=document.getElementById("indiancuisineopt");
					c2.innerHTML="<hr><label class=\"container1\"><input  type=\"checkbox\" id=\"gujarati\" name=\"gujarati\"  value=\"Gujarati\"> Gujarati<span class=\"checkmark1\"></span></label><hr><label class=\"container1\"><input  type=\"checkbox\" id=\"rajasthani\" name=\"rajasthani\"  value=\"Rajasthani\"> Rajasthani<span class=\"checkmark1\"></span></label><hr><label class=\"container1\"><input  type=\"checkbox\" id=\"punjabi\" name=\"punjabi\"  value=\"Punjabi\"> Punjabi<span class=\"checkmark1\"></span></label><hr><label class=\"container1\"><input  type=\"checkbox\" id=\"south\" name=\"south\"  value=\"South Indian\">South Indian<span class=\"checkmark1\"></span></label><hr>";
			}
			else
			{
				document.getElementById("indiancuisineopt").innerHTML="<p></p>";
			}
			
		}
	}	
</script></div>
<div><TEXTAREA name="add" COLS="30" ROWS="2" placeholder="Address" class="b" required></TEXTAREA></div>

<div><input type="digit" name="pincode" placeholder="Pincode" class="e" required pattern="[0-9]{6}"><input type="text" name="area" placeholder="Locality" class="e" required></div>

<div><input type="text" name="city" placeholder="City" class="e" required>

<input type="text" name="state" placeholder="State" class="e" required></div>

<div><input type="digits" name="contact" placeholder="Contact Number" class="b"  required pattern="[0-9]{10}"></div>
<div class="upload-btn-wrapper">
  <button class="btnn">Upload Profile Image</button>
  <input type="file" name="profileimage" />
</div>

<!--<div><pre><font size="4" color="black" style="color:gray;background-color:white;padding:12px;font-family:Roboto; ">          Profile Image        <input type="file" name="profileimage" />         </font></pre></div>-->
<br><button class="button"  type="submit" ><span>Register </span></button>
<p style="color:#F8F8F8;font-size:17px;">Have an account ?<a style="margin-left:20px;text-decoration:none;" href="provider_login.php" style="margin-left:20px;" > Log in</a></p>

</body>
</html>