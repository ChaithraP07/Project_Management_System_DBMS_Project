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
			height: 600px;
			margin-left: 460px;
			margin-top: 50px;
			padding: 20px;
		}
		label {
			font-size: 20px;
			text-transform: capitalize;
			margin-left: 10px;
		}
		input[type="text"] {
			text-transform: uppercase;
			padding: 10px;
			width: 300px;
			margin-left: 10px;
			border: 1px solid black;
			border-radius: 10px;
			margin-bottom: 10px;
			margin-top: 5px;
			display: inline-block;
			text-align: center;
		}
		input[type="submit"] {
			padding: 15px;
			text-transform: uppercase;
			width: 150px;
			margin-left: 160px;
			margin-top: 80px;
			font-size: 20px;
			background-color: rgb(92, 206, 194);
			border-top: 2px solid black;
			border-left: 2px solid black;
			border-right: 2px solid black;
			border-bottom: 5px solid black;
			border-radius: 20px;
		}
		input[type="submit"]:hover {
			background-color: black;
			color: white;
			border-top: 2px solid white;
			border-left: 2px solid white;
			border-right: 2px solid white;
			border-bottom: 5px solid white;
		}
		p {
			text-transform: capitalize;
			font-size: 35px;
			color: black;
			margin-left: 0px;
			margin-top: 210px;
			text-align: center;
		}
	</style>
</head>
<body>
<div class="sem">
<?php

$usn1=$_POST['group1'];
$usn2=$_POST['group2'];
$usn3=$_POST['group3'];
$usn4=$_POST['group4'];

$host="localhost";
$user="root";
$password="";
$database="miniproject";

$conn=new mysqli($host,$user,$password,$database);

if(mysqli_connect_error())
{
	die("connect error(".mysqli_connect_errno().")".mysqli_connect_error());
}
else
{
	$sql2="SELECT usn1,usn2,usn3,usn4 from seven_project";
	$record=$conn->query($sql2);
	while($row=$record->fetch_assoc())
	{
		if($row['usn1']==$usn1 || $row['usn2']==$usn2 || $row['usn1']==$usn2 || $row['usn2']==$usn1 || $row['usn3']==$usn3 || $row['usn4']==$usn4 || $row['usn1']==$usn3 || $row['usn1']==$usn4 || $row['usn2']==$usn3 || $row['usn2']==$usn4 || $row['usn3']==$usn1 || $row['usn3']==$usn2 || $row['usn3']==$usn3 || $row['usn4']==$usn1 || $row['usn4']==$usn2 || $row['usn4']==$usn3 )
		{
			die("<p>engaged in different group</p>");
		}
	}
	$sql1="INSERT INTO seven_project(usn1,usn2,usn3,usn4)VALUES('$usn1','$usn2','$usn3','$usn4')";
	if($conn->query($sql1)===TRUE)
	{
		echo '<form action="seven_faculty.php" method="post">
				<label for="usn1">USN1</label><br>
				<input type="text" id="usn1" name="usn1" value='.$usn1.'><br>
				<label for="usn2">USN2</label><br>
				<input type="text" id="usn2" name="usn2" value='.$usn2.'><br>
				<label for="usn3">USN3</label><br>
				<input type="text" id="usn3" name="usn3" value='.$usn3.'><br>
				<label for="usn4">USN4</label><br>
				<input type="text" id="usn4" name="usn4" value='.$usn4.'><br>
				<label for="pname">project name</label><br>
				<input type="text" id="pname" name="pname"><br>
				<label for="pdomain">project domain</label><br>
				<input type="text" id="pdomain" name="pdomain"><br>
				<input type="submit" name="submit">
				</form>';
	}
	else
	{
		echo "<p>Engaged in different group</p>";
	}
}
?>
</div>
</body>
</html>