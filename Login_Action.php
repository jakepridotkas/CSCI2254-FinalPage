<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Entry Results!</title>
	<link rel="stylesheet" href="finalProject.css" />

</head>
<body>


<?php

	if(isset($_POST['submit'])){
		login();   // If join button is clicked
	}


	//_____________________________HANDLE JOIN_______________________________________________________


	function login(){
			$Name = $_POST['username'];
			$Password = $_POST['password'];
			$dbname = connectToDB("pridotka");

			$result = mysql_query("SELECT * FROM WorkoutUsers WHERE name='$Name' and password=sha1('$Password')");

			if( $result )	{
				  echo "<script>window.location = 'http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php'</script>";//send to Workouts Main Page
 				  exit();
			} else {
			 	$message = "User Does Not Exist.  Please Double Check Your UserName and Password";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo "<script>window.location = 'http://cscilab.bc.edu/~pridotka/project/login.php'</script>";//send to Login Page
				exit();

			}

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

