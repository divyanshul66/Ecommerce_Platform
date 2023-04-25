<?php
include("data.php");
if(isset($_POST["b1"]))
{
	$s1=$_POST["t1"];
	$s2=$_POST["t2"];
	$s3=$_POST["t3"];
	$s4=$_POST["t4"];
	$s5=$_POST["t5"];
	$s6=$_POST["t6"];
	$s7=$_POST["t7"];
	$s8=$_POST["t8"];
	$s9=$_POST["t9"];
	$conn->query("Insert into members values('$s1','$s4','$s5','$s6','$s7','$s8','$s9')");
	$conn->query("Insert into users values('$s1','$s2','member')");
	header("location:thanks.php");
}
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
<form method='post'>
<div class='row'>
	<div class='col-lg-3 col-md-2 col-sm-1'></div>
	<div class='col-lg-6 col-md-8 col-sm-10 col-xs-12'>
		<div class="form-group">
			<label>Email:</label>
			<input type='email' name='t1' class='form-control' placeholder='Enter Your Email' required>
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type='password' name='t2' class='form-control' placeholder='Enter Password' required>
		</div>
		<div class="form-group">
			<label>Re-Password:</label>
			<input type='password' name='t3' class='form-control' placeholder='Re-Type Password' required>
		</div>
		<div class="form-group">
			<label>Name:</label>
			<input type='text' name='t4' class='form-control' placeholder='Enter Name' required>
		</div>
		<div class="form-group">
			<label>Mobile No.:</label>
			<input type='number' name='t5' class='form-control' placeholder='Enter Mobile Number' required>
		</div>
		<div class="form-group">
			<label>Address.:</label>
			<textarea name='t6' class='form-control' placeholder='Enter Complete Address' required></textarea>
		</div>
		<div class="form-group">
			<label>State:</label>
			<select name='t7' class='form-control'>
			<?php
				$res=$conn->query("select distinct states from cities");
				while($row=$res->fetch_row())
				{
					$s=$row[0];
					echo "<option>$s</option>";
				}
			?>
			</select>
		</div>
		<div class="form-group">
					<label>City:</label>
					<select name='t8' class='form-control'>
					<?php
						$res=$conn->query("select distinct city from cities where city is not null order by city");
						while($row=$res->fetch_row())
						{
							echo "<option>".$row[0]."</option>";
						}
					?>
					</select>
		</div>
		<div class="form-group">
			<label>Pin Code.:</label>
			<input type='number' name='t9' class='form-control' placeholder='Enter Pin Code' required>
		</div>
		<div class="form-group">
			<input type='submit' value='Register' name='b1' class='btn btn-success'>
		</div>
	</div>
	<div class='col-lg-3 col-md-2 col-sm-1'></div>
</div>
</form>
</div>
<img src='images/footer.jpg' style='width:100%;height:250px'>
</body>
</html>