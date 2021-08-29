<?php

//Удаление продукта

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */



require_once '../include/db_connect.php';

/*
 * Получаем ID продукта из адресной строки
 */

$id = $_GET['id'];

/*
 * Делаем запрос на удаление строки из таблицы products
 */

mysqli_query($connect, "DELETE FROM `zakas` WHERE `zakas`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */


echo "<script type='text/javascript'> window.location='/a-admin/zakas.php'; </script>"; 