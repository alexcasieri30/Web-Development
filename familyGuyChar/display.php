<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background: rgba(0,255,255,0.2);
		}
		#header{
			text-align: center;
			display: block;
			margin: auto;
			margin-top: 30px;
		}
		#image{
			margin-top: 50px;
			text-align: center;
		}
		#whoareyou{
			text-align: center;
			font-size: 20pt;
		}

	</style>
</head>
<body>
	<h1 id='header'>You are: </h1>
	<div id='image'>
		<?php

			
				$youare = $_GET['youare'];
				$img_src= getcwd() . "images/$youare.png";

				if ($_COOKIE['prevresult']){
					$cookie = $_COOKIE['prevresult'];
					print "<img src=images/$cookie.png>";
				}
				else{
					print "<img src=$img_src><br>";
					print $img_src;
				}
			
			
		?>
	</div>
	<div id='whoareyou'>

		<strong><?php

			if($_GET['cookie']){
				$char = $_GET['cookie'];
				if($char == 'peter'){
					print "Peter Griffin!";
				}
				else if ($char == 'lois'){
					print "Lois Griffin!";
				}
				else if ($char == 'chris'){
					print "Chris Griffin!";
				}
				else if ($char == 'meg'){
					print "Meg Griffin!";
				}
				else if ($char == 'brian'){
					print "Brian Griffin!";
				}
				else if ($char == 'stewie'){
					print "Stewie Griffin!";
				}
			}
			else{
				if($youare == 'peter'){
					print "Peter Griffin!";
				}
				else if ($youare == 'lois'){
					print "Lois Griffin!";
				}
				else if ($youare == 'chris'){
					print "Chris Griffin!";
				}
				else if ($youare == 'meg'){
					print "Meg Griffin!";
				}
				else if ($youare == 'brian'){
					print "Brian Griffin!";
				}
				else if ($youare == 'stewie'){
					print "Stewie Griffin!";
				}
			}
		?></strong>

	</div>
	<br>
	<br>
	<form action="tryagain.php">
		<button id='tryagain' style="display: block; margin: auto;">Take Quiz Again</button>
	</form>
	<br>
	<form action="creategraphic.php">
		<button id='aggregate' style="display: block; margin: auto;">See aggregate results</button>
	</form>

</body>
</html>