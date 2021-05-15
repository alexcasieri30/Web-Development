<?php

	setcookie('prevresult','value',time()-3600);
	header("Location: index.php");
	exit();

?>