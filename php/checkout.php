<?php
session_start();
?>

<html>
<head>
<link href = " products_style.css" rel ="stylesheet" type ="text/css"/>
<title>CHECK OUT</title>

</head>

<body>

<h1 align="center"> TECH SCOPE </h1>

<form action="" method="POST">
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
	
	$card_no=$cvv=$valid="";
echo "<div align = 'right'><input type='submit' class = 'button' name='logout' value='Logout'></div>"
	."<div class='mydiv'>Welcome ".$user_name." <br>". $email."</div>";

echo"<h3 align='center'>FINAL CHECK</h3>
	<table>
	<tr>
	<td width='10%' align='center'><strong>Product Name</strong></td>
	<td width='10%' align='center'><strong> Quantity </strong></td>
	<td width='10%' align='center'><strong> Total Price </strong></td>
	</tr>";
	
echo "<div class='myDiv4'> Enter Card Number :<input type = 'text' name ='card_no' value ='$card_no'/><br>
	  CVV : <input type = 'text' name ='cvv' value ='$cvv' /><br>
	  Valid Thru : <input type = 'text' name ='valid' value ='$valid'/><br>
	  <input type = 'submit' class='button1' name = 'submit' value = 'SUBMIT' /></div>";


?>

</form>

<?php 

					$host="localhost";
					$user="root";
					$password="";
					$database="ecommerce";
					$user_name = $_SESSION['user_name'];
		
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
					
					
					$user_query = "SELECT u_id 
								   FROM user_ids
								   WHERE user_name = '$user_name' ";
								   
					
					$user_result = mysqli_query($connect,$user_query);
					$row2 = mysqli_fetch_assoc($user_result);
					extract($row2);
				
				
					$query = "  select P.p_name , P.price*count(C.quantity) as total_price,count(C.quantity) as quantity
								from product P, cart C where P.p_id = C.p_id and C.u_id='$u_id'
								group by P.p_name,C.quantity";
					
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					
					
					
					
					while($rows = mysqli_fetch_assoc($result))
						{
							extract($rows);
							echo "
								<tr>
								<td width='10%' align='center'><strong>$p_name </strong></td>
								<td width='10%' align='center'><strong>$quantity </strong></td>
								<td width='10%' align='center'><strong>$total_price</strong></td>
								</tr>	
								";
						}
					
					$query2 = "select sum(Total_Price) as totals
							   from (select P.p_name , P.price*count(C.quantity) as Total_Price from product P, cart C 
							   where P.p_id = C.p_id AND C.u_id='$u_id' group by P.p_name,C.quantity)AS T";
					
					$result2 = mysqli_query($connect,$query2) or die(mysqli_error());
					while($rows2 = mysqli_fetch_assoc($result2))
						{
							extract($rows2);
							
							echo "<table>
								<tr>
								<td width='49.5%' align='center'><strong>Total </strong></td>
								<td width='20%' align='center'><strong>$totals </strong></td>
								</tr>	
								";
						}

					if (isset($_POST['submit']))
					{
							
						$date  =  date("Y-m-d") ;
						$user_name = $_SESSION['user_name'];
						$user_query = "SELECT u_id 
								   FROM user_ids
								   WHERE user_name = '$user_name' ";
								   
					
						$user_result = mysqli_query($connect,$user_query);
					
						$row2 = mysqli_fetch_assoc($user_result);
						extract($row2);
						
						$pid_query = "  select P.p_id,count(C.quantity) as quantity from product P, cart C 
										where P.p_id = C.p_id AND C.u_id='$u_id' group by C.p_id,C.u_id";
																
						$pid_result = mysqli_query($connect,$pid_query);
						
						$o_id  = rand(10000,99999); 
						while($rows3 = mysqli_fetch_assoc($pid_result))
						{
							extract($rows3);
							$insert_query = "insert into orders values ('$date','$quantity','$p_id','$u_id','$o_id')";
							$result_i = mysqli_query($connect,$insert_query);
							
							$update_query = "update product set availability = availability - '$quantity' where p_id = '$p_id' ";
							$update_result = mysqli_query($connect,$update_query);				
						}
						
						$oid_query = "insert into orders_details select O.p_id, O.o_id, P.p_name, (P.price*O.quantity) as price, P.c_type, O.order_date, O.quantity, O.u_id 
									from product P JOIN orders O on P.p_id = O.p_id and O.o_id='$o_id'";
						
						
						$o_id_result = mysqli_query($connect,$oid_query);
						
						$_SESSION['id'] = $o_id;
						
						$del_query = "delete from cart where u_id = '$u_id'";
						
						$del_result = mysqli_query($connect,$del_query);
						
						
						header("location: http://localhost/php/exit.php");
					}
					


?>

