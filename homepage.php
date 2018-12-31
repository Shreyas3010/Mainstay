<!DOCYTPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home page</title>
</head>
<style>
.modal {
	margin-left:10%;
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	
}

/* Modal Content */
.modal-content {
	background-image: url("image/info1.jpg");
    <!--color:#1DCAE7;-->
	margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
	font-size:30px;
	font-family:courier;
	font-weight:900;
	text-align:center;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.a{
	 transform: rotate(-2deg);
	background-color:Transparent;
	border:none;
	 color:#FEE5AC;
	 margin-left:17%;
	 margin-top:8%;
	 font-family:courier;
	 font-size:65pt;
	cursor:pointer;
	}
button:hover {
  color: grey ;
  <!-background-color:#def;> 
}
.b{
	color:#F8F8FF;
	font-family:cursive;
	border:none;
	background-color:transparent;
	width:200px;
	height:60px;
	font-size:30pt;
	transform: rotate(-2.5deg);
	margin-top:2%;
	margin-left:15%;
	cursor:pointer;
<!--	-ms-transform: skewY(-2deg); /* IE 9 */
    -webkit-transform: skewY(-2deg); /* Safari 3-8 */
    transform: skewY(-2deg); NOT Working-->
}
.c{
	color:#F8F8FF;
	font-family:cursive;
	border:none;
	background-color:transparent;
	width:200px;
	height:60px;
	cursor:pointer;
	font-size:30pt;
	margin-left:5%;
	<!--transform: rotate(20deg);
	-ms-transform: skewY(20deg); /* IE 9 */
    -webkit-transform: skewY(20deg); /* Safari 3-8 */
    transform: skewY(-2deg); NOT Working-->
	}

</style>
<body background="image/homepagenew1.jpg" style="background-size:cover;background-repeat:no-repeat;background-position:center">
<button class="a"><i>Mainstay</i></button>
<br>
<br>
<br><br><br><br>
<button class="b" onclick="location.href='http://localhost/Project/customer_signup.php'">Customer</button>
<button class="c" onclick="location.href='http://localhost/Project/provider_signup.php'" >Provider</button>
<br>
<button style="font-family:cursive;border:none;background-color:transparent;width:200px;height:60px;font-size:20pt;transform: rotate(-2.5deg);margin-top:3%;margin-left:1195px;cursor:pointer;" id="myBtn">Who am I?</button>

<div id="myModal" class="modal">

  <div class="modal-content">
    <span class="close">&times;</span>
    <p>I'm Shreyas Patel,
		Btech 3rd Year, NIT SURAT</p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onmouseover= function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick= function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>

</html>