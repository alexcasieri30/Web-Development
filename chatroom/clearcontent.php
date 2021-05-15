<?php
	include('config.php');
	$room = $_POST['room'];
	file_put_contents($path . "/$room.txt", '');
	print $room . "\n";
	print "cleared";
?>