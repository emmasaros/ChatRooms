<?php

  //find file path
  include('config_file.php');
  //log the logout
  $filename = $file_path . '/adminlog.txt';
  $CURRENT_TIME = time();
  $time = date('Y-m-d H:i:s', $CURRENT_TIME);
  $user = $_COOKIE['username'];
  $ipAddy = $_SERVER['REMOTE_ADDR'];
  file_put_contents($filename, "$time,$user,logout,$ipAddy\n", FILE_APPEND);

  // destory the cookies
  setcookie('loggedin', "", time()-3600);
  setcookie('username', "", time()-3600);
  setcookie('firstname', "", time()-3600);
  setcookie('lastname', "", time()-3600);

  // send back to the admin form
  header('Location: admin.php');
  exit();

 ?>
