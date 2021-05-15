<?php
	if ($_COOKIE['prevresult']){
		$cookie = $_COOKIE['prevresult'];
		header("Location: display.php?cookie=$cookie");
		exit();
	}
	else{
		header("Location: index.php");
		exit();
	}
?>