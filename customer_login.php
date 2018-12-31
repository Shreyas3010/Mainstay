<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body, html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.bg-img {
    background-image: url("image/a1.jpg");
	height:100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
.container {
    position: absolute;
    right: 0;
    margin: 20px;
    width:550px;
	margin-right:6%;
    padding: 16px;
    background-color:#FFEBCD;
}
input[type=text], input[type=password] {
    width:90%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}
.btn {
    background-color:#B1ACAC;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity:0.8;
}
 .button {
	   border-radius: 4px;
    position: relative;
    background-color:#9b9595;
	padding: 16px 20px;
    border: none;
    width: 100%;
    font-size: 20px;
    color: #FFFFFF;
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

input:hover{
	background:#EAEAEA;	
}
.home1
{
    float:right;
	margin-right:60px;
    margin-top:60px;
    background-color:black;
    border: none;
    color: white;
    padding: 5px 10px;
    font-size:40px;
    cursor: pointer;	
}
.home1:hover
{
    padding: 5px 10px;
    font-size:42px;
    cursor: pointer;
    background-color:transparent;
	color:black;
}
</style>
</head>
<body>
<div class="bg-img">
<button class="home1" onclick="location.href='homepage.php'" value="Homepage"><i class="fa fa-home"></i></button>
  <form style="margin-top:12%;" action = "customer_login01.php" method="post" class="container">
    <center><h1>Login</h1></center>
	<label for="email"><b>Email</b></label>
	<br>
    <input type="text" placeholder="Email" name="email" required>
<br><br>
    <label for="psw"><b>Password</b></label>
	<br>
    <input type="password" placeholder="Enter Password" id="password" name="password" required>
    <span class="glyphicon glyphicon-eye-open" style="cursor:pointer;font-size:30px;margin-left:10px; " onmouseout="notvisible()" onmouseover="visible()"></span>
	<script>
	function visible() {
		var x = document.getElementById("password");
			x.type = "text";
		}

    function notvisible() {
        var x = document.getElementById("password");
            x.type = "password";
        }
</script>

<br><button class="button"  type="submit" ><span>Login </span></button>
<br>
	</form>
</div>
</body>
</html>
