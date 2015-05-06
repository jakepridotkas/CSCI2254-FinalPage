<?php
//include ('dbconn.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Workout Planner</title>
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
<h1>Create A Workout!</h1>
<?php
	if (isset($_GET['getExercise'])) {
		workout_homePage_HandleForm();
	} else {
		workout_homePage_DisplayForm();
	}

?>

</body>
</html>

<?php
function workout_homePage_DisplayForm() {
?>	<fieldset>
	<form method="get">
		<label>Select Which Muscles You Want to Build</label>
			<br><input type='checkbox' name='chest' value='chest' >Chest<br>
		    <input type='checkbox' name='back' value='back' >Back<br>
		    <input type='checkbox' name='arms' value='arms' >Arms<br>
		    <input type='checkbox' name='abs' value='abs' >Abs<br>
		    <input type='checkbox' name='legs' value='legs' >Legs<br>
		<label>Select A Duration For Your Workout</label><br>
			<select name='duration'>
				<option value="20">20 minutes</option>
				<option value="30">30 minutes</option>
				<option value="40">40 minutes</option>
				<option value="50">50 minutes</option>
				<option value="60">60 minutes</option>
			</select>
		<br><input class="button" type="submit" name="getExercise" value="Make a Plan!" />
	</form>
	</fieldset>
<?php
}

