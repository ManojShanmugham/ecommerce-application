<?php
session_start();
?>


<html>
<head>
<link href = " products_style.css" rel ="stylesheet" type ="text/css"/>
<title>PRODUCTS</title>
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
echo "<div align = 'right'><input type='submit' class = 'button' name='logout' value='Logout'></div>"
	."<div class='mydiv'>Welcome ".$user_name." <br>". $email."</div>";
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
					
					$query = "SELECT c_type from category";
					$result = mysqli_query($connect,$query) or die(mysqli_error());
					$rows = mysqli_fetch_assoc($result);
					extract($rows);
					echo"<h2><div class='myDiv3'>PRODUCTS</div></h2>
					<div class='myDiv1'>
					<img src='laptop.jpg' alt='Laptops' width='200' height='200'>  </div>
					<div class='myDiv2'>
					<a href='Laptops.php'>$c_type</a>
					</div>";
					
					$rows = mysqli_fetch_assoc($result);
					extract($rows);
					echo"
					<div class='myDiv1'>
					<img src='mobile.jpg' alt='Mobiles' width='200' height='200'> </div>";
					echo"
					<div class='myDiv2'>
					<a href='Mobile.php'>$c_type</a>
					</div>";
					
					
					
					
					
					
					


?>

</body>
</html>