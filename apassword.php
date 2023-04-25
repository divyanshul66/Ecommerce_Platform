<?php
include("data.php");
session_start();
$msg="";
if(!isset($_SESSION["EMAIL"]))
{
	header("location:logout.php");
}
else if($_SESSION["UTYPE"]!="admin")
{
	header("location:logout.php");
}
if(isset($_POST["b1"]))
{
	$s1=$_POST["t2"];
	$s2=$_SESSION["EMAIL"];
	$s3=$_POST["t1"];
	$res=$conn->query("Select * from users where email='$s2' and upassword='$s3'");
	if($row=$res->fetch_row())
	{
		$conn->query("Update users set upassword='$s1' where email='$s2'");
		$msg="Password Updated Successfully";
	}
	else
		$msg="Invalid Old Password !!!";
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
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		<form method='post'>
			<div class="form-group">
				<label>Old Password:</label>
				<input type='password' name='t1' class="form-control" placeholder="Enter Old Password" required>
			</div>
			<div class="form-group">
				<label>New Password:</label>
				<input type='password' name='t2' class="form-control" placeholder="Enter New Password" required>
			</div>
			<div class="form-group">
				<label>Re Type Password:</label>
				<input type='password' name='t3' class="form-control" placeholder="Enter New Password Again" required>
			</div>
			<div class="form-group">
				<input type='submit' name='b1' class="btn btn-success form-control" value='Update Password'>
			</div>
			<div class="form-group">
				<label style='color:red'><?=$msg?></label>
			</div>
		</form>
	</div>
	<div class="col-lg-3"></div>
</div>
</div>
</body>
</html>