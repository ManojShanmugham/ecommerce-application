<?php
session_start();
?>

<html>
<head>
<link href = " products_style.css" rel ="stylesheet" type ="text/css"/>
<title>Exit</title>
<body>

<h1 align="center"> TECH SCOPE </h1>

<h2 align = "center"> Your Order has been placed. Thank you so much for shopping </h2>

</head>
<form method='post'>
<?php

	$user_name=$email="";
	if(isset($_SESSION["user_name"]) && isset($_SESSION["email"]))
	{
		$user_name = $_SESSION['user_name'];
		$email = $_SESSION['email'];
	}
if(isset($_POST['logout']))
{
	session_destroy();
	header("location: http://localhost/php/login.php");
	exit();
}
echo "<div align = 'right'><input type='submit' class = 'button' name='logout' value='Logout'>
<input type ='submit' class ='button' name = 'continue' value = 'Continue Shopping' /></div>";


echo "<h3 align='center'>Order_details</h3>
	<table>
	<tr>
	<td width='10%' align='center'><strong>Order_Id</strong></td>
	<td width='10%' align='center'><strong>Name</strong></td>
	<td width='10%' align='center'><strong>Price </strong></td>
	<td width='10%' align='center'><strong>Order_date</strong></td>
	<td width='10%' align='center'><strong>Caegory</strong></td>
	
	</tr>";



				 

?>	
</form>

<?php
					$host="localhost";
					$user="root";
					$password="";
					$database="ecommerce";
		
					$connect=mysqli_connect($host,$user,$password,$database);
					if($connect)
					{
					}
					else
					die(mysqli_error());
					
					if (mysqli_connect_errno())
  					{
  						echo "Failed to connect to server: " . mysqli_connect_error();
  					}
		
					$select = mysqli_select_db($connect,$database);
					if($select)
					{
					}
					else
					die(mysqli_error($connect));
				

					$id =$_SESSION['id'];
				
					$sell=mysqli_query($connect,"Select * from orders_details where o_id = $id ");
				
					while($rows = mysqli_fetch_assoc($sell))
						{
							extract($rows);
							echo "
								<td width='10%' align='center'><strong>$o_id</strong></td>
								<td width='10%' align='center'><strong>$p_name</strong></td>
								<td width='10%' align='center'><strong>$price </strong></td>
								<td width='10%' align='center'><strong>$order_date</strong></td>
								<td width='10%' align='center'><strong>$c_type</strong></td>
								
								</tr>
								";

						}
					
				
					if(isset($_POST['continue']))
{
						 
	 header("location: http://localhost/php/products.php");
}
					
					
?>