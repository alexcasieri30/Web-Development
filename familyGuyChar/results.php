<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<?php
		// header("Content-type: text/css; charset: UTF-8");
		$peter_perc = $_GET['peter_perc'] * 100;
		$lois_perc = $_GET['lois_perc'] * 100;
		$chris_perc = $_GET['chris_perc'] * 100;
		$meg_perc = $_GET['meg_perc'] * 100;
		$brian_perc = $_GET['brian_perc'] * 100;
		$stewie_perc = $_GET['stewie_perc'] * 100;
		$numsubmissions=$_GET['totalsubmissions'];

		if($numsubmissions==0){
			$peter_perc = 100;
			$lois_perc = 100;
			$chris_perc = 100;
			$meg_perc = 100;
			$brian_perc = 100;
			$stewie_perc = 100;
		}
	?>
	<style type="text/css">
		.resultbar{
			border: solid 1px black;
			height: 80px;
		}
		#peter_perc{
			width: <?php echo $peter_perc; ?>vw;
			background-color: white;
			text-align: center;
			font-size: 20pt;
			padding-top: 50px;
		}
		#lois_perc{
			width: <?php echo $lois_perc; ?>vw;
			background-color: green;
			text-align: center;
			font-size: 20pt;
			padding-top: 50px;
		}
		#chris_perc{
			width: <?php echo $chris_perc; ?>vw;
			background-color: blue;
			text-align: center;
			font-size: 20pt;
			padding-top: 50px;
		}
		#meg_perc{
			width: <?php echo $meg_perc; ?>vw;
			background-color: pink;
			text-align: center;
			font-size: 20pt;
			padding-top: 50px;
		}
		#brian_perc{
			width: <?php echo $brian_perc; ?>vw;
			background-color: brown;
			text-align: center;
			font-size: 20pt;
			padding-top: 50px;
		}
		#stewie_perc{
			width: <?php echo $stewie_perc; ?>vw;
			background-color: red;
			text-align: center;
			font-size: 20pt;
			padding-top: 50px;
			
		}
		#backtoquiz{
			display: block;
			margin: auto;
			height: 50px;
			width: 100px;
		}
	</style>
</head>
<body>

	<h1>Previous results: </h1>

	<p>In total, there have been <?php print $numsubmissions; ?> quiz submissions.</p>
	<br>
	<br>



	Peter<div class = 'resultbar' id='peter_perc'><strong><?php print number_format((float)$peter_perc,2,".","") . "%"; ?></strong></div>
	Lois<div class = 'resultbar' id='lois_perc'><strong><?php print number_format((float)$lois_perc,2,".","") . "%"; ?></strong></div>
	Chris<div class = 'resultbar' id='chris_perc'><strong><?php print number_format((float)$chris_perc,2,".","") . "%"; ?></strong></div>
	Meg<div class = 'resultbar' id='meg_perc'><strong><?php print number_format((float)$meg_perc,2,".","") . "%"; ?></strong></div>
	Brian<div class = 'resultbar' id='brian_perc'><strong><?php print number_format((float)$brian_perc,2,".","") . "%"; ?></strong></div>
	Stewie<div class = 'resultbar' id='stewie_perc'><strong><?php print number_format((float)$stewie_perc,2,".","") . "%"; ?></strong></div>


	<br>
	<br>
	<br>
	<form action='cookies.php'>
		<button id='backtoquiz'>Back</button>
	</form>

</body>
</html>






