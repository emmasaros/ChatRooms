<?php

  // grab the username & password
  $username = $_POST['username'];
  $password = $_POST['password'];


  // make sure they entered something into both blanks
  if (isset($username) && isset($password) && strlen($username)>0 && strlen($password)>0) {
    // access the admin_accounts.txt' text file
    include('config_file.php');

    $data = file_get_contents($file_path.'/admin_accounts.txt');
    //seperate by line into an array
    $entries = explode("\n", $data);
    array_pop($entries);


    for ($i=0; $i < sizeof($entries); $i++) { 
    	//for loop to seperate by entity
    	$credentials = explode(",", $entries[$i]);

    	// check to make sure the username & password are correct
	    if ($username == $credentials[0] && $password == $credentials[1]) {
	      // login successful!

	      // drop a cookie on the client computer
	      setcookie('loggedin', 'yes');
	      setcookie('username', $credentials[0]);
	      setcookie('firstname', $credentials[2]);
	      setcookie('lastname', $credentials[3]);

	      $filename = $file_path . '/adminlog.txt';
	      $CURRENT_TIME = time();
	      $time = date('Y-m-d H:i:s', $CURRENT_TIME);
        $ipAddy = $_SERVER['REMOTE_ADDR'];
	      file_put_contents($filename, "$time,$credentials[0],login,$ipAddy\n", FILE_APPEND);

	      // send them back to the form logged in
	      header('Location: admin.php');
    	}

    	else {
      	  // send them back to the form saying incorrect
      	  header('Location: admin.php?error=incorrect');
     

    	}

    }
    //exit if we checked with set variables
    exit();
  }
  else {
    // send them back to the form
    header('Location: admin.php?error=missinginfo');
    exit();
  }

 ?>
