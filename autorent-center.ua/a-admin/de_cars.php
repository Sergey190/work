<?php

//Удаление продукта

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */



require_once '../include/db_connect.php';
include("include/db_connect.php");
/*
 * Получаем ID продукта из адресной строки
 */

$id = $_GET['id_car'];

/*
 * Делаем запрос на удаление строки из таблицы products
 */

mysqli_query($connect, "DELETE FROM `car` WHERE `car`.`id_car` = '$id'");

/*
 * Переадресация на главную страницу
 */


echo "<script type='text/javascript'> window.location='/a-admin/add_car.php'; </script>"; 