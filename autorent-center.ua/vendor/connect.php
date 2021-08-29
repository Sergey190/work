<?php

    $connect = mysqli_connect('localhost', 'Admin', '123456', 'arenda');

    if (!$connect) {
        die('Error connect to DataBase');
    }