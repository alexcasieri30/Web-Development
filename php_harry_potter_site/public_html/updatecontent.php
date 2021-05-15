<?php
	include('config.php');
	if ($_COOKIE['loggedin'] == 'yes'){
		if ($_COOKIE['student'] != 'yes'){
			$homepage = $_POST['homepage'];
			$about = $_POST['about'];
			$policies = $_POST['policies'];
			$teacheraccount = $_POST['teacheraccount'];
			$lines = explode("\n", $teacheraccount);
			$lastname0 = $_COOKIE['lastname'];
			$lastname1 = substr_replace($lastname0,"",-1);
			$lastname = substr_replace($lastname0,"",-1);
			$adminloginfo = time() . "," . $lastname . "," . "changed\n";
			if ($homepage){
				file_put_contents($file_path.'/home.txt', $homepage);
			}
			if ($about){
			 	file_put_contents($file_path.'/about.txt', $about);
			}
			if ($policies){
			 	file_put_contents($file_path.'/policies.txt', $policies);
			}
			if ($teacheraccount){
				file_put_contents($file_path.'/teacheraccounts.txt', $teacheraccount);
			}
			file_put_contents($file_path.'/adminlog.txt', $adminloginfo, FILE_APPEND);
			header("Location: admin.php?confirmation=savedtext&name=$lastname");
			exit();
		}
		else if ($_COOKIE['student'] == 'yes'){
			$studenttext = $_POST['studenttext'];
			$studentname = $_COOKIE['username'];
			$lastname = $_COOKIE['lastname'];
			$adminloginfo = time() . "," . $lastname . "," . "changed\n";
			if ($studenttext){
				file_put_contents($file_path.'/'. $studentname . '.txt', $studenttext);
				file_put_contents($file_path.'/adminlog.txt', $adminloginfo, FILE_APPEND);
			}
			header("Location: admin.php?confirmation=savedtext&name=$lastname");
			exit();
		}
	}
	else{
		header("Location: admin.php?error=notloggedin&name=$lastname");
		exit();
	}
?>