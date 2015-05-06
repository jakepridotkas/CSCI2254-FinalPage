<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Leaderboards</title>
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
  <h1> Welcome to the Leaderboard Page!! </h1>

<?php

	displayMembers();

  //______________________________________ HOME PAGE _______________________________________________

  function displayMembers(){
   	$db = connectToDB("pridotka");
	$query = "Select name, registration_date, membership_type, score FROM WorkoutUsers ORDER BY score DESC";
	$result = performQuery($db, $query);
	print("<fieldset><legend>Group Members</legend>");
	print("<table>");
	print("<tr><th>Score</th><th>Name</th><th>Member Since</th><th>Level</th></tr>");

   	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   	{
   		print("<tr>");
   		$score = $row['score'];
   		$name = $row['name'];
   		$reg_date = $row['registration_date'];
   		$level = $row['membership_type'];

   		print("<td>". $score . "</td>");
   		print("<td>". $name . "</td>");
   		print("<td>". $reg_date . "</td>");
   		print("<td>". $level . "</td>");
   		print("</tr>");
	}
	print("</table>");
  	?>
</fieldset>
<?php
  }
?>

	</body>
	</html>

<?php


//______________________ DB CONNECT FUNCTIONS ________________________________________
function connectToDB($dbname){
	$dbc= @mysqli_connect("localhost", "pridotka", "2SSMncyC", $dbname) or //password = zr6eRbCP or 2SSMncyC
					die("Connect failed: ". mysqli_connect_error());
	return $dbc;
}
function disconnectFromDB($dbc, $result){
	mysqli_free_result($result);
	mysqli_close($dbc);
}

function performQuery($dbc, $query){
	//echo "My query is >$query< <br>";
	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
	return $result;
}


?>
