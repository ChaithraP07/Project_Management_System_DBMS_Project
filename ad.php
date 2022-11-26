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
			margin-left: -400px;
			text-align: center;
			font-size: 25px;
		}
		img {
			border-radius: 50px;
			margin-left: 10px;
			margin-top: 10px;
		}
		ul
		{
			list-style-type: none;
			padding: 0;
			margin: 0;
			overflow: hidden;
		}
		li {
			display: inline-block;
		}
		.normal,.dropbtn {
			display: inline-block;
			color: white;
			text-decoration: none;
			padding: 17px;
			text-transform: capitalize;
			font-size: 25px;
			background-color: black;
			margin: 40px;
			border-radius: 35px;
			border: 1px solid white;
			border-bottom: 5px solid white;
		}
		div {
			float: left;
		}
		.menu {
			margin-left: 50px;
			margin-top: -15px;
		}
		.extra
		{
			display: inline-block;
			width: 500px;
			height: 300px;
			background-color: rgba(0,0,0,0.5);
			margin-top: 150px;
			margin-left: 460px;
			color: white;
			text-transform: capitalize;
			font-size: 50px;
			padding: 10px;
			border: 2px double white;
			border-radius: 35px;
			text-align: center;
		}
		.extra p {
			margin-top: 90px;
		}
		.normal:hover,.dropdown:hover .dropbtn {
			background-color: rgb(92, 206, 194);
			border-bottom: 5px solid black;
			border-top: 2px solid black;
			border-right: 2px solid black;
			border-left: 2px solid black;
			color: black;
		}
		li .dropdown {
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: black;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px;
			z-index: 1;
			margin-top: 112px;
			margin-left: -185px
		}
		.dropdown-content a {
			display: block;
			text-decoration: none;
			color: white;
			padding: 12px 6px;
			border-bottom: 2px solid white;
		}
		.dropdown-content a:hover {
			background-color: white;
			color: black;
			border-bottom: 2px solid black;
		}
		.dropdown:hover .dropdown-content{
			display: inline-block;
		}
		</style>
</head>
<body>
<?php
$name=$_POST["name"];
$passwd=$_POST["passwd"];

function validation() {
	echo "<div class='valid'><p>invalid name or password</p></div>";
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
	$sql1="SELECT name,password FROM admin";
	$record=$conn->query($sql1);

	$condition="false";

	while($row=$record->fetch_assoc())
	{
		if($row['name']==$name && $row['password']==$passwd)
		{
			$condition="true";
			break;
		}
	}
	if($condition=="true")
	{
		echo '<div>
    		  	<img src="logo.jpg" width="100" height="100">
			</div>
			<div class="menu">
				<ul>
					<li><a class="normal" href="faculty.php">faculty</a></li>
					<li class="dropdown"><a href="javascript:void(0)" class="dropbtn">grouping</a>
						<div class="dropdown-content">
							<a href="five_sem_a.php">5th sem</a>
							<a href="six_sem_a.php">6th sem</a>
							<a href="seven_sem_a.php">7th sem</a>
						</div>
					</li>
					<li><a class="normal" href="home.html">logout</a></li>
				</ul>
			</div>
			<div class="extra">
				<p>welcome back<br>admin!!!</p>
			</div>';
	}
	else
	{
    	echo '<div class="login"><img class="logo" src="llogo.png" width="150" height="150">
		<form action="ad.php" method="post">
			<label for="name"></label>
			<input type="text" id="name" name="name" placeholder="NAME" required><br>
			<label for="passwd"></label>
			<input type="password" id="passwd" name="passwd" placeholder="PASSWORD" required><br>
			<input type="submit" name="submit">
		</form></div>';

		validation();
	}
}
?>
</body>
</html>