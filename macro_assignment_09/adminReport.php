<?php

  if ($_COOKIE['loggedin'] == 'yes') {
      //find file path
  include('config_file.php');
  //log the logout
  $data = file_get_contents($file_path.'/adminlog.txt');
  //seperate by line into an array
  $entries = explode("\n", $data);
  array_pop($entries);

  ?>

  <table style="width:100%">
    <thread>
    <tr>
      <th>Time</th>
      <th>User</th>
      <th>Action</th>
      <th>IP Address</th>
    </tr>
  </thread>
  <tbody>
  <?php 
  for ($i=0; $i < sizeof($entries); $i++) { 
    //for loop to seperate by entity
      $credentials = explode(",", $entries[$i]);?>
  </tbody>
  <tr>
    <td style="text-align: center;"><?php print $credentials[0]; ?></td>
    <td style="text-align: center;"><?php print $credentials[1]; ?></td>
    <td style="text-align: center;"><?php print $credentials[2]; ?></td>
    <td style="text-align: center;"><?php print $credentials[3]; ?></td>
  </tr>
  <?php } ?>
</tbody>
</table>
<p style="text-align: center;"><a href="admin.php">Admin Page</a></p>


<?php
}
else{
  // send back to the admin form
  header('Location: admin.php');
  exit();
  }
 ?>


  
