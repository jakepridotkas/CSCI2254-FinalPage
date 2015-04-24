<?php
include ('dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="finalProject.css" />
</head>
<body>
	<header>
		<div class="navBar">
			<ul>
				<li class="home"><a href="http://cscilab.bc.edu/~pridotka/project/login.php">Login</a></li>
				<li class="workoutPlanner"><a href="http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php">Workout Planner</a></li>
				<li><a href="http://cscilab.bc.edu/~mccormky/FinalProject/workoutArticles.php">Workout Articles</a></li>
				<li><a href="link">Leader Board</a></li>
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
		<label>Select What Muscles You Want to Build</label>
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
			echo "Error: Only Three can be selected";
		}
		
		//Get workout time for each muscle
		$workoutTime = round($_GET['duration'] / $count / 5);
		$dbName = "mccormky";
		$dbc = connectToDB($dbName);
		
	
		if (isset($_GET['chest'])) {
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
				$query = "Select * from Workouts where Muscle == 'legs' order by rand() limit $workoutTime";
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
}	
?>
