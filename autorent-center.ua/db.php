<?php 
require"libs/rb.php";

$mysql =@new Mysqli('localhost', 'Admin', '123456', 'arenda');
  if($mysql->connect_errno) exit('Ошибка!');
  $mysql->set_charset('utf8');

 ?>