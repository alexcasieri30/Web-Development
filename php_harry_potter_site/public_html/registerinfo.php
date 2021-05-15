<?php
	include('config.php');
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (strlen($firstname)==0||strlen($lastname)==0||strlen($username)==0||strlen($password)==0){
		header("Location: register.php?error=empty");
		exit();
	}
	if (!ctype_alnum($password)){
		header("Location: register.php?error=passwordnotalnum");
		exit();
	}
	if (!ctype_alpha($firstname)){
		header("Location: register.php?error=firstnamenotalpha");
		exit();
	}
	if (!ctype_alpha($lastname)){
		header("Location: register.php?error=lastnamenotalpha");
		exit();
	}
	$studentinfo = file_get_contents($file_path . '/studentaccounts.txt');
	$lines = explode("\n",$studentinfo);
	for ($i = 0; $i < sizeof($lines); $i++){
		$student = explode(',',$lines[$i]);
		if ($username == $student[2]){
			header("Location: register.php?error=usernametaken");
			exit();
		}
	}
	$info = $firstname . "," . $lastname . "," . $username . "," . $password . "\n";
	file_put_contents($file_path."/studentaccounts.txt", $info, FILE_APPEND);
	header("Location: login.php");
	exit();
?>