function workout_homePage_HandleForm() {
		//Find number of muscles selected
		$count = 0;

		if (isset($_GET['chest'])) {
			$count++;
		}
		if (isset($_GET['back'])) {
			$count++;
		}
		if (isset($_GET['arms'])) {
			$count++;
		}
		if (isset($_GET['abs'])) {
			$count++;
		}
		if (isset($_GET['legs'])) {
			$count++;
		}
		if ($count > 3) {
			$message = "Please select a maximum of 3 Muscle Groups!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo "<script>window.location = 'http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php'</script>";//send to Login Page
			exit();
		}
		if ($count == 0) {
					$message = "Please select at least 1 Muscle Group!";
					echo "<script type='text/javascript'>alert('$message');</script>";
					echo "<script>window.location = 'http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php'</script>";//send to Login Page
					exit();
		}
		//Get workout time for each muscle
		$Time = $_GET['duration'];
		$userName = $_SESSION["UserName"];
		$muscles = "";
		$workoutTime = round($_GET['duration'] / $count / 5);
		$dbName = "mccormky";
		$dbc = connectToDB($dbName);


		if (isset($_GET['chest'])) {
		        $muscles = "Chest,";      
				$query = "Select * from Workouts where Muscle = 'chest' order by rand() limit $workoutTime";
				$result = performQuery($dbc,$query);
				while ($row = mysqli_fetch_array($result)) {
					echo"<table align='center'>";
						echo"<tr>";
							echo"<td colspan='2' class='workout'>$row[4]</td>";
						echo"</tr>";
						echo"<tr><td># of Sets:$row[5]</td><td rowspan='4'><img src='workout_imgs/Chest_Images/$row[7]' alt='$row[4]' height=150 width = 150 />
									<img src='workout_imgs/Chest_Images/$row[8]' alt='$row[4]' height=150 width = 150 /></td></tr>
							 <tr><td># of Reps:$row[6]</td></tr>
							 <tr><td>Duration:$row[2] minutes</td></tr>
							<tr><td>Rest Time:$row[3] seconds</td>";
						echo"</tr>";
					echo"</table>";
				}
		}
		if (isset($_GET['back'])) {
		        $muscles = $muscles . "Back" . ",";
				$query = "Select * from Workouts where Muscle = 'back' order by rand() limit $workoutTime";
				$result = performQuery($dbc,$query);
				while ($row = mysqli_fetch_array($result)) {
					echo"<table align='center'>";
						echo"<tr>";
							echo"<td colspan='2' class='workout'>$row[4]</td>";
						echo"</tr>";
						echo"<tr><td># of Sets:$row[5]</td><td rowspan='4'><img src='workout_imgs/Back_Images/$row[7]' alt='$row[4]' height=150 width = 150 />
									<img src='workout_imgs/Back_Images/$row[8]' alt='$row[4]' height=150 width = 150 /></td></tr>
							 <tr><td># of Reps:$row[6]</td></tr>
							 <tr><td>Duration:$row[2] minutes</td></tr>
							<tr><td>Rest Time:$row[3] seconds</td>";
						echo"</tr>";
					echo"</table>";
				}
		}
		if (isset($_GET['arms'])) {
				$muscles = $muscles . "Arms" . ",";
				$query = "Select * from Workouts where Muscle = 'arms' order by rand() limit $workoutTime";
				$result = performQuery($dbc,$query);
			while ($row = mysqli_fetch_array($result)) {
					echo"<table align='center'>";
						echo"<tr>";
							echo"<td colspan='2' class='workout'>$row[4]</td>";
						echo"</tr>";
						echo"<tr><td># of Sets:$row[5]</td><td rowspan='4'><img src='workout_imgs/Arms_Images/$row[7]' alt='$row[4]' height=150 width = 150 />
									<img src='workout_imgs/Arms_Images/$row[8]' alt='$row[4]' height=150 width = 150 /></td></tr>
							 <tr><td># of Reps:$row[6]</td></tr>
							 <tr><td>Duration:$row[2] minutes</td></tr>
							<tr><td>Rest Time:$row[3] seconds</td>";
						echo"</tr>";
					echo"</table>";
				}
		}
		if (isset($_GET['abs'])) {
				$muscles = $muscles . "Abs" . ",";
				$query = "Select * from Workouts where Muscle = 'abs' order by rand() limit $workoutTime";
				$result = performQuery($dbc,$query);
				while ($row = mysqli_fetch_array($result)) {
					echo"<table align='center'>";
						echo"<tr>";
							echo"<td colspan='2' class='workout'>$row[4]</td>";
						echo"</tr>";
						echo"<tr><td># of Sets:$row[5]</td><td rowspan='4'><img src='workout_imgs/Ab_Images/$row[7]' alt='$row[4]' height=150 width = 150 />
									<img src='workout_imgs/Ab_Images/$row[8]' alt='$row[4]' height=150 width = 150 /></td></tr>
							 <tr><td># of Reps:$row[6]</td></tr>
							 <tr><td>Duration:$row[2] minutes</td></tr>
							<tr><td>Rest Time:$row[3] seconds</td>";
						echo"</tr>";
					echo"</table>";
				}
		}
		if (isset($_GET['legs'])) {
				$muscles = $muscles . "Legs" . ",";
				$query = "Select * from Workouts where Muscle = 'legs' order by rand() limit $workoutTime";
				$result = performQuery($dbc,$query);
				while ($row = mysqli_fetch_array($result)) {
					echo"<table align='center'>";
						echo"<tr>";
							echo"<td colspan='2' class='workout'>$row[4]</td>";
						echo"</tr>";
						echo"<tr><td># of Sets:$row[5]</td><td rowspan='4'><img src='workout_imgs/Leg_Images/$row[7]' alt='$row[4]' height=150 width = 150 />
									<img src='workout_imgs/Leg_Images/$row[8]' alt='$row[4]' height=150 width = 150 /></td></tr>
							 <tr><td># of Reps:$row[6]</td></tr>
							 <tr><td>Duration:$row[2] minutes</td></tr>
							<tr><td>Rest Time:$row[3] seconds</td>";
						echo"</tr>";
					echo"</table>";
				}
		}
		
		   $muscles = rtrim($muscles, ",");
	     
		?>
		<form action="Complete_Action.php" method="post">
			<input type="hidden" name="time" value='<?php echo $Time ?>' />
			<input type="hidden" name="muscles" value='<?php echo $muscles ?>' />
			<p style='text-align: center'><input class='button' style='margin: 0 auto;' type='submit' value='I Completed This Workout' name='workoutCompleted'></p>
		</form>
		<?php

}

//______________________ DB CONNECT FUNCTIONS ________________________________________
function connectToDB($dbname){
	$dbc= @mysqli_connect("localhost", "mccormky", "JawdGyVt", $dbname) or //password = zr6eRbCP or 2SSMncyC
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
