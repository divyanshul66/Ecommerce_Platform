<?php
include("data.php");
session_start();
$oid=$_GET["oid"];
$status=$_GET["status"];
if($status=="S")
	$conn->query("Update orders set status='Shipped' where orderno=$oid");
if($status=="D")
	$conn->query("Update orders set status='Delivered' where orderno=$oid");
if($status=="C")
	$conn->query("Update orders set status='Cancelled' where orderno=$oid");
header("location:aorders.php");
?>