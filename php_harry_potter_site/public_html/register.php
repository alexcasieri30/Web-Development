<?php
  // before we load the page we need to load in our 'config.php' file
  // this file contains PHP variables that our page will need to access,
  // such as the file path of the 'data' folder
  include('config.php');
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>Hogwarts School Management System</title>
    <link type="text/css" href="styles.css" rel="stylesheet" />
  </head>
  <body>
    <div id="container">
      <div id="leftcolumn">
        <img src="images/hogwarts_logo.png">
        <ul>
          <li><a href="index.php" class="navlink">Home</a></li>
          <li><a href="about.php" class="navlink">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <?php 
            if ($_COOKIE['student'] == 'yes'){
              print "<li><a href='admin.php' class='navlink'>Notebook</a></li>";
            }
            else{
              print "<li><a href='admin.php' class='navlink'>Admin</a></li>";
            }
          ?>
          <li><a href="register.php" class="navlink active">Register</a></li>
        </ul>
      </div>
      <div id="rightcolumn">
        <div id="header">
          Register
        </div>
        <?php
          $data = file_get_contents($file_path."/alert.txt");
          if (strlen($data) > 0){
            print "<div id='alert'>$data</div>";
          }
        ?>
        <div id="content">
		    <?php
		    	$error = $_GET['error'];
		    	if ($error == 'empty'){
		    		print "<strong>Please fill in each blank</strong>";
		    	}
		    	else if ($error == 'passwordnotalnum'){
		    		print "<strong>Password not alphanumeric</strong>";
		    	}
		    	else if ($error == 'firstnamenotalpha'){
		    		print "<strong>Invalid first name</strong>";
		    	}
		    	else if ($error == 'lastnamenotalpha'){
		    		print "<strong>Invalid last name</strong>";
		    	}
		    	else if ($error == 'usernametaken'){
		    		print "<strong>Username taken</strong>";
		    	}
		    ?>
        	<form method="post" action='registerinfo.php'>
                First name: 
                <input type='text' name='firstname'><br>
                Last name: 
                <input type='text' name='lastname'><br>
                Username: 
                <input type="text" name="username"><br>
                Password: 
                <input type="text" name="password"><br>
                <input type="submit">
            </form>
        </div>
      </div>
    </div>
  </body>
</html>