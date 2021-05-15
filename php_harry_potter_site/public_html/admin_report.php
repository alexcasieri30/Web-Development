<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		h1{
			text-align: center;
		}
		#table1{
			margin-right: auto;
			margin-left: auto;
			align-items: center;
			text-align: center;
			border: solid 1px black;
		}
		#table1 tr{
			border: solid 1px black;
		}
		#table1 tr td{
			padding-left: 30px;
			padding-right: 30px;
			padding-top: 15px;
			padding-bottom: 15px;
			border: solid 2px black;
		}
	</style>
</head>
<body>
	<?php
		include('config.php');
		$data = file_get_contents($file_path . '/adminlog.txt');

		$lines = explode("\n",$data);

		$loggedin = $_COOKIE['loggedin'];
		if ($loggedin != "yes"){
			header("Location: admin.php");
			exit();
		}
		else{
			print "<h1> Admin Report! </h1>";
			print "<table id='table1'>";
				for ($i = 0; $i < sizeof($lines); $i++){
					$info = explode(",",$lines[$i]);
					if (sizeof($info) > 1){
						$var1 = $info[0];
						$var2 = $info[1];
						$var3 = $info[2];
						insertrow($var1, $var2, $var3);
					}
				}	
			print "</table>";
			print "<a href=\"admin.php\">Back to Admin Page</a>";
		}
		function insertrow($var1, $var2, $var3){
			$unix = $var1;
			$datetime = 'foo';
			date_default_timezone_set(new DateTimeZone('US/Eastern'));
			$today = date("F j, Y, g:i a", $unix);
			
			print "<tr>
						<td>$today</td>
						<td>$var2</td>
						<td>$var3</td>
					</tr>";
		}
	?>
</body>
</html>

