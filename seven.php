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
		p {
			text-transform: capitalize;
			font-size: 35px;
			margin-left: 0px;
			margin-top: 190px;
			text-align: center;
		}
	</style>
</head>
<body>
<a href="home.html"><img src="logout.png" style="float:right;width:60px;height:60px;"></a>
<div class="sem">
<?php

$usn=$_POST["usn"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$sgpa1=$_POST["sgpa1"];
$sgpa2=$_POST["sgpa2"];
$sgpa3=$_POST["sgpa3"];
$sgpa4=$_POST["sgpa4"];
$sgpa5=$_POST["sgpa5"];
$sgpa6=$_POST["sgpa6"];

$host="localhost";
$user="root";
$password="";
$database="miniproject";

$conn=new mysqli($host,$user,$password,$database);

if(mysqli_connect_error())
{
	die("Connect Error(".mysqli_connect_errno().")".mysqli_connect_error());
}
else
{
	$cgpa=($sgpa1+$sgpa2+$sgpa3+$sgpa4+$sgpa5+$sgpa6)/6;

	$sql1="INSERT INTO seven_sem(usn,fname,lname,sgpa1,sgpa2,sgpa3,sgpa4,sgpa5,sgpa6,cgpa)VALUES('$usn','$fname','$lname','$sgpa1','$sgpa2','$sgpa3','$sgpa4','$sgpa5','$sgpa6','$cgpa')";

	if($conn->query($sql1)===TRUE)
	{
		echo "<p>successfully stored your information</p>";
	}
	else
	{
		echo "<p>usn is already registered</p>";
	}
	
}
$conn->close();
?>
</div>
</body>
</html>