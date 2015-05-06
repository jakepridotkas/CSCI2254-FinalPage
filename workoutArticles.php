<?php
//include ('dbconn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="finalProject.css" />
	<title>Workout Articles</title>
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
<h1>Workout Articles</h1>
<h3 id="sort">Sort By</h3>
<form method = "get">
	<div class="links">
	<input class="articleLink" type="submit" name="newArticles" value="New Articles">|
	<input class="articleLink" type="submit" name="trainingArticles" value="Training Articles">|
	<input class="articleLink" type="submit" name="nutritionArticles" value="Nutrition Articles" >|
	<input class="articleLink" type="submit" name="supplementArticles" value="Supplement Articles" >
	</div>
</form>
<?php
	
		workout_articles_DisplayForm();
	
?>

</body>
</html>

<?php

function workout_articles_DisplayForm() {
	 
	 if(!isset($_GET['newArticles']) && !isset($_GET['trainingArticles']) 
	 	&& !isset($_GET['supplementArticles']) && !isset($_GET['nutritionArticles'])) {
	 		echo "<h2 style='text-align:center;'>New Articles</h2>";
		 	 $rss= new SimpleXMLElement(file_get_contents('http://www.bodybuilding.com/rss/articles'));
      		$items = $rss->channel->item; # try, works some versions
      		if (!$items)
        		$items = $rss->item; # works other versions

      		foreach ($items as $item) {
      			echo "<fieldset>";
      			echo "<div class='news'>
      				<h2>$item->title</h2>\n";
      	    	echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        		echo $item->description . "<br><br>\n";
        		echo "<hr></div>";
        		echo "</fieldset>";
	 		
			 }
	 } else {
	 
	 if(isset($_GET['newArticles'])) {
	 	echo "<h2 style='text-align:center;'>New Articles</h2>";
	 	 $rss= new SimpleXMLElement(file_get_contents('http://www.bodybuilding.com/rss/articles'));
      	$items = $rss->channel->item; # try, works some versions
      	if (!$items)
        	$items = $rss->item; # works other versions

      	foreach ($items as $item) {
      		echo "<fieldset>";
      		echo "<div class='news'>
      			<h2>$item->title<h2>\n";
      	    echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        	echo $item->description . "<br><br>\n";
        	echo "<hr></div>";
        	echo "</fieldset>";
        }
    }
	if(isset($_GET['trainingArticles'])) {
	 	 echo "<h2 style='text-align:center;'>Training Articles</h2>";
	 	 $rss= new SimpleXMLElement(file_get_contents('http://www.bodybuilding.com/rss/articles/training'));
      	$items = $rss->channel->item; # try, works some versions
      	if (!$items)
        	$items = $rss->item; # works other versions

      	foreach ($items as $item) {
      		echo "<fieldset>";
      		echo "<div class='news'>
      			<h2>$item->title<h2>\n";
      	    echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        	echo $item->description . "<br><br>\n";
        	echo "<hr></div>";
        	echo "</fieldset>";
        }
    }
    if(isset($_GET['supplementArticles'])) {
	 	 echo "<h2 style='text-align:center;'>Supplement Articles</h2>";
	 	 $rss= new SimpleXMLElement(file_get_contents('http://www.bodybuilding.com/rss/articles/supplements'));
      	$items = $rss->channel->item; # try, works some versions
      	if (!$items)
        	$items = $rss->item; # works other versions

      	foreach ($items as $item) {
      		echo "<fieldset>";
      		echo "<div class='news'>
      			<h2>$item->title<h2>\n";
      	    echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        	echo $item->description . "<br><br>\n";
        	echo "<hr></div>";
        	echo "</fieldset>";
        }
    }
    if(isset($_GET['nutritionArticles'])) {
    	echo "<h2 style='text-align:center;'>Nutrition Articles</h2>";
	 	 $rss= new SimpleXMLElement(file_get_contents('http://www.bodybuilding.com/rss/articles/nutrition'));
      	$items = $rss->channel->item; # try, works some versions
      	if (!$items)
        	$items = $rss->item; # works other versions

      	foreach ($items as $item) {
      		echo "<fieldset>";
      		echo "<div class='news'>
      			<h2>$item->title<h2>\n";
      	    echo '<a href="' . $item->link . '">' . $item->title . '</a><br>';
        	echo $item->description . "<br><br>\n";
        	echo "<hr></div>";
        	echo "</fieldset>";
        }
    }
    
    }

}


?>
