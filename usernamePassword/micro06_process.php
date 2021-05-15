<?php

	$username = $_GET['username'];
	$password = $_GET['password'];

	if (!$username){
		header("Location: micro06.php?errorusername=empty");
		exit();
	}
	else if (!$password){
		header("Location: micro06.php?errorpassword=empty");
		exit();
	}
	if ($username!="pikachu" && $password!="pokemon"){
		header("Location: micro06.php?errorcombo=wrong");
		exit();
	}
	else{
		print "Welcome to the website";
	}

?>