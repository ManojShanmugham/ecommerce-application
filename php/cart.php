<?php
session_start();
?>


<html>
<head>
<link href = " products_style.css" rel ="stylesheet" type ="text/css"/>
<title>CART</title>

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

echo "<div align = 'right'><input type = 'submit' class = 'button' name = 'check_out' value = 'CHECK OUT'/>
	<input type='submit' class = 'button' name='logout' value='Logout'/></div>"
	."<div class='mydiv'>Welcome ".$user_name." <br>". $email."</div>";

echo"<h4 align='center'>CART</h4>
	<table>
	<tr>
	<td width='20%' align='center'><strong>BRAND</strong></td>
	<td width='20%' align='center'><strong>MODEL NAME</strong></td>
	<td width='10%' align='center'><strong>COLOR</strong></td>
	<td width='10%' align='center'><strong>PRICE</strong></td>
	<td width='10%' align='center'><strong>STORAGE(GB)</strong></td>
	<td width='10%' align='center'><strong>DISPLAY SIZE(Inches)</strong></td>
	<td width='10%' align='center'><strong>PRODUCT TYPE</strong></td>
	<td width='10%' align='center'><strong>RAM</strong></td>
	<td width='10%' align='center'><strong>QUANTITY</strong></td>
	</tr>";


if(isset($_POST['check_out']))
{
						 
	 header("location: http://localhost/php/checkout.php");
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
					
					$query = "select  M.brand, M.model_name, M.display_size, M.color, M.storage,M.ram ,T.price, T.c_type,T.p_id, count(T.quantity) as quantity
							from Mobile M,
							(select C.quantity,C.p_id, C.u_id, P.price,P.c_type from product P join cart C on P.p_id = C.p_id) T where M.p_id = T.p_id and u_id=$u_id
							group by T.quantity,M.model_name";
							  
					
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					
					
					
					while($rows = mysqli_fetch_assoc($result))
						{
							extract($rows);
							echo "
								<tr>
								<td width='20%' align='center'><strong>$brand</strong></td>
								<td width='20%' align='center'><strong>$model_name</strong></td>
								<td width='10%' align='center'><strong>$color</strong></td>
								<td width='20%' align='center'><strong>$price</strong></td>
								<td width='10%' align='center'><strong>$storage</strong></td>
								<td width='10%' align='center'><strong>$display_size</strong></td>
								<td width='10%' align='center'><strong>$c_type</strong></td>
								<td width='10%' align='center'><strong>$ram</strong></td>
								<td width='10%' align='center'><strong>$quantity</strong></td>
								<td width='10%' align='center'><a href='delete.php?id= $p_id&user_id=$u_id'>Delete</a>
								</tr>
								";
							

						}
						
					$query2 = "select  L.brand, L.model_no, L.display_size, L.color, L.storage, L.ram ,T.price,T.c_type,T.p_id,count(T.quantity) as quantity
							  from Laptop L,(select C.quantity, C.p_id, C.u_id, P.price,P.c_type from product P join cart C on P.p_id = C.p_id) T 
							  where L.p_id = T.p_id and u_id='$u_id' group by T.quantity,L.model_no";
							  
					
					$result2 = mysqli_query($connect,$query2) or die(mysqli_error());
					
					
					
					
					while($rows2 = mysqli_fetch_assoc($result2))
						{
							extract($rows2);
							echo "
								<tr bgcolor='#FFF9C4'>
								<td width='20%' align='center'><strong>$brand</strong></td>
								<td width='20%' align='center'><strong>$model_no</strong></td>
								<td width='10%' align='center'><strong>$color</strong></td>
								<td width='20%' align='center'><strong>$price</strong></td>
								<td width='10%' align='center'><strong>$storage</strong></td>
								<td width='10%' align='center'><strong>$display_size</strong></td>
								<td width='10%' align='center'><strong>$c_type</strong></td>
								<td width='10%' align='center'><strong>$ram</strong></td>
								<td width='10%' align='center'><strong>$quantity</strong></td>
								<td width='10%' align='center'><a href='delete.php?id= $p_id&user_id=$u_id'>Delete</a>
								
								</tr>
								";

						}
?>			
					


