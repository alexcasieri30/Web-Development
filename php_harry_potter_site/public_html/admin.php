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
          <li><a href="about.php" class="navlink">About</a></li>
          <li><a href="policies.php" class="navlink">Policies</a></li>
          <?php 
            if ($_COOKIE['student'] == 'yes'){
              print "<li><a href='admin.php' class='navlink active'>Notebook</a></li>";
            }
            else{
              print "<li><a href='admin.php' class='navlink active'>Admin</a></li>";
            }
          ?>
           <?php 
            if (!$_COOKIE['loggedin']){
              print "<li><a href='register.php' class='navlink'>Register</a></li>";
            }
          ?>
        </ul>
      </div>
      <div id="rightcolumn">
        <div id="header">
          Welcome to Hogwarts
        </div>
        <?php
          $data = file_get_contents($file_path."/alert.txt");
          if (strlen($data) > 0){
            print "<div id='alert'>$data</div>";
          }
        ?>
        <div id="content">
          <?php
            if ($_COOKIE['loggedin']=='yes'){
              print "<p>Welcome ". $_COOKIE['firstname'] . " " . $_COOKIE['lastname'] ."</p>";
              print "<p> <a href=\"logout.php\">Logout</a></p>";
              if ($_COOKIE['student']!='yes'){
                print "<p> <a href=\"admin_report.php\">Admin Report</a> </p>";
              }
              $hometext = file_get_contents($file_path.'/home.txt');
              $abouttext = file_get_contents($file_path.'/about.txt');
              $policiestext = file_get_contents($file_path.'/policies.txt');
              $teacheraccount = file_get_contents($file_path.'/teacheraccounts.txt');
              $studentname = $_COOKIE['username'];
              $studenttext = file_get_contents($file_path . '/'. $studentname . '.txt'); 
              if ($_COOKIE['student'] == 'yes'){ ?>
                <form method='post' action='updatecontent.php'>
                  <textarea name='studenttext'><?php print $studenttext; ?></textarea>
                  <input type='submit'>
                </form>
              <?php } 
              else{ ?>
                <form method='post' action='updatecontent.php'>
                  Homepage text:
                  <textarea name='homepage'><?php print $hometext; ?></textarea>
                  About text:
                  <textarea name='about'><?php print $abouttext; ?></textarea>
                  Policies text:
                  <textarea name='policies'><?php print $policiestext; ?></textarea>
                  Teacher account:
                  <textarea name='teacheraccount'><?php print $teacheraccount; ?></textarea>
                  <input type="submit">
                </form>
              <?php }
            }
            else{
          ?>
              <form method="post" action='login.php'>
                Username: 
                <input type='username' name='username'><br>
                Password: 
                <input type="password" name="password"><br>
                <input type="submit">
              </form>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
