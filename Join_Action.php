<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Entry Results!</title>
	<style>
    </style>
</head>
<body>
<?php
	print "<h1>Entry Results...</h1><br>\n";
?>
	<fieldset>
		<legend><b>Database Entry Results!</b></legend>
<?php

	if(isset($_POST['mybutton'])){
		handle_join();   // If join button is clicked
	}


	//_____________________________HANDLE JOIN_______________________________________________________


	function handle_join(){
			$Name = $_POST['myname'];
			$Gender = $_POST['gender'];
			$Email = $_POST['email'];
			$Level = $_POST['level'];
			$Password = $_POST['password'];
			$dbname = connectToDB("pridotka");



			$result = mysql_query("SELECT * FROM WorkoutUsers WHERE email='$Email'");
			//$num_rows = mysql_num_rows($result);

			if ($result == FALSE) {
			   trigger_error('It exists.', E_USER_WARNING);  //fix this, alert that in database
			   return false;
			}

			//check to see if email is new
			//$test = "SELECT * FROM WorkoutUsers WHERE email='$Email'";
			//performQuery($dbname, $test);

			//if (mysqli_fetch_array($test, MYSQLI_ASSOC) == NULL){
			//	print "<h1> Error: Email Already in Database!</h1>";
			//} else {
			$query = "INSERT INTO WorkoutUsers Values('$Name', '$Gender', '$Email', sha1('$Password'), now(), '$Level')";
			performQuery($dbname, $query);

			echo "<script>window.location = 'http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php'</script>";//send to Workouts Main Page
			//}

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
	echo "My query is >$query< <br>";
	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
	return $result;
}
	//_____________________________________________________________________________________

	?>

	</fieldset>
	<br><br>

	<fieldset>
	<div id="link">
		<a href=http://cscilab.bc.edu/~pridotka/project/login.php> Back to login page!!! </a>
	</div>
	</fieldset>

	<br><br>

</body>

</html>

