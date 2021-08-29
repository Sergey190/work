<?php
  $hostname = "localhost";
  $username = "Admin";
  $password = "123456";
  $dbname = "arenda";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
