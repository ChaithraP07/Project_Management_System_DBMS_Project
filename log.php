<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			background-image: url('background2.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		.login {
			background-color: rgba(0,0,0,0.3);
			display: inline-block;
			width: 500px;
			height: 500px;
			margin-top: 175px;
			margin-left: 500px;
		}
		.logo {
			margin-left: 170px;
			margin-top: 30px;
		}
		form {
			margin-top: 20px;
		}
		input {
			width: 250px;
			padding: 15px;
			margin-left: 100px;
			border-radius: 25px;
			text-transform: uppercase;
			font-size: 15px;
			text-align: center;
			font-weight: bold;

		}
		input[type="text"] {
			margin-bottom: 20px;
			background-color: white;

		}
		input[type="password"] {
			margin-bottom: 20px;
			background-color: white;
		}
		input[type="submit"] {
			color: black;
			margin-left: 190px;
			width: 120px;
			background-color: rgb(92, 206, 194);
		}
		input[type="submit"]:hover {
			background-color: black;
			color: white;
		}
		.valid {
			display: inline-block;
			background-color: white;
			width: 300px;
			height: 100px;
			position: fixed;
			top: 0;
			text-transform: capitalize;
			margin-left: 90px;
			text-align: center;
			font-size: 25px;
		}
		.option {
			text-decoration: none;
			text-transform: uppercase;
			display: block;
			background-color: white;
			color: black;
			margin: 30px;
            padding: 20px;
            width: 175px;
            margin-left: 135px;
            text-align: center;
            border: 5px double black;
            border-radius: 20px;
            font-size: 17px;
		}
		.option:hover {
			background-color: black;
			color: white;
			border-bottom: 7px solid red;
		}
		h5 {
			text-transform: uppercase;
			font-size: 20px;
		}
		.para {
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
		.sem {
			background-color: white;
			width: 950px;
			height: 660px;
			padding: 20px;
			margin-left: -240px;
			margin-top: -160px;
		}
		</style>
</head>
<body>
<a href="home.html"><img src="logout.png" style="float:right;width:60px;height:60px;"></a>
<div class="login">
<?php
$usnid=$_POST["usn-id"];
$passwd=$_POST["passwd"];

$usnid1=strtolower($usnid);

function validation() {
	echo "<div class='valid'><p>invalid usn/id or password</p></div>";
}

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
	$sql2="SELECT usnid,password FROM credentials";
	$record=$conn->query($sql2);

	$condition="false";

	while($row=$record->fetch_assoc())
	{
		$dpassword=base64_decode($row['password']);
		if($row['usnid']==$usnid1 && $dpassword==$passwd)
		{
			$condition="true";
			break;
		}
	}
	if($condition=="true")
	{
		if(substr($usnid1,0,3)==="4mh")
		{
			echo '<a class="option" href="five_sem.html" style="margin-top:115px;">5th sem</a>';
		    echo '<a class="option" href="six_sem.html">6th sem</a>';
			echo '<a class="option" href="seven_sem.html">7th sem</a>';
			echo '</div>';
		}
		else if(substr($usnid1,0,4)==="ists")
		{
               echo '<div class="sem">';
				$sql1="SELECT usn1,usn2,pname from five_project where faculty='$usnid1'";
				$record1=$conn->query($sql1);

				echo '<h5>5th sem</h5>';

				if($record1->num_rows==0)
				{
					echo '<p class="para">no group is assigned</p>';
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

				$sql2="SELECT usn1,usn2,pname from six_project where faculty='$usnid1'";
				$record2=$conn->query($sql2);

				echo '<h5>6th sem</h5>';

				if($record2->num_rows==0)
				{
					echo '<p class="para">no group is assigned</p>';
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

				$sql3="SELECT usn1,usn2,usn3,usn4,pname from seven_project where faculty='$usnid1'";
				$record3=$conn->query($sql3);

				echo '<h5>7th sem</h5>';

				if($record3->num_rows==0)
				{
					echo '<p class="para">no group is assigned</p>';
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
				echo '</div>';
		}
	}
	else
	{
		echo '<div class="login1">';
    	echo '<img class="logo" src="llogo.png" width="150" height="150">
		<form action="log.php" method="post">
			<label for="usn-id"></label>
			<input type="text" id="usn-id" name="usn-id" placeholder="usn/id" required><br>
			<label for="passwd"></label>
			<input type="password" id="passwd" name="passwd" placeholder="password" required><br>
			<input type="submit" name="submit">
		</form>';

		validation();
		echo '</div>';
	}
}
?>
</body>
</html>