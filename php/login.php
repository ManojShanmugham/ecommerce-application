<?php
session_start();
?>


<html>
<head>
<link href="login_style.css" rel='stylesheet' type='text/css' />
<title>Login</title>
</head>

<body>
<h1 align="center"> TECH SCOPE</h1>
<form  method='post'>

<?php 

$password=$user_name="";

	

	if(isset($_POST['user_name']))
	{$user_name= $_POST['user_name'];}

	if(isset($_POST['password']))
	{$password= $_POST['password'];}

echo "	<br><br><br><br><br><br>
<table align='left' border='1' cellpadding='10' bgcolor='#afeeee' style='margin-left:100px'>
<tr><td><strong>Username</strong></td><td><input type='text' name='user_name' value='$user_name'/></td> </tr>
<tr><td><strong>Password:</strong></td><td><input type='password' name='password' value='$password'/></td> </tr>
<tr><td colspan ='1' align='left'><input type='button' class = 'button' name='admin' value='Admin' onclick='login()'></td><td colspan='2' align='right'><input type='submit' name='submitvalue' value='Sign In' /></td></tr>
	</table>";
echo "<div class='new'><a href = 'index.php'>New User?</a></div>";

?>
</form>

<?php

if(isset($_POST['submitvalue']))
{
	
	if(!empty($_POST['user_name']) && !empty($_POST['password']))
	{
		
					$myusername= $_POST['user_name']; 
					$mypassword= $_POST['password']; 
					$row_count="";
					//DATABASE CONNECT AFTER VALIDIATION.....
					//$flag=0;
					$host="localhost";
					$user="root";
					$password="";
					$database="ecommerce";
		
					$connect=mysqli_connect($host,$user,$password,$database);
					if($connect)
					{//echo "Connected to the server...!!";
					}
					else
					die(mysqli_error());
					
					if (mysqli_connect_errno())
  					{
  						echo "Failed to connect to server: " . mysqli_connect_error();
  					}
		
					$select = mysqli_select_db($connect,$database);
					if($select)
					{//echo "Selected Database...!!";
					}
					else
					die(mysqli_error($connect));
										
					
					$myusername = mysqli_real_escape_string($connect,$_POST['user_name']);
					$mypassword = mysqli_real_escape_string($connect,$_POST['password']);

					// Retrieve username and password from database according to user's input
						$login = mysqli_query($connect, " SELECT email FROM user_ids WHERE user_name = '$myusername'
						 and password = '$mypassword' ") or die(mysqli_error($connect));

						while($rows = mysqli_fetch_assoc($login))
						{
							extract($rows);
							$_SESSION['email'] = $email;
						}

						
						// Check username and password match
						$row_count = mysqli_num_rows($login);
						
						if (mysqli_num_rows($login) == 1) {
						// Set username session variable
						$_SESSION['user_name'] = $_POST['user_name'];
						
						// Jump to secured page
						header('Location: products.php');
						}
						else {
						// Jump to login page
							echo "<div class='myDiv1'><strong>Invalid Username or Password</strong></div>";
						}

							}
							
							else
							{
								echo "<div class='myDiv1'><b>Please enter all fields</b></div>";	
							}
							
							
						}

else
{}

if(isset($_POST['login']))
{
	header("location: login.php");
}

?>

<script type="text/javascript">
function login()
{
var username=prompt("Enter usename");
var password=prompt("Enter password");
if(username=="admin" && password=="admin")
window.location="http://localhost/php/Admin.php";
else
alert("Invalid username password");
}
</script>
</body>
</html>
