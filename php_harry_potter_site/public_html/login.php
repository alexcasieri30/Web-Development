<?php
	include('config.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$student = True;
	$teacherinfo = file_get_contents($file_path . '/teacheraccounts.txt');
	$teacherlines = explode("\n",$teacherinfo);
	for ($i = 0; $i < sizeof($teacherlines); $i++){
		$teacherinfo = explode(',', $teacherlines[$i]);
		$teacherusername = $teacherinfo[0];
		if ($username == $teacherusername){
			$student = False;
		}
	}
	if ($student == True){
		if ($username && $password){		
			$data = file_get_contents($file_path. "/studentaccounts.txt");
			$lines = explode("\n", $data);
			for ($i = 0; $i < sizeof($lines); $i++){
				$credentials = explode(",", $lines[$i]);
			 	if ($username == $credentials[2] && $password == $credentials[3]){
			 		setcookie('loggedin', 'yes');
			 		setcookie('username',$credentials[2]);
			 		setcookie('firstname',$credentials[0]);
			 	    setcookie('lastname',$credentials[1]);
			 	    setcookie('student', 'yes');
			 	    header("Location: index.php?name=$credentials[1]");
			 		exit();
			 	}
			}
			header("Location: admin.php?error=incorrect");
			exit();
		}
		else{
			header("Location: admin.php?error=missinginfo");
			exit();
		}
	}
	else{
		if ($username && $password){	
			$data = file_get_contents($file_path. "/teacheraccounts.txt");
			$lines = explode("\n", $data);
			for ($i = 0; $i < sizeof($lines); $i++){
				$credentials = explode(",", $lines[$i]);
				if ($username == $credentials[0] && $password == $credentials[1]){
					setcookie('loggedin', 'yes');
					setcookie('username',$credentials[0]);
					setcookie('firstname',$credentials[2]);
				    setcookie('lastname',$credentials[3]);
				    setcookie('student', 'no');
				    header("Location: index.php?name=$credentials[3]");
					exit();
				}
			}
			header("Location: admin.php?error=incorrect");
			exit();
		}
		else{
			header("Location: admin.php?error=missinginfo");
			exit();
		}
	}
?>