<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Join Workouts</title>
	<link rel="stylesheet" href="finalProject.css" />

  <script type="text/javascript">

    function validateForm() {
    	//printf("Starting Validate...");
		     var z = document.forms["myForm"]["myname"].value;
			 	  if (z.length < 5){
			 	     alert("Your Selected Name Is Too Short!");
			 	     return false;
			 }
			 	  else if (z.length > 20){
					 alert("Your Selected Name Is Too Long!");
			 	  	 return false;
		     }
//
		var c = document.forms["myForm"]["email"].value;
		var d = document.forms["myForm"]["confirmemail"].value;
				if (c != d){
				  alert("Your Emails Don't Match!");
				  return false;
			}
				else if (c.length < 6){
					alert("Your Email Is Too Short!");
					return false;
		     }
				//else if (!strpos(c,'@')) {
				//  alert("Not A Legitimate Email!");
 				//  return false;
 			//}
//
		var a = document.forms["myForm"]["password"].value;
		var b = document.forms["myForm"]["confirmpassword"].value;
				if (a != b){
		 		  alert("Your Passwords Don't Match!");
		 		  return false;
		    }
		    	if (a.length < 7){
		    		alert("Your Password Must Be At least 7 Characters");
					return false;
		    }
		//return false;
	}

  </script>

  </head>
  <body>
  <h1> Prepare to Challenge Yourself! </h1>



<?php


	if (!isset($_GET['join'])){
		displayJoinButton();
	}
	if (isset($_GET['join'])){
		displayJoinForm();
	}

  //______________________________________ HOME PAGE _______________________________________________

  function displayJoinForm(){
  ?>
  <fieldset class="signUp">
  		<form method = "post" name= "myForm" action= "Join_Action.php" onsubmit="return validateForm();">
  			<div id='joinHeader'><h2>Join The Club</h2></div>
  			<div><h3>Basic Information</h3>
  		    Name: <input type= "text" name="myname" id="myname" required/>
  			<br>Email: <input type= "text" name="email" required/>
  			<br>Confirm Email: <input type= "text" name="confirmemail" required/>
  			<br>Password: <input type= "password" name="password" required/>
  			<br>Confirm Password: <input type= "password" name="confirmpassword" required/>
  			<br><label>What is your current fitness level?...</label> <br>
  			<select name="level" size="1" required>
  						<option value="beginner">Beginner</option>
  						<option value="intermediate">Intermediate</option>
  						<option value="expert">Master</option>
			</select>
  			<br><label>What is your Gender?...</label> <br>
			  		<select name="gender" size="1" required>
			  						<option value="M">Male</option>
			  						<option value="F">Female</option>
				</select>
			<br>
			<br>
		    </div>
  			<div>
			<br><h3>Select an Avatar:</h3>
			    <table>
					<tr>
					  <td><input type="radio" name="avatar" value="popeye.jpg"><img id="avatar" src="avatars/popeye.jpg" alt="popeye" width=75 height=75/></td>
					  <td><input type="radio" name="avatar" value="cartoonArm.jpg"><img id="avatar" src="avatars/cartoonArm.jpg" alt="cartoonArm" width=75 height=75/></td>
					  <td><input type="radio" name="avatar" value="larryLobster.jpg"><img id="avatar" src="avatars/larryLobster.jpg" alt="larryLobster" width=75 height=75/></td>
					</tr>
					<tr>
					  <td><input type="radio" name="avatar" value="jackedGuy.jpg"><img id="avatar" src="avatars/jackedGuy.jpg" alt="jackedGuy" width=75 height=75/></td>
					  <td><input type="radio" name="avatar" value="shadowLift.jpg"><img id="avatar" src="avatars/shadowLift.jpg" alt="shadowLift" width=75 height=75/></td>
					  <td><input type="radio" name="avatar" value="struggleGuy.jpg"><img id="avatar" src="avatars/struggleGuy.jpg" alt="struggleGuy" width=75 height=75/></td>
					</tr>
					<tr>
					  <td><input  type="radio" name="avatar" value="runningHeart.jpg"><img id="avatar" src="avatars/runningHeart.jpg" alt="runningHeart" width=75 height=75/></td>
					  <td><input  type="radio" name="avatar" value="liftingSanta.jpg"><img id="avatar" src="avatars/liftingSanta.jpg" alt="liftingSanta" width=75 height=75/></td>
					  <td><input  type="radio" name="avatar" value="treadmillGuy.jpg"><img id="avatar" src="avatars/treadmillGuy.jpg" alt="treadmillGuy" width=75 height=75/></td>
					</tr>
				 </table>
			
		    <!--Avatar image sources
		      lobster: shpdoinkle.tumblr.com
		      cartoon arm: cliparts.co
		      popeye: cartoonsimages.com
		      jacked guy: pixshark.com
		      shadow lift: cliparts.co 
		      struggle guy: motor-kid.com
		      running heart: sites.google.com
		      lifting santa: www.clipartbest.com
		      treadmill guy: pixgood.com
		      -->
  			<br><br></div><br>
  			<input type= "reset" name="mybutton2" value= "Clear Information" class="button" /> 
  			<input type= "submit" name="mybutton" value= "Join!" class="button"/>
  		</form>
  	</fieldset>
  	<?php
  	}

  	function displayJoinButton(){
    ?>
		<fieldset><legend>Are You Ready???</legend>
	  		<form method="get">
	      		<input class="join" name="join" value="I'm Ready!" type="submit">
	  		</form>
		</fieldset>
	<?php
	}
	?>

    </body>
	</html>

