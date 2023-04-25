<?php
include("data.php");
?>
<html>
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<img src='images/banner.png' style='width:100%;height:150px'>
<?php include("header.php") ?>
<div class="container">
<div style='width:200;height:300;float:left'>
Welcome <?=$_SESSION["NAME"]?><hr>
<a href='profile.php'>My Profile</a><hr>
<a href='myorders.php'>My Orders</a><hr>
<a href='mypassword.php'>Change Password</a><hr>
<a href='logout.php'>Logout</a><hr>
</div>
<div style='width:80%;height:300;float:left;margin-left:20px'>
<?php
$em=$_SESSION["EMAIL"];
$res=$conn->query("Select * from members where email='$em'");
if($row=$res->fetch_row())
{
	echo "<center><h3>My Profile</h3></center>";
	echo "<table align='center'>";
	echo "<tr><td>Email:</td><td>".$row[0]."</td></tr>";
	echo "<tr><td>Name:</td><td>".$row[1]."</td></tr>";
	echo "<tr><td>Mobile:</td><td>".$row[2]."</td></tr>";
	echo "<tr><td>Adddress:</td><td>".$row[3]."</td></tr>";
	echo "<tr><td>State:</td><td>".$row[4]."</td></tr>";
	echo "<tr><td>City:</td><td>".$row[5]."</td></tr>";
	echo "<tr><td>Pin Code:</td><td>".$row[6]."</td></tr>";
	echo "</table>";
}
?>
</div>
<img src='images/footer.jpg' style='width:100%;height:250px'>
</body>
</html>