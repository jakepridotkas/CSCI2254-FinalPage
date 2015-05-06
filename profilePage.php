<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>
  <link rel="stylesheet" href="finalProject.css" />

  </head>
  <body>
  <header>
  		<div class="navBar">
  			<ul>
  			    <li> <img src="workoutLogo.png" alt="logo" id="logo"/></li>
  				<li class="home"><a href="http://cscilab.bc.edu/~mccormky/FinalProject/profilePage.php">Home</a></li>
  				<li class="workoutPlanner"><a href="http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php">Workout Planner</a></li>
  				<li><a href="http://cscilab.bc.edu/~mccormky/FinalProject/workoutArticles.php">Workout Articles</a></li>
  				<li><a href="http://cscilab.bc.edu/~pridotka/project/leaderboard.php">Leader Board</a></li>
  				<li><a href="http://cscilab.bc.edu/~pridotka/project/find_gym.php">Gyms Near You</a></li>
  				<li class="loggedIn" style="font-size:10pt">Logged in As: <?php echo $_SESSION["UserName"] ?></li>
  				<li><a style="font-size:10pt" href="http://cscilab.bc.edu/~pridotka/project/login.php">Log Out</a></li>

  			</ul>
  		</div>
	</header>

<?php
	displayProfileInfo();
	

  //______________________________________ HOME PAGE _______________________________________________

  function displayProfileInfo(){
   	$db = connectToDB("pridotka");
   	$userName = $_SESSION["UserName"];
   	echo "<h1> $userName's Home Page! </h1>";
	$query = "Select name, registration_date, membership_type, score, avatar, gender FROM WorkoutUsers WHERE name='$userName'";
	$result = performQuery($db, $query);

   	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   		
   		$score = $row['score'];
   		$name = $row['name'];
   		$reg_date = $row['registration_date'];
   		$level = $row['membership_type'];
   		$avatar = $row['avatar'];
   		$gender = $row['gender'];
   		echo "<img src='avatars/$avatar' alt='avatar' height='300px' width='300px'/>";
   		displayWorkoutHistory();
   		echo "<table class='infoTable'>
   		        <tr><td style='border:3px solid'>Your Bio</td><tr>
   				<tr><td>Experience:$level</td></tr>
   				<tr><td>Gender:$gender</td></tr>
   				<tr><td>Score:$score</td></tr>
   				<tr><td>Joined:$reg_date</td></tr>
   			  </table>";
  
  }
  
   function displayWorkoutHistory(){
   	$db = connectToOtherDB("mccormky");
   	$userName = $_SESSION["UserName"];
	$query = "Select length, date, muscle FROM loggedWorkouts WHERE User='$userName'";
	$result = performOtherQuery($db, $query);
    echo "<table style='display: inline-block; margin-left: 180px; margin-bottom: 230px' >";
    echo "<tr><td colspan='3' style='text-align: center'>Workout History</td></tr>";
   	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
   		
   		$dates = $row['date'];
   		$length = $row['length'];
   		$muscle = $row['muscle'];
   		      echo "
   				<tr><td>Date Completed:$dates</td>
   				<td>Muscles Worked:$muscle</td>
   				<td>Length:$length</td>
   				</tr>
   			  ";
  
  }echo "</table>";
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

<?php
//______________________ DB Second CONNECT FUNCTIONS ________________________________________
function connectToOtherDB($dbname){
	$dbc= @mysqli_connect("localhost", "mccormky", "JawdGyVt", $dbname) or //password = zr6eRbCP or 2SSMncyC
					die("Connect failed: ". mysqli_connect_error());
	return $dbc;
}
function disconnectFromOtherDB($dbc, $result){
	mysqli_free_result($result);
	mysqli_close($dbc);
}
function performOtherQuery($dbc, $query){
	//echo "My query is >$query< <br>";
	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
	return $result;
}
	//_____________________________________________________________________________________
	?>
