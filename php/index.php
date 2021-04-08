<html>
<head>
<link href="login_style.css" rel='stylesheet' type='text/css' />
<title>Sign Up</title>
</head>

<body>
<h1 align="center"> TECH SCOPE </h1>
<form  method='post'>


<?php 

$fname=$lname=$email=$phone_no=$submit=$password=$address=$user_name="";

	


echo "	
<table align='center' border='1' cellpadding='10' bgcolor='#afeeee' style='margin-left:350px;margin-top:50px'>

<tr><td><strong>First Name</strong></td><td> <input type='text' name='fname' value='$fname' /></td></tr>

<tr><td><strong>Last Name</strong></td><td><input type='text' name='lname' value='$lname' /></td></tr>

<tr><td><strong>Username</strong></td><td><input type='text' name='user_name' value='$user_name'/></td> </tr>

<tr><td><strong>Email:</strong></td><td><input type='text' name='email' value='$email'/></td></tr>

<tr><td><strong>Phone no.:</strong></td><td><input type='text' name='phone_no' value='$phone_no'/></td> </tr>

<tr><td><strong>Password:</strong></td><td><input type='password' name='password' value='$password'/></td> </tr>

<tr><td><strong>Address:</strong></td><td><input type='text' name='address' value='$address'/></td> </tr>

<tr><td colspan='2' align='right'><input type='submit' name='submitvalue' value='Sign Up' /></td></tr>

</table>";

echo "<div class='new1'><a href = 'login.php'>Already Have a Account?</a></div>";

?>
</form>

<?php

if(isset($_POST['submitvalue']))
{
	
	if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['phone_no']) && !empty($_POST['password']) && !empty($_POST['address']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$username=$_POST['user_name'];
		$email=$_POST['email'];
		$phone=$_POST['phone_no'];
		$userpassword=$_POST['password'];
		$address=$_POST['address'];
		
		
		
				if(!preg_match("/^[a-zA-Z]*$/",$fname))
				{echo "<div class='mydiv'><b> Only letters and white space allowed in Name!!</b></div>";
				exit();}
				elseif(!preg_match("/^[a-zA-Z]*$/",$lname))
				{echo "<div class='mydiv'><b> Only letters and white space allowed in Name!!</b></div>";
				exit();}
				elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
				{echo "<div class='mydiv'><b>Invalid email format!!</b></div>"; 
				exit();}
				elseif(!preg_match('/^[0-9]{10}+$/',$phone))
				{echo "<div class='mydiv'><b> Phone number should be of 10 digits!!</b></div>";
				exit();}
				else
				{
					//DATABASE CONNECT AFTER VALIDIATION.....
					//$flag=0;
					$host="localhost";
					$user="root";
					$password="";
					$database="ecommerce";
					$u_id = rand(10000,99999);
		
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
					
										
					$data = "INSERT INTO user_ids VALUES 
					('$u_id','$fname','$lname','$email','$username','$address','$phone','$userpassword'); ";
					
					$result = mysqli_query($connect,$data);
					if($result)
					{
						echo "<div class='mydiv'><b>Congratulations!! Your account has been created!!!<br>Please LOGIN to continue..
						</b></div>";
					
					}
					else
					die(mysqli_error($connect));
					
					
				}
				
		
	}
	
	else
	{
		echo "<div class='myDiv'><b>Please enter all fields</b></div>";	
	}
	
	
}
else
{}

if(isset($_POST['login']))
{
	header("location: login.php");
}

?>

</body>
</html>


