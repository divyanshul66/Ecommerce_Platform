<?php
$total=0;
$n=0;
if(isset($_COOKIE["BASKET"]))
{
	$s=$_COOKIE["BASKET"];
	$arr=explode("#",$s);
	for($i=0;$i<count($arr);$i++)
	{
		$pid=$arr[$i];
		$res=$conn->query("Select price from products where pcode=$pid");
		if($row=$res->fetch_row())
		{
			$s7=$row[0];
			$total=$total+$s7;
			$n++;
		}
	}
}
?>
<table border='0'>
<tr><td rowspan='2'><a href='basket.php'><img src='images/cart.jpg' width='30px'></a></td>
<td><font size='2'><?=$n?> Item(s)</font></td></tr>
<tr><td><font size='2'>Rs <?=$total?>/-</font></td></tr>
</table>