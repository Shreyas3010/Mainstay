<!DOCYTPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>
</head>
<style>
.bt{
    background-color:#f9f9f9;
	height:50px;
	width:50px;
    border: none;
    cursor: pointer;
	margin-left:1444px;
}

.dropdown {
    position: relative;
    display: inline-block;
	
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
</style>
<body background="image/addproduct.jpg" style="background-size:cover;background-repeat:no-repeat;background-position:center">
<div class="a">
<div  class="dropdown">
<button class="bt"><a href="productback.php"><img src="image/option.png" alt="Option" style="width:40px;height:40px;"></a></button>
  <div class="dropdown-content">
    <a href="#">List</a>
    <a href="#">Edit</a>
    <a href="#">Delete</a>
  </div>
</div>
</div>
</body>
</html>
