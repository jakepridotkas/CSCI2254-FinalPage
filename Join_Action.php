<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Entry Results!</title>
	<link rel="stylesheet" href="finalProject.css" />

</head>
<body>

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
			$avatar = $_POST['avatar'];
			$dbname = connectToDB("pridotka");

			$query = "SELECT * FROM WorkoutUsers WHERE name='$Name' OR email='$Email'";
			$result = performQuery($dbname, $query);

			if( mysqli_num_rows($result)==0 )	{
				  $query = "INSERT INTO WorkoutUsers Values('$Name', '$Gender', '$Email', sha1('$Password'), now(), '$Level' , 0, '$avatar')";
				  performQuery($dbname, $query);
				  $_SESSION["UserName"] = $Name;
				  $_SESSION["Count"] = "0";

				  echo "<script>window.location = 'http://cscilab.bc.edu/~mccormky/FinalProject/profilePage.php'</script>";//send to Workouts Main Page
				  exit();
			} else {
				  $message = "Sorry, that User Name or Email is already Taken!";
				  echo "<script type='text/javascript'>alert('$message');</script>";
				  echo "<script>window.location = 'http://cscilab.bc.edu/~pridotka/project/join.php'</script>";//send to Login Page
 				  exit();

			}



			//echo "<script>window.location = 'http://cscilab.bc.edu/~mccormky/FinalProject/selectWorkouts.php'</script>";//send to Workouts Main Page
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
	//echo "My query is >$query< <br>";
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

