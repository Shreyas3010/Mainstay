<!DOCTYPE html>
<html><head>
<title>Add Products</title>
</head>

<style>
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  font-family:cursive;
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

.bt{
    background-color:transparent;
	height:50px;
	width:50px;
    border: none;
    cursor: pointer;
	margin-left:1430px;
}

.dropdown {
    position: relative;
    display: inline-block;
	width:60px;
	
}

.dropdown-content {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	margin-left:1350px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    border-style:solid;
    border-width:1.5px;
	border-color:red;
	background-color:black;
	color:white;
	opacity:0.2;
    filter: alpha(opacity=20);
	
	}

.dropdown:hover .dropdown-content {
    display: block;
	 background-color:#f9f9f9;
	opacity:1.0;
    filter: alpha(opacity=100);

}

.bt:hover{
	border-style:solid;
    border-width:1.5px;
	border-color:#0d3d0d;
	background-color:transparent;
}
.a{
float:left;
background-color:transparent;
width:100%;
height:60px;
}


img:hover {
  animation: shake 0.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}
input[type=text], input[type=digit] {
    width:15%;
    padding: 15px;
    margin: 10px 0 2px 20px;
    border: none;
    background:white;
}
.itemtitle
{
	margin-top:50px;
	font-size:40px;
	font-weight:900;
	font-family:"Courier New", Courier, monospace;
	font-variant: small-caps;
}
</style>
<body bgcolor="#E6E6FA">
<div class="a">
<div  class="dropdown">
<button class="bt"><img src="image/option.png" alt="Option" style="width:40px;height:40px;"></button>
  <div class="dropdown-content">
    <a href="provider_addproduct.php">Add</a>
    <a href="provider_list.php">List</a>
	<a href="provider_productedit.php">Edit</a>
    <a href="provider_productdelete.php">Delete</a>
  </div>
</div>
</div>
<form action = "provider_addproduct01.php" method="post" enctype="multipart/form-data">
<center><p class="itemtitle">Enter Number Of Product You Want To Add:<input type="digit" name="noproduct" id="noproduct" oninput="myFunction()"></p></center>
<br>
<br>
<div id="abc"></div>
<script>
	function myFunction() {
    var x = document.getElementById("noproduct").value;
	var c1=document.getElementById("abc");
	c1.innerHTML="<p></p>";
		var j=1;
		var pro_name="<font style=\"margin-left:20px;font-weight:1000;font-family:courier;font-size:20px;\">Product Name</font>";
		var pro_price="<font style=\"margin-left:20px;font-weight:1000;font-family:courier;font-size:20px;\">Product Price</font>";
		var rs="<font style=\"margin-left:5px;font-weight:1000;font-family:courier;font-size:20px;\">(rs.)</font>";
		var pro_image="<font style=\"margin-left:20px;font-weight:1000;font-family:courier;font-size:20px;\">Product Image</font>";
				for(var i=1;i<=x;i++)
				{
					var k="<font style=\"margin-left:90px;font-weight:1000;font-family:courier;font-size:25px;\">("+i+")</font>";
					c1.innerHTML+="<p></p>";
					c1.innerHTML+=k;
					c1.innerHTML+=pro_name;
					var element1="<input style=\"margin-left:10px;\" placeholder=\"Enter Product Name\" type=\"text\" name="+j+">";
					c1.innerHTML+=element1;
					j++;
					c1.innerHTML+=pro_price;
					var element2="<input style=\"margin-left:10px;\" placeholder=\"Enter Product Price\" type=\"digit\" name="+j+">";
					c1.innerHTML+=element2;
					j++;
					var j1="product"+j;
					c1.innerHTML+=pro_image;
					var element3="<input style=\"margin-left:10px;\" type=\"file\" name="+j1+">";
					c1.innerHTML+=element3;
					j++;
				}
				}
</script>
<br>	<br>
	<br>
		<center><button class="button" type="submit"><span>Add</span></button></center>
		</form>
</body>
</html>