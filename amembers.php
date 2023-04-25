<?php
include("data.php");
session_start();
if(!isset($_SESSION["EMAIL"]))
{
	header("location:logout.php");
}
else if($_SESSION["UTYPE"]!="admin")
{
	header("location:logout.php");
}
?>
<html>
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<?php include("adminheader.php"); ?>
<div class="container">
<table class="table table-striped">
<tr><th>Email</th><th>Name</th><th>Mobile</th><th>Address</th><th>State</th><th>City</th><th>Pincode</th></tr>
<?php
$res=$conn->query("Select * from members");
while($row=$res->fetch_row())
{
	echo "<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "<td>".$row[4]."</td>";
	echo "<td>".$row[5]."</td>";
	echo "<td>".$row[6]."</td>";
	echo "</tr>";
}
?>
</table>
</div>
</div>
</body>
</html>