<html>
<head>
		<title>Booking Status</title>
		<link rel="stylesheet"type="text/css"href="styles.css">
</head>
<style>
body{
margin:0px
}

table {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

th, td {
text-align: left;
padding: 8px;
text-align:center;
text-transform:uppercase;
}

tr:nth-child(even) {
background-color:white;
}

tr {
background-color:white;
}

th {
background-color:#ED3333;
color: white;
font-size:30px;
}

p{
font-size:20px;
color:white;
}

span{
color:white;
font-weight:bold;
font-family:Arial;
}

</style>
<body style="background-color: Black">
<ul>
  <li><a href="firstpage.html">Home</a></li>
  <li><a href="services.html">Services</a></li>
  <li><a href="page3.html">Reviews</a></li>
  <li><a href="page4.html">Contact Us</a></li>
  <li><a class ="active" href="http://localhost/dbmspro/dbmsform.html">Book Now!</a></li>


</ul>
<div class="image" style="background-image:url('title.jpg');">	
		<h1 style="opacity:0.85;">Thankyou</h1>
</div>
<hr>
</BODY>
</HTML>
<?php
$connection = mysqli_connect("localhost", "root", "", "dbms");
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $db_select = mysqli_select_db($connection, "dbms");
    if (!$db_select) {
        die("Database selection failed: " . mysqli_connect_error());
    }
	
if(isset($_POST['submit'])){
$cust_fname = $_POST['cust_fname'];
$cust_lname = $_POST['cust_lname'];
$cust_addr = $_POST['cust_addr'];
$dob = $_POST['dob'];
$cust_dl = $_POST['cust_dl'];
$cust_email = $_POST['cust_email'];
$car_brand=$_POST['car_brand'];
if($cust_fname !=''||$cust_lname !='' || $cust_id != '' || $cust_email != ''){
$sqlCommand="insert into customer values ('$cust_fname', '$cust_lname', '$cust_addr', '$dob','$cust_dl','','$cust_email','$car_brand')";
$query=mysqli_query($connection, $sqlCommand) or die(mysqli_error($connection));

echo "<br/><br/><span>Booking is confirmed. Thanks for your purchase. <br><br> Here are your details:<br><br> </span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank!!</p>";
}

$sqlCommand3 = "select customer.cust_id, customer.cust_fname, customer.cust_email, cars.car_brand, cars.car_noplate, cars.car_cost
from customer, cars
where customer.car_brand=cars.car_brand";
$result=$connection->query($sqlCommand3);
$row=$result->fetch_assoc();
$sql="insert into billing values('".$row['cust_id']."','".$row['cust_fname']."','".$row['cust_email']."','".$row['car_brand']."','".$row['car_noplate']."','".$row['car_cost']."')";

if($connection->query($sql)){
}
else{echo "error".$connection->error;}


$sqldisp="SELECT * FROM billing";
$result1=$connection->query($sqldisp);
	
	echo"<table border=2>";
	echo"<tr><th>Customer ID</th><th>First Name</th><th>Email</th><th>Brand</th><th>No Plate</th><th>Cost</th></tr>";
	echo"<tr><td>".$row['cust_id']."</td><td>".$row['cust_fname']."</td><td>".$row['cust_email']."</td><td>".$row['car_brand']."</td><td>".$row['car_noplate']."</td><td>".$row['car_cost']."</td></tr>";
	echo "</table>";
}
if(isset($_POST['delete'])){ 
$cust_id = $_POST['cust_id'];
if($cust_id !=''){

$sqlCommands = "DELETE FROM customer WHERE cust_id= '$cust_id'";
$sql2="DELETE FROM billing WHERE cust_id='$cust_id'";
$query11=mysqli_query($connection, $sqlCommands) or die(mysqli_error($connection));
$query12=mysqli_query($connection, $sql2) or die(mysqli_error($connection));

echo "<br/><br/><span>Your order is cancelled thanks!</span>";
}
else{
echo "<p>Enter a valid customer id</p>";
}
}
mysqli_close($connection);
?>
