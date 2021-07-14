<?php

  // grab data from the client
  $roomChoice = $_POST['roomChoice'];
  $message = $_POST['message'];
  $nickname = $_POST['nickname'];
  $ban;

  $cleanMessage = preg_replace("/[^A-Za-z0-9 \",$%'!@#^&*()?.]/", '', $message);

  if($message && strlen($message) > 0 && $nickname){

  	// store this data into a text file
 	  $path = getcwd() . '/data';

    $filter = file_get_contents($path . '/filter.txt');
    $banned_words = explode(" ", $filter);
    for ($i = 0; $i < sizeof($banned_words); $i++) { 
      $pos = strpos(strtolower($cleanMessage), $banned_words[$i]);
      //print $pos;
      if ($pos === false) {
        //print " NOT found ";
        //do nothing
      }
      else{
        //print " FOUND '$banned_words[$i]' ";
        $ban = true;
      }
    }

    if(isset($ban) != true){

      if ($roomChoice == 1) {
        file_put_contents($path . '/room1.txt', "$nickname : $cleanMessage\n", FILE_APPEND);
        //log activity

            //log the use
            $filename = $path . '/adminlog.txt';
            $CURRENT_TIME = time();
            $time = date('Y-m-d H:i:s', $CURRENT_TIME);
            $ipAddy = $_SERVER['REMOTE_ADDR'];
            file_put_contents($filename, "$time,$nickname,used room $roomChoice,$ipAddy\n", FILE_APPEND);

      }
      else if ($roomChoice == 2) {
        file_put_contents($path . '/room2.txt', "$nickname : $cleanMessage\n", FILE_APPEND);

        //log the use
            $filename = $path . '/adminlog.txt';
            $CURRENT_TIME = time();
            $time = date('Y-m-d H:i:s', $CURRENT_TIME);
            $ipAddy = $_SERVER['REMOTE_ADDR'];
            file_put_contents($filename, "$time,$nickname,used room $roomChoice,$ipAddy\n", FILE_APPEND);
      }
      else if ($roomChoice == 3){
        file_put_contents($path . '/room3.txt', "$nickname : $cleanMessage\n", FILE_APPEND);

        //log the use
            $filename = $path . '/adminlog.txt';
            $CURRENT_TIME = time();
            $time = date('Y-m-d H:i:s', $CURRENT_TIME);
            $ipAddy = $_SERVER['REMOTE_ADDR'];
            file_put_contents($filename, "$time,$nickname,used room $roomChoice,$ipAddy\n", FILE_APPEND);
      }
    
      // tell the client that we are done
      print "ok";

    }

    else{
      print "rejected";
    }
    
  }
  else{
  	print "failed";
  }

 ?>
