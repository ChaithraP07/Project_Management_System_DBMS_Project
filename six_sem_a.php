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
		div {
			display: inline-block;
			margin-left: 35px
		}
		.section {
			margin-top: -20px;
			margin-left: 20px;
		}
		label {
			font-size: 20px;
			text-transform: uppercase;
		}
		select {
			display: inline-block;
			padding: 15px;
			width: 200px;
			border: 2px solid black;
		}
		input[type="submit"] {
			padding: 15px;
			text-transform: uppercase;
			width: 150px;
			margin-left: 140px;
			margin-top: 300px;
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
	die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else
{
	$sql1="SELECT usn,cgpa FROM six_sem order by cgpa desc";
	$record=$conn->query($sql1);

	$total=0;

	while($row=$record->fetch_assoc())
	{
		$total++;
	}

	$group=$total/2;
	$n1=1;
    
    echo '<form action="six_project.php" method="post">
    		<div>
    		<label for="group1">group-1</label><br>
    		<select id="group1" name="group1">';

	$record1=$conn->query($sql1);
	while($row1=$record1->fetch_assoc())
	{
		if($n1<=$group)
		{
			echo '<option>'.$row1['usn'].'</option>';
		}
		$n1++;
	}
	echo '</div></select>';

	$n2=1;

	echo '<div class="section">
			<label for="group2">group-2</label><br>
			<select id="group2" name="group2">';

	$record2=$conn->query($sql1);
	while($row2=$record2->fetch_assoc())
	{
		if($n2>$group && $n2<=($group+$group))
		{
			echo '<option>'.$row2['usn'].'</option>';
		}
		$n2++;
	}
	echo '</div></select>';	
}
?>
</div>
<input type="submit" name="submit">
</form>
</body>
</html>