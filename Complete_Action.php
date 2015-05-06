<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Workout Completed!</title>
	<link rel="stylesheet" href="finalProject.css" />
</head>
<body>
<header>
		<div class="navBar">
			<ul>
				<li class="home"><a href="http://cscilab.bc.edu/~pridotka/project/login.php">Login</a></li>
				<li class="workoutPlanner"><a href="http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php">Workout Planner</a></li>
				<li><a href="http://cscilab.bc.edu/~mccormky/FinalProject/workoutArticles.php">Workout Articles</a></li>
				<li><a href="http://cscilab.bc.edu/~pridotka/project/leaderboard.php">Leader Board</a></li>
			</ul>
		</div>
	</header>
<?php
if(isset($_POST["workoutCompleted"])){
		handle_points();   
		log_Workout();
	}
	//_____________________________HANDLE Points_______________________________________________________
	function handle_points(){
			if ( $_SESSION["Count"] == "1" ) {
				$message = "You aint that swole!  Login again later to complete another workout...";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script>window.location = 'http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php'</script>";
				exit();
			} else {
				$_SESSION["Count"] = "1";
				$Time = $_POST['time'];
				$name = $_SESSION["UserName"];
				printf("<fieldset>
						<h3><b>Your Results!</b></h3>
						For completing a $Time minute workout, you have recieved $Time points! <br><br>");
				printf("Go to the leaderboard page to see your updated score! </fieldset>");

				$dbname = connectToDB("pridotka");
				$query = "UPDATE WorkoutUsers SET score = score + $Time WHERE name ='$name'";
				performQuery($dbname, $query);
			}
			}
	//_____________________________Log Workout_______________________________________________________		
	function log_Workout(){
			$Time = $_POST['time'];
			$name = $_SESSION["UserName"];
			$muscles = $_POST['muscles'];
			$dbname = connectToOtherDB("mccormky");
			$query = "INSERT INTO loggedWorkouts VALUES('$name','$Time',now(),'$muscles')";
			performOtherQuery($dbname, $query);
	
	}
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
	//_____________________________________________________________________________________
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



</body>

</html>
