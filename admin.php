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

</div>
</body>
</html>