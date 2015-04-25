<!DOCTYPE html>
<html lang="en">
<head>
    <title>Join Workouts</title>
  <style>
  <link rel="stylesheet" href="css/base.css" />
  </style>

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
  <fieldset>
  		<legend>Provide Your Information Below!</legend>
  		<form method = "post" name= "myForm" action= "Join_Action.php" onsubmit="return validateForm();">
  			<label>What is your current fitness level?...</label> <br>
  			<select name="level" size="3" required>
  						<option value="beginner">Beginner</option>
  						<option value="intermediate">Intermediate</option>
  						<option value="expert">Master</option>
			</select>
  			<br><br>

  			<label>What is your Gender?...</label> <br>
			  		<select name="gender" size="2" required>
			  						<option value="M">Male</option>
			  						<option value="F">Female</option>
				</select>
			<br><br>

  			<br>Name: <input type= "text" name="myname" id="myname" required/>

  			<br>Email: <input type= "text" name="email" required/>
  			<br>Confirm Email: <input type= "text" name="confirmemail" required/>
  			<br>
  			<br>Password: <input type= "password" name="password" required/>
  			<br>Confirm Password: <input type= "password" name="confirmpassword" required/>

  			<br><br>
  			<input type= "reset" name="mybutton2" value= "Clear Information" /> <br>
  			<input type= "submit" name="mybutton" value= "Join!"/>
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

