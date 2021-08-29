


<?php

$host = 'localhost';
  $database = 'arenda';
  $user = 'Admin';
  $pass = '123456';

  $dsn = "mysql:host=$host;dbname=$database;";
  $options = array(
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  );
  $pdo = new PDO($dsn, $user, $pass, $options);

  ?>

  <?php 
  $mysql =@new Mysqli('localhost', 'Admin', '123456', 'arenda');
  if($mysql->connect_errno) exit('Ошибка!');
  $mysql->set_charset('utf8');
   ?>