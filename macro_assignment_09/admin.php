<?php
  // before we load the page we need to load in our 'config.php' file
  // this file contains PHP variables that our page will need to access,
  // such as the file path of the 'data' folder
  include('config_file.php');
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>Admin Page</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

      body{
        font-family: 'Roboto Mono', monospace;
      }
      
    </style>
  </head>
  <body>
        <h1>Let's Chat!</h1>
        <h3>Admin Log In</h3>
        <div id="content">

          <?php

            // check the cookie - are they logged in?
            if ($_COOKIE['loggedin'] == 'yes') {
              print "<p>Welcome " . $_COOKIE['firstname'] . " " . $_COOKIE['lastname'] . "</p>";
              print "<p><a href=\"logout_.php\">Logout</a></p>";
              print "<p><a href=\"adminReport.php\">Admin Log History</a></p>";

              // give the admin user a form to fill out to change any of the text files
              $chatOne = file_get_contents($file_path.'/room1.txt');
              $chatTwo = file_get_contents($file_path.'/room2.txt');
              $chatThree = file_get_contents($file_path.'/room3.txt');
              $filter = file_get_contents($file_path.'/filter.txt');

              ?>

              <form method="post" action="savetext.php">
                Banned Words:
                <textarea name="filter"><?php print $filter; ?></textarea>
                <input type="submit" value="Edit">
              </form>

              <form method="post" action="savetext.php">
                Chat Room One:
                <textarea name="chatOne"><?php print $chatOne; ?></textarea>
                <input type="submit" value="Clear">
              </form>

              <form method="post" action="savetext.php">
                Chat Room Two:
                <textarea name="chatTwo"><?php print $chatTwo; ?></textarea>
                <input type="submit" value="Clear">
              </form>

              <form method="post" action="savetext.php">
                Chat Room Three:
                <textarea name="chatThree"><?php print $chatThree; ?></textarea>
                <input type="submit" value="Clear">
              </form>



              <?php

              if(isset($_GET['confirmation'])){
				        //log the change
				        $filename = $file_path . '/adminlog.txt';
				        $CURRENT_TIME = time();
				        $time = date('Y-m-d H:i:s', $CURRENT_TIME);
  				      $user = $_COOKIE['username'];
                $ipAddy = $_SERVER['REMOTE_ADDR'];
  				      file_put_contents($filename, "$time,$user,changes made,$ipAddy\n", FILE_APPEND);
                print "Your changes have been saved.";
              }


            }
            else {

           ?>

          <form method="post" action="login_.php">
            Username:
            <input type="text" name="username"><br>
            Password:
            <input type="text" name="password">
            <input type="submit">
          </form>

          <?php
            if ($_GET['error']) {
            
          ?>
          <p>Invalid credentials. Please try again.</p>
          <?php
            }

            }

           ?>

          <a href="index.php">Chat Rooms</a>

      </div>
  </body>
</html>
