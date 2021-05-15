<!doctype html>
<html>

  <head>
    <title>Assignment 07</title>
    <style>
      body{
        background-color: rgba(0,0,255, 0.2)
      }
      .question{
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: center;
        padding: 15px;
        font-size:  15pt;
        font-family: typewriter;

      }
      #answer{
        display: block;
        margin: auto;
      }
      #header{
        font-family: familyguy;
        text-align: center;
        font-size: 40pt;
        color: purple;
      }
      @font-face{
        font-family: familyguy;
        src: url("fonts/familyguy.ttf");
      }
      @font-face{
        font-family: typewriter;
        src: url('fonts/TravelingTypewriter.ttf');
      }
      #errormessage{
        text-align: center;
      }

    </style>
  </head>

  <body>

    

    <h1 id='header'>Which Family Guy Character Are You?</h1>
    <hr>
    <h3 id='errormessage'><?php
      $error=$_GET['error'];
      if($error == "filloutform"){
        print "Please fill out each question";
      }
    ?></h3>

    <form action="processresults.php" method="GET">

      <div class = 'question'>
        What is your favorite color?<br><br>
        <select name="color">
          <option value="select a color">Select one</option>
          <option value="peter">white</option>
          <option value="lois">green</option>
          <option value="chris">blue</option>
          <option value="meg">pink</option>
          <option value="brian">don't have one</option>
          <option value="stewie">red</option>
        </select>
      </div>

      <div class = 'question'>
      	What is your ideal night?<br><br>

		<select name="night" width='100px'>
          <option value="select one">Select One</option>
          <option value="peter">Get plastered with my friends</option>
          <option value="lois">Do book club with closest friends</option>
          <option value="chris">Nothing</option>
          <option value="meg">Try to go to a cool party, probably get rejected</option>
          <option value="brian">Hit the bar, try to get laid</option>
          <option value="stewie">Create a diabolical plan</option>
        </select>
      </div>

      <div class = 'question'>
        What do you like to drink? <br><br>

      <select name="drink">
          <option value="select one">Select One</option>
          <option value="peter">Beer</option>
          <option value="lois">Wine</option>
          <option value="chris">Water</option>
          <option value="brian">Whiskey</option>
          <option value="stewie">Milk</option>
          <option value="meg">Nothing</option>
        </select>
      </div>

      <div class = 'question'>
        What do you like to watch on tv? <br><br>
      <select name="tv">
          <option value="select one">Select One</option>
          <option value="peter">Sports</option>
          <option value="lois">Cooking shows</option>
          <option value="chris">Porn</option>
          <option value="brian">Rom com</option>
          <option value="stewie">Cartoons</option>
          <option value="meg">Something dramatic</option>
        </select>
      </div>
      <div class = 'question'>
        What do you hate the most? <br><br>

      <select name="hate">
          <option value="select one">Select One</option>
          <option value="peter">Chickens</option>
          <option value="lois">Messy room/dirty things</option>
          <option value="chris">School</option>
          <option value="brian">Getting cheated on</option>
          <option value="stewie">People that think theyre better than you</option>
          <option value="meg">Your family</option>
        </select>
      </div>
        <form action='processresults.php' method='GET'>
          <button id='answer'>What character am I?</button>
        </form>
    </form>
    <br>
    <br>
    <br>
    <a href='creategraphic.php'>See aggregate results</a>
    <?php
      if ($_COOKIE['prevresult']){
        header("Location: cookies.php");
        exit();
      }
    ?>
  </body>
</html>










