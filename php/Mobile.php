<?php
session_start();
?>


<html>
<head>
<link href = " products_style.css" rel ="stylesheet" type ="text/css"/>
<title>MOBILE PHONES</title>

</head>

<body>

<h1 align="center"> TECH SCOPE </h1>
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

echo "<div align = 'left'><input type = 'submit' class = 'button' name = 'back' value = ' BACK '/></div>";

echo "<div align = 'right'><input type = 'submit' class = 'button' name = 'ocart' value = ' CART '/>
		<input type='submit' class = 'button' name='logout' value='Logout'/></div>"
	."<div class='mydiv'>Welcome ".$user_name." <br>". $email."</div>";

echo"<h4 align='center'>MOBILE PHONES</h4>
	<table>
	<tr>
	<td width='20%' align='center'><strong>BRAND</strong></td>
	<td width='20%' align='center'><strong>MODEL NAME</strong></td>
	<td width='10%' align='center'><strong>COLOR</strong></td>
	<td width='10%' align='center'><strong>PRICE</strong></td>
	<td width='10%' align='center'><strong>RAM</strong></td>
	<td width='10%' align='center'><strong>STORAGE(GB)</strong></td>
	<td width='10%' align='center'><strong>DISPLAY SIZE(Inches)</strong></td>
	</tr>";


if (isset($_POST['ocart']))
	{
		header("location: http://localhost/php/cart.php");
		
	}

if (isset($_POST['back']))
	{
		
		header("location: products.php ");
		
	}


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
				
					$user_name = $_SESSION['user_name'];
						$user_query = "SELECT u_id 
								   FROM user_ids
								   WHERE user_name = '$user_name' ";
								   
					
						$user_result = mysqli_query($connect,$user_query);
					
						$row2 = mysqli_fetch_assoc($user_result);
						extract($row2);
					
					$query = "SELECT brand,model_name,color,storage,display_size,price,ram,P.p_id,P.availability as qty
							  FROM category C,product P JOIN mobile M
							  WHERE C.c_type = 'Laptop' AND P.P_id = M.P_id";
					
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					$quantity = '1';
					
					
					
					
					while($rows = mysqli_fetch_assoc($result))
						{
							extract($rows);
							if ("$qty" >0)
							{
							echo "
								<tr>
								<td width='20%' align='center'><strong>$brand</strong></td>
								<td width='20%' align='center'><strong>$model_name</strong></td>
								<td width='10%' align='center'><strong>$color</strong></td>
								<td width='10%' align='center'><strong>$price</strong></td>
								<td width='10%' align='center'><strong>$ram</strong></td>
								<td width='10%' align='center'><strong>$storage</strong></td>
								<td width='10%' align='center'><strong>$display_size</strong></td>
								<td width='20%' align='center'><a href='insert1.php?p_id=$p_id&user_id=$u_id&qty=$quantity'>Add to CART</a>
									
								</tr>
								";
							}

						}
						
						
						
?>



