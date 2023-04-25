<table style='width:100%;margin-left:20px'>
<tr>
	<td><a href='index.php'>Home</a></td>
	<td><a href='about.php'>About Us</a></td>
	<td><a href='category.php'>Categorories</a></td>
	<td><a href='products.php'>Products</a></td>
	<?php
		session_start();
		if(isset($_SESSION["EMAIL"]))
		{
			echo "<td><a href='logout.php'>Logout</a></td>";
			echo "<td><a href='profile.php'>My Profile</a></td>";
		}
		else
		{
			echo "<td><a href='login.php'>Login</a></td>";
			echo "<td><a href='register.php'>Register</a></td>";
		}
	?>
	<td><a href='contact.php'>Contact Us</a></td>
	<td><a href='basket.php'><img src='images/cart.jpg' style='width:50px'></a></td>
</tr>
</table>