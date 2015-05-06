<?php
//session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login to Workouts</title>

	<link rel="stylesheet" href="finalProject.css" />
</head>
<body>

<h1>Login to Workouts!</h1>

<fieldset style="width:300px; margin: auto">
<div id="login">
<form action="Login_Action.php" method="post">
	<label>UserName :</label>
		<input id="name" name="username" placeholder="username" type="text"><br>
	<label>Password :</label>
		<input id="password" name="password" placeholder="**********" type="password"><br><br>
		<input name="submit" type="submit" value=" Login " class="button"><br><br>
</form>
</div>

</fieldset>


	<fieldset style="width:300px; margin: auto"><div><h3>Not A Member?</h3>
		<form action="join.php" method="link">
			 <input value="Join!" type="submit" class="button">
		</form></div>
	</fieldset>

	<fieldset style="width:300px; margin: auto"><div><h3>Forgot Your Password?</h3>
		<form action="newPass.php" method="post">
			 <input class="button" name = "new" value="Send Me A New Password!" type="submit">
		</form></div>
	</fieldset>



</body>
</html>
