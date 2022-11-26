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
			background-color: rgba(0,0,0,0.1);
			display: inline-block;
			width: 950px;
			height: 660px;
			margin-left: 230px;
			margin-top: 15px;
			padding: 20px;
		}
		h5 {
			text-transform: uppercase;
			font-size: 20px;
		}
		p {
			font-size: 20px;
			text-transform: capitalize;
			border: 2px solid black;
			display: inline-block;
			width: 300px;
			padding: 20px;
			margin-top: -30px;
		}
		table {
			text-transform: capitalize;
			border-radius: 20px;
			font-size: 20px;
		}
		table,th,td {
			border: 2px solid black;
			border-collapse: collapse;
		}
		th,td {
			padding: 20px;
		}
		th {
			background-color: white
		}
	</style>
</head>
<body>
<a href="home.html"><img src="logout.png" style="float:right;width:60px;height:60px;"></a>
<div class="sem">
<?php
$id=$_POST['fid'];

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
	$sql1="SELECT usn1,usn2,pname from five_project where faculty='$id'";
	$record1=$conn->query($sql1);

	echo '<h5>5th sem</h5>';

	if($record1->num_rows==0)
	{
		echo "<p>no group is assigned</p>";
	}
	else
	{
	echo '<table><tr><th>USN-1</th><th>USN-2</th><th>project name</th></tr>';
	while($row1=$record1->fetch_assoc())
	{
		echo '<tr><td>'.$row1['usn1'].'</td><td>'.$row1['usn2'].'</td><td>'.$row1['pname'].'</td></tr>';
	}
	}
	echo '</table>';

	$sql2="SELECT usn1,usn2,pname from six_project where faculty='$id'";
	$record2=$conn->query($sql2);

	echo '<h5>6th sem</h5>';

	if($record2->num_rows==0)
	{
		echo "<p>no group is assigned</p>";
	}
	else
	{
	echo '<table><tr><th>USN-1</th><th>USN-2</th><th>project name</th></tr>';
	while($row2=$record2->fetch_assoc())
	{
		echo '<tr><td>'.$row2['usn1'].'</td><td>'.$row2['usn2'].'</td><td>'.$row2['pname'].'</td></tr>';
	}
	}
	echo '</table>';

	$sql3="SELECT usn1,usn2,usn3,usn4,pname from seven_project where faculty='$id'";
	$record3=$conn->query($sql3);

	echo '<h5>7th sem</h5>';

	if($record3->num_rows==0)
	{
		echo "<p>no group is assigned</p>";
	}
	else
	{
	echo '<table><tr><th>USN-1</th><th>USN-2</th><th>USN-3</th><th>USN-4</th><th>project name</th></tr>';
	while($row3=$record3->fetch_assoc())
	{
		echo '<tr><td>'.$row3['usn1'].'</td><td>'.$row3['usn2'].'</td><td>'.$row3['usn3'].'</td><td>'.$row3['usn4'].'</td><td>'.$row3['pname'].'</td></tr>';
	}
	}
	echo '</table>';
}
?>
</div>
</body>
</html>