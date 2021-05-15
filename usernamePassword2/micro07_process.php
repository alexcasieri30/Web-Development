<?php
	if($_GET['loggedin'] == "True"){
		print "Logged in";
	}
	else{
		$username = $_GET['username'];
		$password = $_GET['password'];

		if (!$username){
			$file = "missing<br>";
			$path = "/home/ajc880/public_html/webdev/MicroAssignment7/data";
			file_put_contents($path . "/results.txt", $file ,FILE_APPEND);
			header("Location: micro07.php?errorusername=empty");
			exit();
		}
		else if (!$password){
			$file = "missing<br>";
			$path = "/home/ajc880/public_html/webdev/MicroAssignment7/data";
			file_put_contents($path . "/results.txt", $file ,FILE_APPEND);
			header("Location: micro07.php?errorpassword=empty");
			exit();
		}
		if ($username!="pikachu" && $password!="pokemon"){
			$file = "unsuccessful<br>";
			$path = getcwd() . "/data";
			file_put_contents($path . "/results.txt", $file ,FILE_APPEND);
			header("Location: micro07.php?errorcombo=wrong");
			exit();
		}
		else{
			setcookie("loggedin","yes");
			$file = "successful<br>";
			$path = "/home/ajc880/public_html/webdev/MicroAssignment7/data";
			file_put_contents($path . "/results.txt", $file ,FILE_APPEND);
			print "Welcome to the website";
		}
	}
?>