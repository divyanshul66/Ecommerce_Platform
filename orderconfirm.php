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
<?php
$res=$conn->query("Select count(*)+1 from orders");
$orderid="";
if($row=$res->fetch_row())
{
	$orderid=$row[0];
}
$s=$_COOKIE["BASKET"];
$arr=explode("#",$s);
$total=0;
for($i=0;$i<count($arr);$i++)
{
	$pid=$arr[$i];
	$res=$conn->query("Select * from products where pcode=$pid");
	if($row=$res->fetch_assoc())
	{
		$s1=$row["pcode"];
		$s2=$row["cid"];
		$s3=$row["pname"];
		$s4=$row["brand"];
		$s5=$row["description"];
		$s6=$row["packing"];
		$s7=$row["price"];
		$total=$total+$s7;
		$conn->query("Insert into orderdetails values($orderid,$s1,'$s3','$s5','$s6',$s7,1)");
	}
}
$x1=date('Y-m-d');
$x2=$_SESSION["EMAIL"];
$conn->query("Insert into orders values($orderid,'$x1','$x2',$total,'New Order')");
setcookie("BASKET","AA",time()-1);
?>
<div style='text-align:center'>
	<h3>Thanks for Your Order.<br>
	Your Order No is <?=$orderid?><br>
	All Orders are COD<br>We will send SMS Confirmation for your Order<br>
	Happy Shopping</h3>
	<a href='index.php'>Continue</a>
</div>
</div>
<img src='images/footer.jpg' style='width:100%;height:250px'>
</body>
</html>