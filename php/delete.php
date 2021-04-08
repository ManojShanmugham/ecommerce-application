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
			$id =$_GET['id'];
			$u_id =$_GET['user_id'];
			echo $id;
			$del=mysqli_query($connect,"DELETE FROM cart WHERE p_id='$id' AND u_id='$u_id'");
			header("Location:http://localhost/php/cart.php");
?>