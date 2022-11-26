<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			background-image: url('background3.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		.sem {
			background-color: rgba(0,0,0,0.2);
			display: inline-block;
			width: 500px;
			height: 460px;
			margin-left: 460px;
			margin-top: 120px;
			padding: 20px;
		}
		input {
			margin-left: 100px;
			display: inline-block;
			padding: 15px;
			border: 2px solid black;
		}
		.submit {
			margin-left: -20px;
			text-transform: uppercase;
			font-weight: bold;
		}
	</style>
</head>
<body>
<div class="sem">
<?php

$host="localhost";
$user="root";
$password="";
$database="miniproject";

$conn=new mysqli($host,$user,$password,$database);

if(mysqli_connect_error())
{
	die("connect error".mysqli_connect_errno().")".mysqli_connect_error());
}
else
{
	echo '<form action="display.php" method="post">
			<input list="fid" name="fid">
			<datalist id="fid">';
	$sql1="SELECT id from interest";
	$record=$conn->query($sql1);

	while($row=$record->fetch_assoc())
	{
		echo '<option>'.$row['id'].'</option>';
	}
	echo '</datalist><input class="submit" type="submit" name="submit"></form>';
}
?>
</div>
</body>
</html>