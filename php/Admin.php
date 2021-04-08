<html>
<head>
<link href = " admin_styles.css" rel ="stylesheet" type ="text/css"/>
<title>Admin</title>
</head>

<body>
<h1 align="center" >TECH SCOPE</h1>
<form  method='post'>
<?php
echo "<div align = 'right'><input type='submit' class = 'button1' 
							name='login' value='Login'/></div>";
if(isset($_POST['login']))
{
	header("location: Login.php");
}


echo "<div align = 'center'><input type='submit' class = 'button' name='o_details' value='Order Details'/></div>";
	
if(isset($_POST['o_details']))
{
	header("Location:order_details.php");

}



echo "<div align = 'center'><input type='submit' class = 'button' 
						name='addprod' value='Add a New Product'/></div>";

if(isset($_POST['addprod']))
{
	header("Location: productadd.php");

}



echo "<div align = 'center'><input type='submit' class = 'button' 
							name='addprod1' value='Add items to Existing product'/></div>";

if(isset($_POST['addprod1']))
{
	header("Location:productadd1.php");

}
?>
</form>

