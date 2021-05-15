<?php
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
          <li><a href="about.php" class="navlink active">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <?php 
            if ($_COOKIE['student'] == 'yes'){
              print "<li><a href='admin.php' class='navlink'>Notebook</a></li>";
            }
            else{
              print "<li><a href='admin.php' class='navlink'>Admin</a></li>";
            }
          ?>           <?php 
            if (!$_COOKIE['loggedin']){
              print "<li><a href='register.php' class='navlink'>Register</a></li>";
            }
          ?>
        </ul>
      </div>
      <div id="rightcolumn">
        <div id="header">
          About Our School
        </div>
        <?php
          $data = file_get_contents($file_path."/alert.txt");
          if (strlen($data) > 0){
            print "<div id='alert'>$data</div>";
          }
        ?>
        <div id="content">
          <?php
            include($file_path."/about.txt");
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
