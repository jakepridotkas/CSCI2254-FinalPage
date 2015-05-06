<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Find A Gym!</title>

	<link rel="stylesheet" href="finalProject.css" />
</head>
<body>
<header>
  		<div class="navBar">
  			<ul>
  				<li class="home"><a href="http://cscilab.bc.edu/~mccormky/FinalProject/profilePage.php">Home</a></li>
  				<li class="workoutPlanner"><a href="http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php">Workout Planner</a></li>
  				<li><a href="http://cscilab.bc.edu/~mccormky/FinalProject/workoutArticles.php">Workout Articles</a></li>
  				<li><a href="http://cscilab.bc.edu/~pridotka/project/leaderboard.php">Leader Board</a></li>
  				<li><a href="http://cscilab.bc.edu/~pridotka/project/find_gym.php">Gyms Near You</a></li><br>
  				<li class="loggedIn" style="font-size:10pt">Logged in As: <?php echo $_SESSION["UserName"] ?></li>
  				<li><a style="font-size:10pt" href="http://cscilab.bc.edu/~pridotka/project/login.php">Log Out</a></li>
  			</ul>
  		</div>
	</header>

<div id="main">
<h1>Find a Gym!</h1>
<br><br>
<fieldset>
<div id="find">
<form action="Gym_Action.php" method="post">
	<label>Your Address :</label>
		<input id="name" name="address" placeholder="16 Swole Rd. Boston, Massachusetts 02135" type="text"><br><br>
		<input class="submit" name = "submit" value="Find Now!" type="submit">

</form>
</div>
</div>
</fieldset>


</body>
</html>
