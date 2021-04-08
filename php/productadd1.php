<html>
<head>
<link href = " admin_styles.css" rel ="stylesheet" type ="text/css"/>
<title>Quantity Add</title>
</head>

<body>
<h1 align="center"> TECH SCOPE </h1>
<form  method='post'>
<?php
echo "<div align = 'right'><input type='submit' class = 'button1' 
							name='menu' value='Main Menu'/></div>";
if(isset($_POST['menu']))
{
	header("location: Admin.php");
}
$p_id = $quantity = "";


echo "<div class=myDiv4>Enter the Product_ID : <input type='text' name='p_id' value='$p_id'/><br>
		Enter the Quantity : <input type='text' name='quantity' value='$quantity'/></div>";

echo "<div><input type='submit' class = 'button2' 
							name='submitvalue' value='Submit'/></div>";

?>
</form>

<?php
if(isset($_POST['submitvalue']))
{
	if(!empty($_POST['p_id']) && !empty($_POST['quantity']))
	{
		$p_id=$_POST['p_id'];
		$quantity=$_POST['quantity'];
		
		$host="localhost";
		$user="root";
		$password="";
		$database="ecommerce";
		
		$connect=mysqli_connect($host,$user,$password,$database);

		$select = mysqli_select_db($connect,$database);
		
		$query = "update product set availability = availability + '$quantity' where p_id = '$p_id' ";
		
		$result = mysqli_query($connect,$query);
		
		if (mysqli_affected_rows($connect)!=0)
		{
		
		echo "<div class='myDiv2' >$quantity added successfully</div>";
		}
		else 
		{
			echo "<div class='myDiv2' ><b>Please enter the correct product ID</b></div>";;
		}
	}
	else
	{
		echo "<div class='myDiv2' ><b>Please Enter all the fields</b></div>";
	}
}






?>