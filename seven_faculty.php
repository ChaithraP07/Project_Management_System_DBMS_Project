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
			text-align: center;
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
<a href="home.html"><img src="logout.png" style="float:right;width:60px;height:60px;"></a>
<div class="sem">
<?php
$usn1=$_POST['usn1'];
$usn2=$_POST['usn2'];
$usn3=$_POST['usn3'];
$usn4=$_POST['usn4'];
$pname=$_POST['pname'];
$pdomain=$_POST['pdomain'];

$host="localhost";
$user="root";
$password="";
$database="miniproject";

$conn=new mysqli($host,$user,$password,$database);

if(mysqli_connect_error())
{
	die('connect error('.mysqli_connect_errno().")".mysqli_connect_error());
}
else
{
	$sql2="UPDATE seven_project set pname='$pname',pdomain='$pdomain' where usn1='$usn1' and usn2='$usn2' and usn3='$usn3'and usn4='$usn4'";
	if($conn->query($sql2)===TRUE)
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
				</form>';
		$sql3="SELECT id,name,count FROM interest where domain like '%$pdomain%'";
		$record=$conn->query($sql3);

		$condition=50;
		$name="";
		$id="";
		$count=0;

		while($row=$record->fetch_assoc())
		{

			if($row['count']<$condition)
			{
				$count=$row['count']+1;
				$condition=$count;
				$name=$row['name'];
				$id=$row['id'];
			}
		}

		echo "<p>allocated faculty is $name</p>";

		$sql4="UPDATE interest set count='$count' where id='$id'";
		$conn->query($sql4);

		$sql5="UPDATE seven_project set faculty='$id' where usn1='$usn1' and usn2='$usn2' and usn3='$usn3' and usn4='$usn4'";
		$conn->query($sql5);

	} 
}
?>
</div>
</body>
</html>