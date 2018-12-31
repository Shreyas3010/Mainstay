<!DOCTYPE HTML>
<html>
<head><title>Customer Sign up</title></head>
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
  width:495px;
  height:60px;
  margin-left:1px;
  
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}


.a{
  margin-top:40px;
  text-decoration:none;
}

.b{

  width: 30%;
  padding: 20px;
  font-family: "Roboto";  
  outline-color:white;  
  outline-style:groove;
  
}
 .button {
	   border-radius: 4px;
    position: relative;
    background-color:#9b9595;
    border: none;
    font-size: 20px;
    color: #FFFFFF;
    padding: 20px;
    width:33%;
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

.c{
   
    width:56%;
    padding: 20px;
	border-width:2px;  
    border-style:outset;
    color: white;
    background:grey;
        
}


.d{
 
  width:50%;
  padding: 20px;
  font-family: "Roboto";  
  outline-color:white;  
  outline-style:groove;
  
}
.e{
 
  width: 13.5%;
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
</style>
<body background="image/provider_signup1.jpg" style="background-size:cover;background-position:center">
<br>
<a href="homepage.php" class="previous round"><button class="backa">&laquo;</button></a>
<form name="customer_signup" method="POST" class="a" action="customer_signup01.php" enctype="multipart/form-data"><center>
<h1 style="color:#F8F8F8;">Sign Up</h1>

<div><input type="text" name="name" placeholder="Name" class="b" required ></div>

<div><input type="email" name="email" placeholder="E-mail" class="b" required ></div>

<div><input type="password" name="password" placeholder="Password" class="b" required ></div>

<div><input type="password" name="password1" placeholder="Confirm Password" class="b" required ></div>

<div><TEXTAREA name="add" COLS="30" ROWS="2" placeholder="Address" class="b" required></TEXTAREA></div>

<div><input type="number" name="pincode" placeholder="Pincode" class="e" required pattern="[0-9]{6}"><input type="text" name="area" placeholder="Locality" class="e" required></div>

<div><input type="text" name="city" placeholder="City" class="e" required>

<input type="text" name="state" placeholder="State" class="e" required></div>

<div><input type="number" name="contact" placeholder="Contact Number" class="b"  required pattern="[0-9]{10}"></div>
<div class="upload-btn-wrapper">
  <button class="btnn">Upload Profile Image</button>
  <input type="file" name="profileimage" />
</div><br>
<!--<div><pre><font size="4" color="black" style="color:gray;background-color:white;padding:12px;font-family:Roboto; ">          Profile Image        <input type="file" name="profileimage" />         </font></pre></div>-->
<button class="button"  type="submit" ><span>Register </span></button>
<p style="color:#F8F8F8;font-size:17px;">Have an account ?<a style="margin-left:20px;text-decoration:none;" href="customer_login.php" style="margin-left:20px;" > Log in</a></p>

</body>
</html>