<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

		$file = getcwd() . '/data/stories.txt';
	    $alldata = file_get_contents($file);


	    $peters = [];
	    $loiss = [];
	    $chriss = [];
	    $stewies = [];
	    $megs = [];
	    $brians = [];
	    $total = [];
	    $others=[];

	    $name = explode(",",$alldata);

	    for ($i = 0; $i < sizeof($name)-1; $i++){
		    if ($name[$i] == 'peter'){
		      	array_push($peters, $name[$i]);
		    }
		    else if ($name[$i] == 'lois'){
		      	array_push($loiss, $name[$i]);
		    }
		    else if ($name[$i] == 'chris'){
		     	array_push($chriss, $name[$i]);
		    }
		    else if ($name[$i] == 'brian'){
		      	array_push($brians, $name[$i]);
		    }
		    else if ($name[$i] == 'meg'){
		      	array_push($megs, $name[$i]);
		    }
		    else if ($name[$i] == 'stewie'){
		      	array_push($stewies, $name[$i]);
		    }
		    else{
		      	array_push($others, $name[$i]);
		    }
		    array_push($total, $name[$i]);
	    }

	    $sizeoftotal = sizeof($total);
	      	
	    $peter_perc = sizeof($peters) / $sizeoftotal;
	    $lois_perc = sizeof($loiss) / $sizeoftotal;
	    $chris_perc = sizeof($chriss) / $sizeoftotal;
	    $meg_perc = sizeof($megs) / $sizeoftotal;
	    $brian_perc = sizeof($brians) / $sizeoftotal;
	    $stewie_perc = sizeof($stewies) / $sizeoftotal;

	    header("Location: results.php?&peter_perc=$peter_perc&lois_perc=$lois_perc&chris_perc=$chris_perc&meg_perc=$meg_perc&brian_perc=$brian_perc&stewie_perc=$stewie_perc&total=$sizeoftotal&totalsubmissions=$sizeoftotal");
	    exit();
	?>

</body>
</html>