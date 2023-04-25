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
$msg="";
if(isset($_POST["b1"]))
{
	$s1=$_POST["t1"];
	$s2=$_POST["t2"];
	$s3=$_POST["t3"];
	$s4=$_FILES["t4"]["name"];
	//$n=$_FILE["t4"]["size"];
	$p1=strrpos($s4,".");
	$ext=substr($s4,$p1);
	$nm="c".$s1.$ext;
	$conn->query("Insert into categories values($s1,'$s2','$s3','$nm')");
	move_uploaded_file($_FILES["t4"]["tmp_name"],"products\\".$nm);
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
		<form method='post' enctype='multipart/form-data'>
			<div class="form-group">
				<label>Category Id:</label>
				<input type='number' name='t1' class="form-control">
			</div>
			<div class="form-group">
				<label>Category Name:</label>
				<input type='text' name='t2' class="form-control">
			</div>
			<div class="form-group">
				<label>Description:</label>
				<input type='text' name='t3' class="form-control">
			</div>
			<div class="form-group">
				<label>Category Image:</label>
				<input type='file' accept=".png,.jpg,.jpeg,.gif" name='t4' class="form-control">
			</div>
			<div class="form-group">
				<input type='submit' name='b1' class="btn btn-success">
				<label style='color:red'><?=$msg?></label>
			</div>
		</form>
	</div>
	<div class="col-lg-3"></div>
</div>
<table class="table table-striped">
<tr><th>CID</th><th>Name</th><th>Details</th><th>Image</th></tr>
<?php
$res=$conn->query("Select * from categories");
while($row=$res->fetch_row())
{
	echo "<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	$s=$row[3];
	echo "<td><img src='products/$s' width='50px'></td>";
	echo "</tr>";
}
?>
</table>
</div>
</body>
</html>