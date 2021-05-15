<?php
  include('config.php');
  function badWordDetector($badwords, $sentence){
    $nsent = explode(" ",$sentence);
    for ($i = 0; $i < sizeof($badwords); $i++){
      $badword = $badwords[$i];
      for ($j = 0; $j < sizeof($nsent); $j++){
        if ($nsent[$j]==$badword){
          return 1;
        }
      }
    }
    return 0;
  }
  $message = $_GET['message'];
  $nickname = $_GET['nickname'];
  $roomname = $_GET['room'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $t = time();
  $time = date("Y-m-d h:i:s",$t);
  // $path = getcwd() . '/data';
  $pattern = array('/[:]/','/[{]/','/[}]/','/[|]/','/[~]/','/[`]/','/[:]/','/[;]/','/[+]/','/[=]/','/[_]/','/[-]/','/[>]/','/[<]/');
  $newmessage = preg_replace($pattern, '', $message);
  $words = file_get_contents($path . "/badwords.txt");
  $badwords = explode("\n", $words);
  $bwpresent = badWordDetector($badwords, $newmessage);
  $string = $newmessage."," . $nickname.",".$roomname.",".$time . ",".$ip."\n";
  file_put_contents('data/usagelog.txt',$string, FILE_APPEND);
  if ($bwpresent == 1){
    print "badword" ;
    exit();
  }
  else{
    if (strlen($newmessage)>1){
      file_put_contents($path . "/$roomname.txt", "$nickname : $newmessage\n", FILE_APPEND); 
      print "Ok";
      exit(); 
    }
    else{
      print "too short";
      exit();
    }
  }  
 ?>