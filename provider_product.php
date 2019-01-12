<!DOCYTPE HTML>
<html>
<head>
<title>List</title>
</head>
<style>
.bt{
    background-color:#f9f9f9;
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
</style>
<body background="image/addproduct.jpg" style="background-size:cover;background-repeat:no-repeat;background-position:center">
<div class="a">
<div  class="dropdown">
<button class="bt"><img src="image/option.png" alt="Option" style="width:40px;height:40px;"></button>
  <div class="dropdown-content">
  <a href="provider_addproduct.php" style="font-family:cursive;">Add</a>
    <a href="provider_list.php" style="font-family:cursive;">List</a>
    <a href="provider_productedit.php" style="font-family:cursive;">Edit</a>
    <a href="provider_productdelete.php" style="font-family:cursive;">Delete</a>
  </div>
</div>
</div>
</body>
</html>
