<?php
include("data.php");
$msg=" ";
if(isset($_POST["b1"]))
{
	$s1=$_POST["t1"];
	$s2=$_POST["t2"];
	$res=$conn->query("Select * from users where email='$s1' and password='$s2'");
	if($row=$res->fetch_assoc())
	{
		$s=$row["utype"];
		if($s=="member")
		{
			$res1=$conn->query("Select * from members where email='$s1'");
			if($row1=$res1->fetch_row())
			{
				$nm=$row1[1];
				session_start();
				$_SESSION["EMAIL"]=$s1;
				$_SESSION["NAME"]=$nm;
				$_SESSION["UTYPE"]="member";
				header("location:index.php");
			}
		}
		if($s=="admin")
		{
			session_start();
			$_SESSION["EMAIL"]=$s1;
			$_SESSION["NAME"]="Administrator";
			$_SESSION["UTYPE"]="admin";
			header("location:admin.php");
		}
	}
	else
	{
		$msg="Invalid Login/ Password!!!";
	}
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
			<input type='submit' value='Login' name='b1' class='btn btn-success'>
			<div style='color:red'><?=$msg?></div>
		</div>
	</div>
	<div class='col-lg-3 col-md-2 col-sm-1'></div>
</div>
</form>
</div>
<img src='images/footer.jpg' style='width:100%;height:250px'>
</body>
</html>