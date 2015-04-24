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
				<li><a href="link">Workout Articles</a></li>
				<li><a href="link">Leader Board</a></li>
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
	 
	 
	 if(isset($_GET['newArticles'])) {
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
?>
