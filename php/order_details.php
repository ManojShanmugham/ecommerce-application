<html>
<head>
<link href = " admin_styles.css" rel ="stylesheet" type ="text/css"/>
<title>Admin</title>
</head>

<body>
<h1 align="center" > TECH SCOPE </h1>

<h2 align="center" > ORDER DETAILS </h2>
<form method ='post'>
<?php
$o_id ="";


echo "Enter the Order_ID : <input type='text' name='o_id' value='$o_id'/>";

echo "<div><input type='submit' class = 'button3' 
							name='submitvalue' value='Submit'/></div>";
	

echo"
	<table border='1' bgcolor='#00B8D4' align='center' width='50%' style='margin-top:50px; margin-left:50px;'>
	<tr>
	<td width='20%' align='center'><strong>FIRST NAME</strong></td>
	<td width='20%' align='center'><strong>LAST NAME</strong></td>
	<td width='20%' align='center'><strong>PRODUCT NAME</strong></td>
	<td width='10%' align='center'><strong>QUANTITY</strong></td>
	<td width='10%' align='center'><strong>PRICE</strong></td>
	<td width='10%' align='center'><strong>ORDER DATE</strong></td>

	</tr>";

echo "<div align = 'right'><input type='submit' class = 'button1' 
							name='menu' value='Main Menu'/></div>";
if(isset($_POST['menu']))
{
	header("location: Admin.php");
}


?>
</form>
<?php

if(isset($_POST['submitvalue']))
{
	if(!empty($_POST['o_id']))
		{
			$o_id=$_POST['o_id'];
			$host="localhost";
			$user="root";
			$password="";
			$database="ecommerce";
		
			$connect=mysqli_connect($host,$user,$password,$database);

			$select = mysqli_select_db($connect,$database);
			
				
			$query = "select U.fname, U.lname , O.p_name, O.order_date,O.o_id, O.quantity, O.price 
					  from orders_details O, user_ids U where O.u_id = U.u_id AND O.o_id = '$o_id'";

			$result = mysqli_query($connect,$query);
			
			
			while($rows = mysqli_fetch_assoc($result))
			{
				extract($rows);
				echo "
					  <tr bgcolor='#FFF9C4'>
					  <td width='20%' align='center'><strong>$fname</strong></td>
					  <td width='20%' align='center'><strong>$lname</strong></td>
					  <td width='10%' align='center'><strong>$p_name</strong></td>
					  <td width='10%' align='center'><strong>$quantity</strong></td>
					  <td width='10%' align='center'><strong>$price</strong></td>					  
					  <td width='20%' align='center'><strong>$order_date</strong></td>
					  </tr>";
			}
		}
	
	else{
		echo "$o_id not connected";
	}
}


?>

