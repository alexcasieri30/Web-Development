<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		div{
			text-align: center;
		}
	</style>
</head>
<body>
	<div id='image'>
		<?php

			$peter = 0;
		  	$lois = 0;
		  	$chris = 0;
		  	$meg = 0;
		  	$stewie = 0;
		  	$brian = 0;

			$color = $_GET['color'];
			$night = $_GET['night'];
			$drink = $_GET['drink'];
			$tv = $_GET['tv'];
			$hate = $_GET['hate'];


			if($color=="select a color"||$night=='select one'||$drink=='select one'||$tv=='select one'||$hate=='select one'){
				header("Location: index.php?error=filloutform");
				exit();
			}


			if ($color == "peter") {
		    	$peter += 1;
			}
			else if ($color == "lois") {
		    	$lois += 1;
			}
			else if ($color == "chris") {
			    $chris += 1;
			}
		    else if ($color == "meg"){
			    $meg += 1;
			}
			else if ($color == "brian"){
			  	$brian += 1;
			}
			else if ($color == "stewie"){
			 	$stewie += 1;
			}

			if ($night == "peter") {
			    $peter += 1;
			}
			else if ($night == "lois") {
			    $lois += 1;
			}
			else if ($night == "chris") {
			    $chris += 1;
			}
			else if ($night == "meg"){
			    $meg += 1;
			}
			else if ($night == "brian"){
			    $brian += 1;
			} 
			else if ($night == "stewie"){
			  	$stewie += 1;
			}

			if ($drink == "peter") {
			    $peter += 1;
			}
			else if ($drink == "lois") {
			    $lois += 1;
			}
			else if ($drink == "chris") {
			    $chris += 1;
			}
			else if ($drink == "meg"){
			    $meg += 1;
			}
			else if ($drink == "brian"){
			    $brian += 1;
			} 
			else if ($drink == "stewie"){
			  	$stewie += 1;
			}

			if ($tv == "peter") {
			    $peter += 1;
			}
			else if ($tv == "lois") {
			    $lois += 1;
			}
			else if ($tv == "chris") {
			    $chris += 1;
			}
			else if ($tv == "meg"){
			    $meg += 1;
			}
			else if ($tv == "brian"){
			    $brian += 1;
			} 
			else if ($tv == "stewie"){
			  	$stewie += 1;
			}

			if ($hate == "peter") {
			    $peter += 1;
			}
			else if ($hate == "lois") {
			    $lois += 1;
			}
			else if ($hate == "chris") {
			    $chris += 1;
			}
			else if ($hate == "meg"){
			    $meg += 1;
			}
			else if ($hate == "brian"){
			    $brian += 1;
			} 
			else if ($hate == "stewie"){
			  	$stewie += 1;
			}



			$character_nums = array($peter, $lois, $chris, $meg, $brian, $stewie);
		    $characters = array('peter','lois','chris','meg','brian','stewie');
			$results = array($color, $night);
		    $max = 0;
		    $max_char = "";
		    

		   	for ($i=0; $i < sizeof($characters); $i+=1){
		    	if ($character_nums[$i] >= $max){
		    		$max = $character_nums[$i];
		    		$max_char = $characters[$i];
		    	}
		   	}

		   	$img_src = getcwd() . "/images/$max_char.png";

		   	

		   	$youare = $max_char;

		   	//print "<img src=$img_src>";

		   	$path = getcwd() . '/data';
		   	// $path = "/Users/alexcasieri/documents/MAMP/webdev/MacroAssignment7/data";

		   	$story = "$max_char,";
		   	file_put_contents($path .'/stories.txt', ",", FILE_APPEND);
		   	file_put_contents($path .'/stories.txt', $story, FILE_APPEND);
	      	setcookie('prevresult', $max_char);

	      	header("Location: display.php?youare=$youare&imgsrc=$img_src");
      		exit();

		?>
		
	</div>

</body>
</html>

