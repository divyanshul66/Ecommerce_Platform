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
<table class="table table-striped">
<tr><th>Order No</th><th>Order Date</th><th>Email</th><th>Amount</th><th>Status</th></tr>
<?php
$res=$conn->query("Select * from Orders");
while($row=$res->fetch_row())
{
	echo "<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "<td>".$row[4]."</td>";
	echo "</tr>";
}
?>
</table>
</div>
</body>
</html>