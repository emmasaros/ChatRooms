<?php


  include('config_file.php');

  // security audit - make sure the user is logged in before making changes!
  if ($_COOKIE['loggedin'] == 'yes') {

    //if they submit a change to filtered words update the txt file
    $filter = $_POST['filter'];
    if($_POST['filter']){

      //clear
      file_put_contents($file_path.'/filter.txt', "");
      //recreate banned words with new edit
      file_put_contents($file_path.'/filter.txt', $filter);
    }
    // if they are logged in make changes to the home text files
    $chatOne = isset($_POST['chatOne']);
    if($_POST['chatOne'] && strlen($chatOne) > 0){

      // put this into the text file
      file_put_contents($file_path.'/room1.txt', "");

    }


    // if they are logged in make changes to the about text files
    $chatTwo = isset($_POST['chatTwo']);
    if($_POST['chatTwo'] && strlen($chatTwo) > 0){

      // put this into the text file
      file_put_contents($file_path.'/room2.txt', "");

    }


    // if they are logged in make changes to the alert text files
    $chatThree = isset($_POST['chatThree']);
    if($_POST['chatThree'] && strlen($chatThree) > 0){

      // put this into the text file
      file_put_contents($file_path.'/room3.txt', "");

    }

    // send them back to the form
      header('Location: admin.php?confirmation=savedtext');
      exit();
  
  }
  
   else {
      // send them back to the admin page
      header('Location: admin.php?error=notloggedin');
      exit();
    }





 ?>
