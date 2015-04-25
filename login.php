<?php
//include('login.php'); // Includes Login Script

//if(isset($_SESSION['login_user'])){
//header("location: profile.php");
//}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login to Workouts</title>
	<link rel="stylesheet" href="finalProject.css" />
</head>
<body>
<div id="main">
<h1>Login</h1>

<div id="login">
<h2>Login Form</h2>
<form action="Login_Action.php" method="post">
	<label>UserName :</label>
		<input id="name" name="username" placeholder="username" type="text"><br>
	<label>Password :</label>
		<input id="password" name="password" placeholder="**********" type="password"><br>
		<input name="submit" type="submit" value=" Login "><br><br>
</form>
</div>
</div>

	<fieldset><legend>Join Workouts!</legend>
		<form action="join.php" method="link">
			 <input value="Join!" type="submit">
		</form>
	</fieldset>

	<fieldset><legend>I forgot my Password...</legend>
		<form action="newPass.php" method="post">
			 <input class="new" name = "new" value="Send Me A New Password!" type="submit">
		</form>
	</fieldset>



</body>
</html>
