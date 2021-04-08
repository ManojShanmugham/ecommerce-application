<html>
<head>
<link href = " admin_styles.css" rel ="stylesheet" type ="text/css"/>
<title>Product Add</title>
</head>

<body>
<h1 align="center"> TECH SCOPE</h1>
<form  method='post'>
<?php

echo "<div align = 'right'><input type='submit' class = 'button1' 
							name='menu' value='Main Menu'/></div>";
if(isset($_POST['menu']))
{
	header("location: Admin.php");
}

$p_id=$p_name=$price=$quantity=$c_type=$brand=$model_name=$color=$ram=$storage=$display="";


echo "	
<table align='center' border='1' cellpadding='10' bgcolor='#afeeee'>

<tr><td><strong>Product_ID</strong></td><td> <input type='text' name='p_id' value='$p_id' /></td></tr>

<tr><td><strong>Product Name</strong></td><td><input type='text' name='p_name' value='$p_name' /></td></tr>

<tr><td><strong>Price:</strong></td><td><input type='text' name='price' value='$price' /></td></tr>

<tr><td><strong>Quantity</strong></td><td><input type='text' name='quantity' value='$quantity'/></td> </tr>

<tr><td><strong>Category</strong></td><td><input type='text' name='c_type' value='$c_type'/></td></tr>

<tr><td><strong>Brand :</strong></td><td><input type='text' name='brand' value='$brand'/></td> </tr>

<tr><td><strong>Model Name:</strong></td><td><input type='text' name='model_name' value='$model_name'/></td> </tr>

<tr><td><strong>Color:</strong></td><td><input type='text' name='color' value='$color'/></td> </tr>

<tr><td><strong>RAM:</strong></td><td><input type='text' name='ram' value='$ram'/></td> </tr>

<tr><td><strong>Storage:</strong></td><td><input type='text' name='storage' value='$storage'/></td> </tr>

<tr><td><strong>Display Size:</strong></td><td><input type='text' name='display' value='$display'/></td> </tr>

<tr><td colspan='2' align='right'><input type='submit' name='submitvalue' value='Submit' /></td></tr>


</table>";



?>

</form>

<?php

if(isset($_POST['submitvalue']))
{
	
	if(!empty($_POST['p_id']) && !empty($_POST['p_name']) && !empty($_POST['price'])&& !empty($_POST['quantity']) && !empty($_POST['c_type']) && !empty($_POST['brand']) && !empty($_POST['model_name']) && !empty($_POST['color']) && !empty($_POST['ram'])&& !empty($_POST['storage']) && !empty($_POST['display']))
	{
		$p_id=$_POST['p_id'];
		$p_name=$_POST['p_name'];
		$price=$_POST['price'];
		$quantity=$_POST['quantity'];
		$c_type=$_POST['c_type'];
		$brand=$_POST['brand'];
		$model_name=$_POST['model_name'];
		$color=$_POST['color'];
		$ram=$_POST['ram'];
		$storage=$_POST['storage'];
		$display=$_POST['display'];
		
		
		$host="localhost";
		$user="root";
		$password="";
		$database="ecommerce";
		
		$connect=mysqli_connect($host,$user,$password,$database);

		$select = mysqli_select_db($connect,$database);
		
		$query = "insert into product values ('$p_id','$p_name','$price','$quantity','$c_type')";
		
		$result = mysqli_query($connect,$query);

		
		
		if ($c_type == 'Laptop')
		{
			$query2 = "insert into laptop values ('$p_id','$c_type','$brand','$model_name','$color','$ram','$storage','$display')";
		
			$result1 = mysqli_query($connect,$query2);
			
			echo "<div class='myDiv1'><b>Product Added successfully</b></div>";
		}
		else if ($c_type == 'Mobile')
		{
			$query3 = "insert into mobile values ('$p_id','$c_type','$brand','$model_name','$display','$color','$storage','$ram')";
		
			$result2 = mysqli_query($connect,$query3);
			
			echo "<div class='myDiv1'><b>Product Added successfully</b></div>";

		}
		else 
		{
			echo  "<div class='myDiv1'><b>Incorrect Product Type</b></div>";
		}

	}
	else 
	{
		echo "<div class='myDiv1'><b>Please Enter All Fields</b></div>";
	}
	
}

?>