<?php
                $hostname="localhost"; // Имя хоста
                $login="Admin"; // Логин для подкл. к серверу баз даных
                $pwd="123456"; // Пароль для подкл. к серверу баз даных
                $db_name="arenda";  // Название базы даных
                //подключение к базе
                $con = @mysql_connect($hostname, $login, $pwd) or die("Error! connect-database");
                mysql_select_db($db_name, $con) or die ("Error! select-database");                 
?>