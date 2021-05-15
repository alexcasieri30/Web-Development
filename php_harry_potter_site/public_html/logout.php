<?php
	include('config.php');
	$lastname = $_COOKIE['lastname'];
	$lastname1 = substr($lastname, 0,-1);
	$time = time();
	if (strlen($lastname) > 1){
		$info = $time . ',' . $lastname.',' . "logout\n";
		file_put_contents($file_path . '/adminlog.txt', $info, FILE_APPEND);
	}
	setcookie('username', '', time()-3600);
	setcookie('loggedin', '', time()-3600);
	setcookie('firstname', '', time()-3600);
	setcookie('lastname', '', time()-3600);
	setcookie('student','',time()-3600);
	header("Location: admin.php");
	exit();
?>