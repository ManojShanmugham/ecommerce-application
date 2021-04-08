<?php
session_start();
?>
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
			$p_id =$_GET['p_id'];
			$u_id =$_GET['user_id'];
			$quantity =$_GET['qty'];
			echo $p_id;
			echo $u_id;
			echo $quantity;
			$ins=mysqli_query($connect,"insert into cart values('$quantity','$p_id','$u_id')");
			header("Location:http://localhost/php/Laptops.php");
?>