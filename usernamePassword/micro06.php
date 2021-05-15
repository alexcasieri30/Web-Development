<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Microassignment 6</h1>


	<?php
		error_reporting(0);

		if ($_GET['errorusername']){
			print "<strong> Please enter username </strong>";
		}
		if ($_GET['errorpassword']){
			print "<strong> Please enter password </strong>";
		}
		if ($_GET['errorcombo']){
			print "<strong> Your username or password was entered incorrectly <br> Try again!<br><br></strong>";
		}

	?>

	<form action="micro06_process.php" method="GET">
		Username: <input type="text" name="username">
		<br>
		Password: <input type="text" name="password">
		<br>
		<input type="submit">
	</form>
	<?php 
		

		$array_1 = array(100,200,300);
	

	?>
</body>
</html>