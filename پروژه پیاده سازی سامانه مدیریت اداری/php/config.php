<?php
  $host="localhost";
  $user="root";
  $pass="";
  $db="university";
  $con=mysqli_connect($host,$user,$pass,$db);
  if(mysqli_connect_errno())
  {
    echo "ERROR: No connection to MySQL.".mysqli_connect_error();
    exit;
  }
  mysqli_query($con,"SET NAMES 'utf8'");
 ?>
