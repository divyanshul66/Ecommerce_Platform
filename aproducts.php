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
	$s4=$_POST["t4"];
	$s5=$_POST["t5"];
	$s6=$_POST["t6"];
	$s7=$_POST["t7"];
	$s8=$_FILES["t8"]["name"];
	//$n=$_FILE["t4"]["size"];
	$p1=strrpos($s8,".");
	$ext=substr($s8,$p1);
	$nm="p".$s2.$ext;
	$conn->query("Insert into products values($s2,$s1,'$s3','$s4','$s5','$s6',$s7,'$nm')");
	move_uploaded_file($_FILES["t8"]["tmp_name"],"products\\".$nm);
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
				<label>Product Category:</label>
				<select name="t1" class="form-control">
				<?php
					$res=$conn->query("Select * from categories");
					while($row=$res->fetch_row())
					{
						$cid=$row[0];
						$cname=$row[1];
						echo "<option value='$cid'>$cname</option>";
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label>Product Id:</label>
				<input type='number' name='t2' class="form-control">
			</div>
			<div class="form-group">
				<label>Product Name:</label>
				<input type='text' name='t3' class="form-control">
			</div>
			<div class="form-group">
				<label>Brand:</label>
				<input type='text' name='t4' class="form-control">
			</div>
			<div class="form-group">
				<label>Description:</label>
				<input type='text' name='t5' class="form-control">
			</div>
			<div class="form-group">
				<label>Packing:</label>
				<input type='text' name='t6' class="form-control">
			</div>
			<div class="form-group">
				<label>Price:</label>
				<input type='number' name='t7' class="form-control">
			</div>
			<div class="form-group">
				<label>Product Image:</label>
				<input type='file' accept=".png,.jpg,.jpeg,.gif" name='t8' class="form-control">
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
<tr><th>PID</th><th>CID</th><th>Name</th><th>Brand</th><th>Details</th><th>Packing</th><th>Price</th><th>Image</th></tr>
<?php
$res=$conn->query("Select * from Products");
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
	$s=$row[7];
	echo "<td><img src='products/$s' width='50px'></td>";
	echo "</tr>";
}
?>
</table>
</div>
</body>
</html>